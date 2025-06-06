<?php
session_start();
require_once 'php/db_connect.php';

// Ανάκτηση επιλεγμένης κατηγορίας από το URL
$selected_category = $_GET['category'] ?? 'all';

// Εμφάνιση προϊόντων ανά κατηγορία
if ($selected_category === 'all') {
    $stmt = $conn->prepare("SELECT * FROM products");
} else {
    $stmt = $conn->prepare("SELECT * FROM products WHERE category = ?");
    $stmt->bind_param("s", $selected_category);
}
$stmt->execute();
$products = $stmt->get_result();

// Ανάκτηση όλων των διαθέσιμων κατηγοριών για το μενού
$category_result = $conn->query("SELECT DISTINCT category FROM products ORDER BY category ASC");
$categories = $category_result->fetch_all(MYSQLI_ASSOC);

// Υπολογισμός καλαθιού
$cart = $_SESSION['cart'] ?? [];
$cart_count = array_sum($cart);
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>TopFunko - Αρχική</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    nav {
      text-align: center;
      margin: 20px 0;
    }
    nav a {
      margin-right: 10px;
      text-decoration: none;
      color: #333;
    }
    nav a:hover {
      text-decoration: underline;
    }
    .product-grid {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      padding: 20px;
      justify-content: center;
    }
    .product-card {
      background: #f2f2f2;
      border-radius: 8px;
      padding: 15px;
      width: 200px;
      text-align: center;
    }
    .product-card img {
      width: 100%;
      height: auto;
    }
    .product-card button {
      margin-top: 10px;
    }
    .header-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: #222;
      color: #fff;
      padding: 10px 20px;
    }
    .header-bar a {
      color: #fff;
      margin-left: 10px;
      text-decoration: none;
    }
    .header-bar a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

<header>
  <div class="header-bar">
    <div>
      <h1 style="margin: 0;">TopFunko E-Shop</h1>
      <?php if (isset($_SESSION['user_name'])): ?>
        <p style="margin: 0;">Καλωσήρθες, <?= htmlspecialchars($_SESSION['user_name']) ?>!</p>
      <?php endif; ?>
    </div>
    <div>
      <a href="cart.php">🛒 Καλάθι (<?= $cart_count ?>)</a>
      <?php if (isset($_SESSION['user_name'])): ?>
        <a href="php/logout.php">Αποσύνδεση</a>
      <?php else: ?>
        <a href="login.php">Σύνδεση</a>
        <a href="register.php">Εγγραφή</a>
      <?php endif; ?>
    </div>
  </div>
</header>

<nav>
  <strong>Κατηγορίες:</strong>
  <a href="index.php?category=all" <?= $selected_category === 'all' ? 'style="font-weight:bold;"' : '' ?>>Όλα τα προϊόντα</a>
  <?php foreach ($categories as $cat): ?>
    <a href="index.php?category=<?= urlencode($cat['category']) ?>" <?= $selected_category === $cat['category'] ? 'style="font-weight:bold;"' : '' ?>>
      <?= htmlspecialchars($cat['category']) ?>
    </a>
  <?php endforeach; ?>
</nav>

<section class="products">
  <h2 style="text-align:center;">
    <?= $selected_category === 'all' ? 'Όλα τα προϊόντα' : 'Κατηγορία: ' . htmlspecialchars($selected_category) ?>
  </h2>
  <div class="product-grid">
    <?php while($row = $products->fetch_assoc()): ?>
      <div class="product-card">
        <img src="media/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
        <h3><?= htmlspecialchars($row['title']) ?></h3>
        <p><?= htmlspecialchars($row['description']) ?></p>
        <p><strong>€<?= $row['price'] ?></strong></p>
        <form method="POST" action="php/add_to_cart.php">
          <input type="hidden" name="product_id" value="<?= $row['id'] ?>">
          <button type="submit">Προσθήκη στο καλάθι</button>
        </form>
      </div>
    <?php endwhile; ?>
  </div>
</section>

<?php include 'php/footer.php'; ?>
</body>
</html>