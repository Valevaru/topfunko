<?php
session_start();
require_once 'php/db_connect.php';

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Ολοκλήρωση Παραγγελίας - TopFunko</title>
  <style>
    body { font-family: sans-serif; padding: 20px; background-color: #f9f9f9; }
    h1 { text-align: center; }
    form, table { max-width: 700px; margin: auto; }
    table { border-collapse: collapse; width: 100%; margin-bottom: 30px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
    input, textarea { width: 100%; padding: 8px; margin-top: 5px; margin-bottom: 15px; }
    button { padding: 10px 15px; }
    .popup-success {
      display: none;
      position: fixed;
      z-index: 1000;
      top: 20px;
      left: 50%;
      transform: translateX(-50%);
      background-color: #4CAF50;
      color: white;
      padding: 15px 25px;
      border-radius: 6px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }
  </style>
</head>
<body>

<?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
  <div class="popup-success" id="successPopup">Η παραγγελία καταχωρήθηκε επιτυχώς!</div>
  <script>
    window.onload = function() {
      const popup = document.getElementById('successPopup');
      popup.style.display = 'block';
      setTimeout(() => { popup.style.display = 'none'; }, 4000);
    }
  </script>
<?php endif; ?>

<h1>Ολοκλήρωση Παραγγελίας</h1>

<?php if (empty($cart)): ?>
  <p style="text-align:center;">Το καλάθι σας είναι άδειο. <a href="index.php">Επιστροφή στα προϊόντα</a></p>
<?php else: ?>

  <h2 style="text-align:center;">Προϊόντα στο καλάθι:</h2>
  <table>
    <tr>
      <th>Προϊόν</th>
      <th>Ποσότητα</th>
      <th>Τιμή</th>
      <th>Μερικό Σύνολο</th>
    </tr>
    <?php foreach ($cart as $product_id => $quantity):
      $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
      $result = $stmt->get_result();
      if ($product = $result->fetch_assoc()):
        $subtotal = $product['price'] * $quantity;
        $total += $subtotal;
    ?>
    <tr>
      <td><?= htmlspecialchars($product['title']) ?></td>
      <td><?= $quantity ?></td>
      <td>€<?= number_format($product['price'], 2) ?></td>
      <td>€<?= number_format($subtotal, 2) ?></td>
    </tr>
    <?php endif; endforeach; ?>
    <tr>
      <td colspan="3"><strong>Σύνολο</strong></td>
      <td><strong>€<?= number_format($total, 2) ?></strong></td>
    </tr>
  </table>

  <h2 style="text-align:center;">Στοιχεία Παραγγελίας:</h2>
  <form method="POST" action="php/submit_order.php" id="checkoutForm">
    <label>Ονοματεπώνυμο:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Διεύθυνση Αποστολής:</label>
    <textarea name="address" required></textarea>

    <label>Τηλέφωνο Επικοινωνίας:</label>
    <input type="text" name="phone" required>

    <label>Παρατηρήσεις (προαιρετικό):</label>
    <textarea name="notes"></textarea>

    <button type="submit">Υποβολή Παραγγελίας</button>
  </form>

<?php endif; ?>

<script>
document.getElementById("checkoutForm").addEventListener("submit", function(e) {
  const email = document.querySelector('input[name="email"]').value.trim();
  const phone = document.querySelector('input[name="phone"]').value.trim();

  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
  const phoneRegex = /^(\+?\d{1,4})?\d{10}$/;

  if (!emailRegex.test(email)) {
    alert("⚠️ Παρακαλώ εισάγετε έγκυρο email (π.χ. name@example.com).");
    e.preventDefault();
    return;
  }

  if (!phoneRegex.test(phone)) {
    alert("⚠️ Το τηλέφωνο πρέπει να είναι 10 ψηφία ή +κωδικός χώρας + 10ψηφιο.");
    e.preventDefault();
    return;
  }
});
</script>
<?php include 'php/footer.php'; ?>
</body>
</html>