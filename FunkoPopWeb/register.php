<?php session_start(); ?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Εγγραφή - TopFunko</title>
  <link rel="stylesheet" href="css/style.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: Arial, sans-serif;
      background-color: #f4f8fb;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .register-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .register-container h1 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    label {
      display: block;
      margin-top: 12px;
      margin-bottom: 6px;
      color: #555;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      box-sizing: border-box;
    }

    button {
      margin-top: 20px;
      width: 100%;
      padding: 12px;
      background-color: #a4d4ff;
      color: #333;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
    }

    button:hover {
      background-color: #8ecbff;
    }

    .message {
      margin-top: 15px;
      padding: 10px;
      border-radius: 6px;
      text-align: center;
      font-weight: bold;
    }

    .error-message {
      background-color: #ffe6e6;
      color: #cc0000;
      border: 1px solid red;
    }

    .success-message {
      background-color: #e6ffea;
      color: #2e7d32;
      border: 1px solid green;
    }
  </style>
</head>
<body>
<div class="register-container">
  <?php if (isset($_SESSION['register_success'])): ?>
    <div class="message success-message">
      <?= htmlspecialchars($_SESSION['register_success']); unset($_SESSION['register_success']); ?>
      <br><br>
      <a href="index.php">
        <button>Μετάβαση στο Κατάστημα</button>
      </a>
    </div>
  <?php else: ?>
    <h1>Εγγραφή</h1>
    <form method="POST" action="php/register_handler.php">
      <label>Όνομα:</label>
      <input type="text" name="name" required>

      <label>Επώνυμο:</label>
      <input type="text" name="surname" required>

      <label>Email:</label>
      <input type="email" name="email" required>

      <label>Κωδικός Πρόσβασης:</label>
      <input type="password" name="password" required>

      <label>Επιβεβαίωση Κωδικού:</label>
      <input type="password" name="confirm_password" required>

      <button type="submit">Εγγραφή</button>
    </form>

    <?php if (isset($_SESSION['register_error'])): ?>
      <div class="message error-message">
        <?= htmlspecialchars($_SESSION['register_error']); unset($_SESSION['register_error']); ?>
      </div>
    <?php endif; ?>
  <?php endif; ?>
</div>
</body>
</html>