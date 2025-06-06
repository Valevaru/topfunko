<?php
session_start();
require_once 'db_connect.php';

function isLatin($text) {
    return preg_match('/^[a-zA-Z]+$/', $text);
}

$name = trim($_POST['name'] ?? '');
$surname = trim($_POST['surname'] ?? '');
$email = trim($_POST['email'] ?? '');
$password_raw = $_POST['password'] ?? '';
$password_confirm = $_POST['confirm_password'] ?? '';

if (!$name || !$surname || !$email || !$password_raw || !$password_confirm) {
    $_SESSION['register_error'] = "⚠️ Συμπληρώστε όλα τα πεδία.";
    header("Location: ../register.php");
    exit;
} elseif (!isLatin($name) || !isLatin($surname)) {
    $_SESSION['register_error'] = "⚠️ Το όνομα και το επώνυμο πρέπει να είναι με λατινικούς χαρακτήρες μόνο.";
    header("Location: ../register.php");
    exit;
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['register_error'] = "⚠️ Το email δεν είναι έγκυρο.";
    header("Location: ../register.php");
    exit;
} elseif (!preg_match('/^[a-zA-Z0-9]+$/', str_replace(['@', '.'], '', $email))) {
    $_SESSION['register_error'] = "⚠️ Το email πρέπει να περιέχει μόνο λατινικούς χαρακτήρες.";
    header("Location: ../register.php");
    exit;
} elseif (strlen($password_raw) < 8 || !preg_match('/[a-zA-Z]/', $password_raw) || !preg_match('/[0-9]/', $password_raw)) {
    $_SESSION['register_error'] = "⚠️ Ο κωδικός πρέπει να έχει τουλάχιστον 8 χαρακτήρες και να περιέχει γράμματα και αριθμούς.";
    header("Location: ../register.php");
    exit;
} elseif ($password_raw !== $password_confirm) {
    $_SESSION['register_error'] = "⚠️ Οι κωδικοί δεν ταιριάζουν.";
    header("Location: ../register.php");
    exit;
} else {
    $password = password_hash($password_raw, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (name, surname, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $surname, $email, $password);

    if ($stmt->execute()) {
        // Επιτυχής εγγραφή - ορίζουμε session και πάμε στο dashboard
        $_SESSION['user_id'] = $stmt->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['register_success'] = "✅ Καλωσήρθες, $name!";
        header("Location: ../dashboard.php");
        exit;
    } else {
        $_SESSION['register_error'] = "❌ Η εγγραφή απέτυχε: " . $stmt->error;
        header("Location: ../register.php");
        exit;
    }
}