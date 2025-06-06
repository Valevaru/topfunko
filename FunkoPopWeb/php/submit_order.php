<?php
session_start();
require_once 'db_connect.php';

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    header("Location: ../checkout.php?error=emptycart");
    exit;
}

// Εισαγωγή στοιχείων παραγγελίας
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$notes = $_POST['notes'] ?? '';

// Υπολογισμός συνολικού ποσού
$total = 0;
foreach ($cart as $product_id => $qty) {
    $stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($product = $result->fetch_assoc()) {
        $total += $product['price'] * $qty;
    }
}

// Καταχώρηση στη βάση: orders
$stmt = $conn->prepare("INSERT INTO orders (user_name, email, address, phone, notes, total_price) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssd", $name, $email, $address, $phone, $notes, $total);
$stmt->execute();
$order_id = $stmt->insert_id;

// Καταχώρηση στη βάση: order_items
foreach ($cart as $product_id => $qty) {
    $stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($product = $result->fetch_assoc()) {
        $price = $product['price'];
        $item_stmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $item_stmt->bind_param("iiid", $order_id, $product_id, $qty, $price);
        $item_stmt->execute();
    }
}

// Άδειασμα καλαθιού
unset($_SESSION['cart']);

// Επιστροφή με επιτυχία
header("Location: ../checkout.php?success=1");
exit;
?>