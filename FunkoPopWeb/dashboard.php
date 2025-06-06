<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - TopFunko</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f8fb;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin: 0;
    }

    .dashboard-box {
      background-color: #fff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    h1 {
      margin-top: 0;
      color: #333;
    }

    p {
      color: #555;
      margin-top: 10px;
    }

    .success-message {
      background-color: #e6ffea;
      color: #2e7d32;
      padding: 10px;
      border: 1px solid green;
      border-radius: 6px;
      margin: 10px 0;
    }

    .button-group {
      margin-top: 20px;
    }

    .button-group a {
      text-decoration: none;
      margin: 0 10px;
    }

    .button-group button {
      padding: 10px 20px;
      border: none;
      background-color: #a4d4ff;
      color: #333;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }

    .button-group button:hover {
      background-color: #8ecbff;
    }
  </style>
</head>
<body>

  <div class="dashboard-box">
    <h1>👋 Καλωσήρθες, <?= htmlspecialchars($_SESSION['user_name']); ?>!</h1>

    <?php if (isset($_SESSION['register_success'])): ?>
      <div class="success-message"><?= htmlspecialchars($_SESSION['register_success']); unset($_SESSION['register_success']); ?></div>
    <?php endif; ?>

    <p>Αυτό είναι το προσωπικό σου dashboard. Εδώ μπορείς να δεις παραγγελίες, να διαχειριστείς τον λογαριασμό σου κλπ.</p>

    <div class="button-group">
      <a href="index.php"><button>🔙 Επιστροφή στο Κατάστημα</button></a>
      <a href="php/logout.php"><button>Αποσύνδεση</button></a>
    </div>
  </div>

</body>
</html>