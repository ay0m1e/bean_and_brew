<?php
include 'header.php';
require 'config/db.php';

if (!isset($_SESSION['user_id'])){
  header('Location: login.php');
  exit;
}

$userId = $_SESSION['user_id'];


$stmt = $pdo->prepare(
  "SELECT location, booking_date, booking_time, guests
  FROM bookings
  WHERE user_id = :user_id
  ORDER BY booking_date DESC, booking_time DESC"
);

$stmt ->execute([
  'user_id'=> $userId
]);

$bookings = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Account | Bean and Brew</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="assets/css/styles.css" />
  </head>
  <body>

    <main>
      <!-- PAGE HERO START -->
      <section class="page-hero page-hero-compact">
        <div class="container page-hero-inner">
          <div class="page-hero-copy">
            <p class="eyebrow">Account</p>
            <h1>Your upcoming visits and orders.</h1>
            <p class="lead">Everything you need, kept simple and calm.</p>
          </div>
        </div>
      </section>
      <!-- PAGE HERO END -->

      <!-- BACKEND MESSAGE DISPLAY -->
      <?php if (!empty($message)) : ?>
        <section class="section account-message">
          <div class="container">
            <div class="message message--<?php echo htmlspecialchars($messageType ?? 'info', ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <!-- ACCOUNT OVERVIEW START -->
      <section class="section account">
        <div class="container account-wrap">
          <div class="account-section">
            <h2>Upcoming bookings</h2>
            <!-- ACCOUNT DATA DISPLAY -->
            <?php if (!empty($bookings) && is_array($bookings)) : ?>
              <ul class="list-group">
                <?php foreach ($bookings as $booking) : ?>
                  <li class="list-item">
                    <div>
                      <p class="list-primary">
                        <?php echo htmlspecialchars($booking['location'] ?? 'Location', ENT_QUOTES, 'UTF-8'); ?>
                      </p>
                      <p class="list-secondary">
                        <?php echo htmlspecialchars($booking['date'] ?? 'Date', ENT_QUOTES, 'UTF-8'); ?>
                        ·
                        <?php echo htmlspecialchars($booking['time'] ?? 'Time', ENT_QUOTES, 'UTF-8'); ?>
                        ·
                        <?php echo htmlspecialchars($booking['guests'] ?? 'Guests', ENT_QUOTES, 'UTF-8'); ?>
                      </p>
                    </div>
                    <span class="status-pill confirmed">Confirmed</span>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
              <p class="empty-state">No upcoming bookings yet.</p>
            <?php endif; ?>
          </div>

          <div class="account-section">
            <h2>Upcoming pre-orders</h2>
            <ul class="list-group">
              <li class="list-item">
                <div>
                  <p class="list-primary">Oat Milk Latte + Almond Croissant</p>
                  <p class="list-secondary">Collection · Today · 08:45</p>
                </div>
                <span class="status-pill ready">In progress</span>
              </li>
              <li class="list-item">
                <div>
                  <p class="list-primary">Maple Cold Brew + Seasonal Loaf</p>
                  <p class="list-secondary">Collection · Sun · 10:15</p>
                </div>
                <span class="status-pill upcoming">Scheduled</span>
              </li>
            </ul>
          </div>

          <details class="account-section history">
            <summary>Past orders</summary>
            <ul class="list-group">
              <li class="list-item">
                <div>
                  <p class="list-primary">Citrus Cold Brew</p>
                  <p class="list-secondary">Yesterday · £4.90</p>
                </div>
                <span class="status-pill completed">Completed</span>
              </li>
              <li class="list-item">
                <div>
                  <p class="list-primary">Seasonal Matcha Cloud</p>
                  <p class="list-secondary">Tue · £5.40</p>
                </div>
                <span class="status-pill completed">Completed</span>
              </li>
            </ul>
          </details>
        </div>
      </section>
      <!-- ACCOUNT OVERVIEW END -->
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
