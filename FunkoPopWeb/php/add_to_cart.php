<?php
session_start();
$product_id = $_POST['product_id'] ?? null;

if (!$product_id) {
    header("Location: ../index.php");
    exit;
}

// Αν δεν υπάρχει το καλάθι στη συνεδρία, το δημιουργούμε
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Αν υπάρχει ήδη το προϊόν στο καλάθι, αυξάνουμε ποσότητα
if (isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id]++;
} else {
    $_SESSION['cart'][$product_id] = 1;
}

header("Location: ../cart.php");
exit;
?>