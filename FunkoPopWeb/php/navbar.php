<?php
// Έναρξη συνεδρίας αν δεν έχει ξεκινήσει ήδη
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ανάκτηση ονόματος χρήστη αν είναι συνδεδεμένος
$user = $_SESSION['first_name'] ?? null;

// Τρέχουσα σελίδα για ενεργή επισήμανση στο menu
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- ======= Πλοήγηση (Navbar) ======= -->
<section class="navbar">
  <div class="header">
    <h1><a href="/funkopopweb/index.php" style="text-decoration: none; color: inherit;">topfunko</a></h1>
  </div>

  <div>
    <ul class="menu-list">
      <?php if (!isset($_SESSION['user_id'])): ?>
        <li class="menu-list-item">
          <a href="#" class="menu-link" onclick="openAuthPopup()">Σύνδεση ή Εγγραφή</a>
        </li>
      <?php endif; ?>

      <li class="menu-list-item">
        <a class="menu-link <?php echo ($current_page == 'index.php') ? 'active' : ''; ?>" href="/funkopopweb/index.php">Αρχική</a>
      </li>
      <li class="menu-list-item">
        <a class="menu-link <?php echo ($current_page == 'about.php') ? 'active' : ''; ?>" href="/funkopopweb/about.php">Σχετικά</a>
      </li>
      <li class="menu-list-item">
        <a class="menu-link <?php echo ($current_page == 'contact.php') ? 'active' : ''; ?>" href="/funkopopweb/contact.php">Επικοινωνία</a>
      </li>
      <li class="menu-list-item">
        <a class="menu-link <?php echo ($current_page == 'cart.php') ? 'active' : ''; ?>" href="/funkopopweb/cart.php">Καλάθι</a>
      </li>

      <?php if ($user): ?>
        <li class="menu-list-item">
          <a class="menu-link" href="/funkopopweb/logout.php">Αποσύνδεση</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</section>

<!-- ======= Λογότυπο + Μήνυμα ======= -->
<section class="logo">
  <img id="logo-img" src="/funkopopweb/media/build/funko_logo.png" alt="Λογότυπο TopFunko">
  <div class="phrase">
    <h2>Τα πιο σπάνια συλλεκτικά Funko σε μία θέση!</h2>
  </div>
</section>

<subtitle id="always">Collect them all...</subtitle>

<!-- ======= Popup Σύνδεσης / Εγγραφής ======= -->
<div id="authPopup" class="popup-container" style="display: none;">
  <div class="popup-box">
    <h3>Θέλετε να συνδεθείτε ή να εγγραφείτε;</h3>
    <a href="/funkopopweb/login.php" class="popup-button">Σύνδεση</a>
    <a href="/funkopopweb/register.php" class="popup-button">Εγγραφή</a>
    <div class="popup-close" onclick="closeAuthPopup()">✕</div>
  </div>
</div>

<!-- ======= JavaScript για popup ======= -->
<script>
function openAuthPopup() {
  document.getElementById('authPopup').style.display = 'flex';
}
function closeAuthPopup() {
  document.getElementById('authPopup').style.display = 'none';
}
</script>