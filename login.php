<?php
require 'config/db.php';
require 'config/validate.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $email = sanitize_text($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash_error'] = 'Please enter a valid email address.';
    header('Location: login.php');
    exit;
  }

  if (empty($password)) {
    $_SESSION['flash_error'] = 'Please enter your password.';
    header('Location: login.php');
    exit;
  }

  $stmt = $pdo->prepare(
    "SELECT id, password, role FROM users WHERE email = :email LIMIT 1"
  );

  $stmt->execute([
    'email' => $email
  ]);

  $user = $stmt -> fetch();

  if (!$user) {
    $_SESSION['flash_error'] = 'Invalid email or password.';
    header('Location: login.php');
    exit;
  }

  if (!password_verify($password, $user['password'])){
    $_SESSION['flash_error'] = 'Invalid email or password.';
    header('Location: login.php');
    exit;
  }
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['role'] = $user['role'] ?? 'customer';

  $_SESSION['flash_success'] = 'Signed in successfully.';
  header('Location: index.php');
  exit;
}

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign in | Bean and Brew</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <body>
    <!-- HEADER START -->
    <header class="site-header">
      <div class="container header-inner">
        <a class="logo" href="index.php" aria-label="Bean and Brew homepage">
          <img src="assets/images/logo.svg" alt="Bean and Brew logo" />
          <span class="logo-text">Bean and Brew</span>
        </a>
        <nav class="site-nav" aria-label="Primary">
          <ul class="nav-list">
            <li><a class="nav-link" href="index.php">Home</a></li>
            <li><a class="nav-link" href="book.php">Book</a></li>
            <li><a class="nav-link" href="preorder.php">Pre-order</a></li>
            <li><a class="nav-link" href="lessons.php">Lessons</a></li>
            <li><a class="nav-link" href="account.php">Account</a></li>
          </ul>
        </nav>
      </div>
    </header>
    <!-- HEADER END -->

    <!-- FLASH MESSAGES -->
    <?php if (!empty($_SESSION['flash_success']) || !empty($_SESSION['flash_error'])): ?>
      <div class="flash-wrap">
        <?php if (!empty($_SESSION['flash_success'])): ?>
          <div class="flash flash-success">
            <?php echo htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES, 'UTF-8'); ?>
          </div>
        <?php endif; ?>
        <?php if (!empty($_SESSION['flash_error'])): ?>
          <div class="flash flash-error">
            <?php echo htmlspecialchars($_SESSION['flash_error'], ENT_QUOTES, 'UTF-8'); ?>
          </div>
        <?php endif; ?>
      </div>
      <?php
        unset($_SESSION['flash_success'], $_SESSION['flash_error']);
      ?>
    <?php endif; ?>

    <main class="auth-page">
      <!-- AUTH INTRO START -->
      <section class="section auth-hero">
        <div class="container auth-inner">
          <div class="auth-copy">
            <p class="eyebrow">Account</p>
            <h1>Sign in</h1>
            <p class="lead">Access your bookings, collections, and saved orders.</p>
          </div>
        </div>
      </section>
      <!-- AUTH INTRO END -->

      <!-- AUTH FORM START -->
      <section class="section auth-form">
        <div class="container auth-inner">
          <form class="auth-card" action="#" method="post">
            <div class="field">
              <label for="login-email">Email</label>
              <input
                id="login-email"
                name="email"
                type="email"
                autocomplete="email"
              />
            </div>
            <div class="field">
              <label for="login-password">Password</label>
              <input
                id="login-password"
                name="password"
                type="password"
                autocomplete="current-password"
              />
            </div>
            <button class="btn btn-primary" type="submit">Sign in</button>
            <p class="auth-helper">Forgot your password? Reset soon.</p>
            <p class="auth-alt">
              Don’t have an account? <a href="register.php">Register</a>
            </p>
          </form>
        </div>
      </section>
      <!-- AUTH FORM END -->
    </main>

    <!-- FOOTER START -->
    <footer class="site-footer">
      <div class="container footer-inner">
        <div>
          <p class="footer-brand">Bean and Brew</p>
          <p class="footer-note">Calm coffee, crafted daily.</p>
        </div>
        <nav class="footer-nav" aria-label="Footer">
          <a href="#">Locations</a>
          <a href="#">Contact</a>
          <a href="#">Privacy</a>
        </nav>
      </div>
    </footer>
    <!-- FOOTER END -->
  </body>
</html>
