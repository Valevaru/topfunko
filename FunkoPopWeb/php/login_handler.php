<?php
session_start();
require_once 'db_connect.php';

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    $_SESSION['login_error'] = "⚠️ Συμπληρώστε όλα τα πεδία.";
    header("Location: ../login.php");
    exit;
}

// Έλεγχος στη βάση
$stmt = $conn->prepare("SELECT id, name, password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['login_success'] = "✅ Επιτυχής σύνδεση!";
        header("Location: ../dashboard.php"); // ή index.php
        exit;
    }
}

$_SESSION['login_error'] = "❌ Λανθασμένο email ή κωδικός.";
header("Location: ../login.php");
exit;