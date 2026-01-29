<?php
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['full_name']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirmPassword = $_POST['confirm_password'];
  

  if ($password !== $confirmPassword){
    die('Passwords do not match');
  }

  $checkStmt = $pdo->prepare(
    "SELECT id FROM users WHERE email = :email LIMIT 1"
  );

  $checkStmt -> execute([
    'email' => $email
  ]);

  if ($checkStmt->fetch()){
    die('An account with this email already exists');
  }

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $stmt = $pdo->prepare(
    "INSERT INTO users(name, email, password)
    VALUES (:name, :email, :password)"
  );

  $stmt->execute([
    'name' => $name,
    'email' => $email,
    'password' => $hashedPassword
  ]);
  

  echo 'User registered successfully';
}


?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create an Account | Bean and Brew</title>
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

    <main class="auth-page">
      <!-- AUTH INTRO START -->
      <section class="section auth-hero">
        <div class="container auth-inner">
          <div class="auth-copy">
            <p class="eyebrow">Account</p>
            <h1>Create an account</h1>
            <p class="lead">Join for quicker bookings and saved favourites.</p>
          </div>
        </div>
      </section>
      <!-- AUTH INTRO END -->

      <!-- AUTH FORM START -->
      <section class="section auth-form">
        <div class="container auth-inner">
          <form class="auth-card" action="#" method="post">
            <div class="field">
              <label for="register-name">Full name</label>
              <input
                id="register-name"
                name="full_name"
                type="text"
                autocomplete="name"
              />
            </div>
            <div class="field">
              <label for="register-email">Email</label>
              <input
                id="register-email"
                name="email"
                type="email"
                autocomplete="email"
              />
            </div>
            <div class="field">
              <label for="register-password">Password</label>
              <input
                id="register-password"
                name="password"
                type="password"
                autocomplete="new-password"
              />
            </div>
            <div class="field">
              <label for="register-confirm">Confirm password</label>
              <input
                id="register-confirm"
                name="confirm_password"
                type="password"
                autocomplete="new-password"
              />
            </div>
            <button class="btn btn-primary" type="submit">Create account</button>
            <p class="auth-alt">
              Already have an account? <a href="login.php">Sign in</a>
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
