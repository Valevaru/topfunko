<?php session_start(); ?>
<!DOCTYPE html>
<html lang="el">
<head>
  <meta charset="UTF-8">
  <title>Σύνδεση - TopFunko</title>
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

    .login-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-container h1 {
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
<div class="login-container">
  <h1>Σύνδεση</h1>

  <form method="POST" action="php/login_handler.php">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Κωδικός:</label>
    <input type="password" name="password" required>

    <button type="submit">Σύνδεση</button>
  </form>

  <?php if (isset($_SESSION['login_error'])): ?>
    <div class="message error-message"><?= htmlspecialchars($_SESSION['login_error']); unset($_SESSION['login_error']); ?></div>
  <?php elseif (isset($_SESSION['login_success'])): ?>
    <div class="message success-message"><?= htmlspecialchars($_SESSION['login_success']); unset($_SESSION['login_success']); ?></div>
  <?php endif; ?>
</div>
</body>
</html>