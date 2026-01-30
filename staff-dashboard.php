<?php
require 'config/db.php';
require 'config/validate.php';
session_start();

if (!isset($_SESSION['user_id']) || ($_SESSION['role'] ?? '') !== 'staff') {
  header('Location: staff-login.php');
  exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
    $_SESSION['flash_error'] = 'Something went wrong. Please try again.';
    header('Location: staff-dashboard.php');
    exit;
  }

  $orderId = (int) ($_POST['order_id'] ?? 0);
  if ($orderId > 0) {
    $stmt = $pdo->prepare(
      "UPDATE orders SET order_status = 'completed' WHERE id = :id"
    );
    $stmt->execute(['id' => $orderId]);
    $_SESSION['flash_success'] = 'Order marked as completed.';
  }
  header('Location: staff-dashboard.php');
  exit;
}

$stmt = $pdo->prepare(
  "SELECT location, booking_date, booking_time, guests, created_at
  FROM bookings
  WHERE booking_date = CURDATE()
  ORDER BY booking_time ASC"
);
$stmt->execute();
$todayBookings = $stmt->fetchAll();

$stmt = $pdo->prepare(
  "SELECT id, collection_time, created_at, order_status
  FROM orders
  WHERE DATE(created_at) = CURDATE()
  ORDER BY collection_time ASC"
);
$stmt->execute();
$todayOrders = $stmt->fetchAll();

$stmt = $pdo->prepare(
  "SELECT l.title, l.lesson_date, l.lesson_time, lb.created_at
  FROM lesson_bookings lb
  INNER JOIN lessons l ON l.id = lb.lesson_id
  ORDER BY l.lesson_date ASC, l.lesson_time ASC"
);
$stmt->execute();
$lessonBookings = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Staff Dashboard | Bean and Brew</title>
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

    <main>
      <section class="page-hero page-hero-compact">
        <div class="container page-hero-inner">
          <div class="page-hero-copy">
            <p class="eyebrow">Staff</p>
            <h1>Today’s overview.</h1>
            <p class="lead">Bookings, pre-orders, and lesson activity.</p>
          </div>
        </div>
      </section>

      <section class="section account">
        <div class="container account-wrap">
          <div class="account-section">
            <h2>Today’s table bookings</h2>
            <?php if (!empty($todayBookings)) : ?>
              <ul class="list-group">
                <?php foreach ($todayBookings as $booking) : ?>
                  <li class="list-item">
                    <div>
                      <p class="list-primary"><?php echo htmlspecialchars($booking['location'] ?? 'Location', ENT_QUOTES, 'UTF-8'); ?></p>
                      <p class="list-secondary">
                        <?php echo htmlspecialchars($booking['booking_date'] ?? 'Date', ENT_QUOTES, 'UTF-8'); ?>
                        ·
                        <?php echo htmlspecialchars($booking['booking_time'] ?? 'Time', ENT_QUOTES, 'UTF-8'); ?>
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
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
              <p class="empty-state">No table bookings for today.</p>
            <?php endif; ?>
          </div>

          <div class="account-section">
            <h2>Today’s pre-orders</h2>
            <?php if (!empty($todayOrders)) : ?>
              <ul class="list-group">
                <?php foreach ($todayOrders as $order) : ?>
                  <?php
                    $status = $order['order_status'] ?? 'pending';
                    $statusClass = $status === 'completed' ? 'completed' : 'upcoming';
                  ?>
                  <li class="list-item">
                    <div>
                      <p class="list-primary">Collection · <?php echo htmlspecialchars($order['collection_time'] ?? 'Time', ENT_QUOTES, 'UTF-8'); ?></p>
                      <p class="list-secondary">
                        <?php
                          $createdAt = $order['created_at'] ?? '';
                          $createdLabel = $createdAt ? date('M j, Y · H:i', strtotime($createdAt)) : 'Created';
                          echo htmlspecialchars($createdLabel, ENT_QUOTES, 'UTF-8');
                        ?>
                      </p>
                    </div>
                    <div>
                      <span class="status-pill <?php echo $statusClass; ?>"><?php echo htmlspecialchars(ucfirst($status), ENT_QUOTES, 'UTF-8'); ?></span>
                      <?php if ($status !== 'completed') : ?>
                        <form method="post" action="staff-dashboard.php">
                          <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                          <input type="hidden" name="order_id" value="<?php echo (int) ($order['id'] ?? 0); ?>" />
                          <button class="btn btn-secondary" type="submit">Mark completed</button>
                        </form>
                      <?php endif; ?>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
              <p class="empty-state">No pre-orders for today.</p>
            <?php endif; ?>
          </div>

          <div class="account-section">
            <h2>Lesson bookings</h2>
            <?php if (!empty($lessonBookings)) : ?>
              <ul class="list-group">
                <?php foreach ($lessonBookings as $lesson) : ?>
                  <li class="list-item">
                    <div>
                      <p class="list-primary"><?php echo htmlspecialchars($lesson['title'] ?? 'Lesson', ENT_QUOTES, 'UTF-8'); ?></p>
                      <p class="list-secondary">
                        <?php echo htmlspecialchars($lesson['lesson_date'] ?? 'Date', ENT_QUOTES, 'UTF-8'); ?>
                        ·
                        <?php echo htmlspecialchars($lesson['lesson_time'] ?? 'Time', ENT_QUOTES, 'UTF-8'); ?>
                      </p>
                      <p class="list-secondary">
                        <?php
                          $createdAt = $lesson['created_at'] ?? '';
                          $createdLabel = $createdAt ? date('M j, Y · H:i', strtotime($createdAt)) : 'Booked';
                          echo htmlspecialchars($createdLabel, ENT_QUOTES, 'UTF-8');
                        ?>
                      </p>
                    </div>
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php else : ?>
              <p class="empty-state">No lesson bookings yet.</p>
            <?php endif; ?>
          </div>
        </div>
      </section>
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
