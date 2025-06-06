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
  <title>Καλάθι Αγορών - TopFunko</title>
  <style>
    body { font-family: sans-serif; padding: 20px; background-color: #f7f7f7; }
    h1 { text-align: center; }
    table { width: 100%; max-width: 800px; margin: auto; border-collapse: collapse; margin-top: 30px; }
    th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
    form { display: inline; }
    button { padding: 8px 12px; margin: 5px; }
    .actions {
      text-align: center;
      margin-top: 30px;
    }
    a { text-decoration: none; color: #0077cc; }
  </style>
</head>
<body>

<h1>Το καλάθι σας</h1>

<?php if (empty($cart)): ?>
  <p style="text-align:center;">Το καλάθι σας είναι άδειο. <a href="index.php">Δείτε προϊόντα</a></p>
<?php else: ?>
  <table>
    <tr>
      <th>Προϊόν</th>
      <th>Ποσότητα</th>
      <th>Τιμή</th>
      <th>Μερικό Σύνολο</th>
      <th>Ενέργεια</th>
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
      <td>
        <form method="POST" action="php/remove_from_cart.php">
          <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
          <button type="submit">Αφαίρεση</button>
        </form>
      </td>
    </tr>
    <?php endif; endforeach; ?>
    <tr>
      <td colspan="3"><strong>Σύνολο</strong></td>
      <td colspan="2"><strong>€<?= number_format($total, 2) ?></strong></td>
    </tr>
  </table>

  <div class="actions">
    <a href="index.php"><button>🔙 Συνέχεια Αγορών</button></a>

    <form method="POST" action="php/clear_cart.php" style="display:inline;">
      <button type="submit">🗑️ Άδειασμα Καλαθιού</button>
    </form>

    <a href="checkout.php"><button>✅ Ολοκλήρωση Παραγγελίας</button></a>
  </div>
<?php endif; ?>
<?php include 'php/footer.php'; ?>
</body>
</html>