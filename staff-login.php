<?php
require 'config/db.php';
require 'config/validate.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = sanitize_text($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['flash_error'] = 'Please enter a valid staff email.';
    header('Location: staff-login.php');
    exit;
  }

  if (empty($password)) {
    $_SESSION['flash_error'] = 'Please enter your password.';
    header('Location: staff-login.php');
    exit;
  }

  $stmt = $pdo->prepare(
    "SELECT id, password, role FROM users WHERE email = :email LIMIT 1"
  );
  $stmt->execute(['email' => $email]);
  $user = $stmt->fetch();

  if (!$user || ($user['role'] ?? '') !== 'staff') {
    $_SESSION['flash_error'] = 'Staff access only.';
    header('Location: staff-login.php');
    exit;
  }

  if (!password_verify($password, $user['password'])) {
    $_SESSION['flash_error'] = 'Invalid email or password.';
    header('Location: staff-login.php');
    exit;
  }

  $_SESSION['user_id'] = $user['id'];
  $_SESSION['role'] = $user['role'];
  $_SESSION['flash_success'] = 'Staff sign-in successful.';
  header('Location: staff-dashboard.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Staff Sign In | Bean and Brew</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <body>
    <?php include 'header.php'; ?>

    <main class="auth-page">
      <section class="section auth-hero">
        <div class="container auth-inner">
          <div class="auth-copy">
            <p class="eyebrow">Staff</p>
            <h1>Staff sign in</h1>
            <p class="lead">Access today’s operations and bookings.</p>
          </div>
        </div>
      </section>

      <section class="section auth-form">
        <div class="container auth-inner">
          <form class="auth-card" action="staff-login.php" method="post">
            <div class="field">
              <label for="staff-email">Email</label>
              <input id="staff-email" name="email" type="email" autocomplete="email" />
            </div>
            <div class="field">
              <label for="staff-password">Password</label>
              <input id="staff-password" name="password" type="password" autocomplete="current-password" />
            </div>
            <button class="btn btn-primary" type="submit">Sign in</button>
          </form>
        </div>
      </section>
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
