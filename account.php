<?php
include 'header.php';
require 'config/db.php';

if (!isset($_SESSION['user_id'])){
  header('Location: login.php');
  exit;
}

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare(
    "SELECT id, collection_time, created_at, order_status
    FROM orders
    WHERE user_id = :user_id
    ORDER BY created_at DESC"
);

$stmt->execute([
    'user_id' => $_SESSION['user_id']
]);

$orders = $stmt->fetchAll();

$stmt = $pdo->prepare(
  "SELECT l.title, l.lesson_date, l.lesson_time, lb.created_at
  FROM lesson_bookings lb
  INNER JOIN lessons l ON l.id = lb.lesson_id
  WHERE lb.user_id = :user_id
  ORDER BY l.lesson_date DESC, l.lesson_time DESC"
);
$stmt->execute([
  'user_id' => $userId
]);
$lessonsBooked = $stmt->fetchAll();

$stmt = $pdo->prepare(
  "SELECT location, booking_date, booking_time, guests, created_at
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
                      <p class="list-secondary">
                        <?php
                          $createdAt = $booking['created_at'] ?? '';
                          $createdLabel = $createdAt ? date('M j, Y · H:i', strtotime($createdAt)) : 'Created';
                          echo htmlspecialchars($createdLabel, ENT_QUOTES, 'UTF-8');
                        ?>
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

          <!-- ORDERS SECTION START -->
          <div class="account-section">
            <h2>Your orders</h2>
            <?php if (!empty($orders)) : ?>
              <?php foreach ($orders as $order) : ?>
                <?php
                  $orderId = (int) ($order['id'] ?? 0);
                  $itemsStmt = $pdo->prepare(
                    "SELECT product_name, quantity, price
                    FROM order_items
                    WHERE order_id = :order_id"
                  );
                  $itemsStmt->execute(['order_id' => $orderId]);
                  $orderItems = $itemsStmt->fetchAll();
                  $orderTotal = 0;
                ?>
                <div class="list-group">
                  <div class="list-item">
                    <div>
                      <p class="list-primary">
                        <?php
                          $date = $order['created_at'] ?? '';
                          $dateLabel = $date ? date('M j, Y', strtotime($date)) : 'Order date';
                          echo htmlspecialchars($dateLabel, ENT_QUOTES, 'UTF-8');
                        ?>
                      </p>
                      <p class="list-secondary">
                        Collection · <?php echo htmlspecialchars($order['collection_time'] ?? 'Time', ENT_QUOTES, 'UTF-8'); ?>
                      </p>
                      <p class="list-secondary">
                        <?php
                          $createdAt = $order['created_at'] ?? '';
                          $createdLabel = $createdAt ? date('M j, Y · H:i', strtotime($createdAt)) : 'Created';
                          echo htmlspecialchars($createdLabel, ENT_QUOTES, 'UTF-8');
                        ?>
                      </p>
                    </div>
                    <?php
                      $status = $order['order_status'] ?? 'pending';
                      $statusClass = $status === 'completed' ? 'completed' : 'upcoming';
                    ?>
                    <span class="status-pill <?php echo $statusClass; ?>">
                      <?php echo htmlspecialchars(ucfirst($status), ENT_QUOTES, 'UTF-8'); ?>
                    </span>
                  </div>
                  <?php foreach ($orderItems as $item) : ?>
                    <?php
                      $qty = (int) ($item['quantity'] ?? 1);
                      $price = (float) ($item['price'] ?? 0);
                      $lineTotal = $qty * $price;
                      $orderTotal += $lineTotal;
                    ?>
                    <div class="list-item">
                      <div>
                        <p class="list-primary"><?php echo htmlspecialchars($item['product_name'] ?? 'Item', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="list-secondary">Qty <?php echo $qty; ?></p>
                      </div>
                      <span>£<?php echo number_format($lineTotal, 2); ?></span>
                    </div>
                  <?php endforeach; ?>
                  <div class="list-item">
                    <div>
                      <p class="list-primary">Total</p>
                    </div>
                    <span>£<?php echo number_format($orderTotal, 2); ?></span>
                  </div>
                </div>
              <?php endforeach; ?>
            <?php else : ?>
              <p class="empty-state">You haven’t placed any orders yet.</p>
            <?php endif; ?>
          </div>
          <!-- ORDERS SECTION END -->

          <!-- LESSONS SECTION START -->
          <div class="account-section">
            <h2>Your lessons</h2>
            <?php if (!empty($lessonsBooked)) : ?>
              <ul class="list-group">
                <?php foreach ($lessonsBooked as $lesson) : ?>
                  <li class="list-item">
                    <div>
                      <p class="list-primary">
                        <?php echo htmlspecialchars($lesson['title'] ?? 'Lesson', ENT_QUOTES, 'UTF-8'); ?>
                      </p>
              <p class="list-secondary">
                <?php
                  $lessonDate = $lesson['lesson_date'] ?? '';
                  $lessonDateLabel = $lessonDate ? date('M j, Y', strtotime($lessonDate)) : 'Date';
                  echo htmlspecialchars($lessonDateLabel, ENT_QUOTES, 'UTF-8');
                ?>
                ·
                <?php echo htmlspecialchars($lesson['lesson_time'] ?? 'Time', ENT_QUOTES, 'UTF-8'); ?>
              </p>
              <p class="list-secondary">
                <?php
                  $lessonCreated = $lesson['created_at'] ?? '';
                  $lessonCreatedLabel = $lessonCreated ? date('M j, Y · H:i', strtotime($lessonCreated)) : 'Booked';
                  echo htmlspecialchars($lessonCreatedLabel, ENT_QUOTES, 'UTF-8');
                ?>
              </p>
            </div>
          </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
            <p class="empty-state">You haven’t booked any lessons yet.</p>
          <?php endif; ?>
        </div>
          <!-- LESSONS SECTION END -->
        </div>
      </section>
      <!-- ACCOUNT OVERVIEW END -->
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
