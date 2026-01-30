<?php
require 'config/db.php';
require 'config/validate.php';
include 'header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['csrf_token']) || $_POST['csrf_token'] !== ($_SESSION['csrf_token'] ?? '')) {
    $_SESSION['flash_error'] = 'Something went wrong. Please try again.';
    header('Location: lessons.php');
    exit;
  }

  if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash_error'] = 'Please sign in to book a lesson.';
    header('Location: login.php');
    exit;
  }

  $lessonId = (int) ($_POST['lesson_id'] ?? 0);
  if ($lessonId <= 0) {
    $_SESSION['flash_error'] = 'Invalid lesson selection.';
    header('Location: lessons.php');
    exit;
  }

  try {
    $pdo->beginTransaction();

    $stmt = $pdo->prepare("SELECT capacity FROM lessons WHERE id = :id");
    $stmt->execute(['id' => $lessonId]);
    $lesson = $stmt->fetch();

    if (!$lesson) {
      $pdo->rollBack();
      $_SESSION['flash_error'] = 'Lesson not found.';
      header('Location: lessons.php');
      exit;
    }

    $stmt = $pdo->prepare(
      "SELECT COUNT(*) FROM lesson_bookings WHERE lesson_id = :lesson_id"
    );
    $stmt->execute(['lesson_id' => $lessonId]);
    $bookedCount = (int) $stmt->fetchColumn();

    if ($bookedCount >= (int) $lesson['capacity']) {
      $pdo->rollBack();
      $_SESSION['flash_error'] = 'This lesson is fully booked.';
      header('Location: lessons.php');
      exit;
    }

    $stmt = $pdo->prepare(
      "SELECT 1 FROM lesson_bookings WHERE user_id = :user_id AND lesson_id = :lesson_id"
    );
    $stmt->execute([
      'user_id' => $_SESSION['user_id'],
      'lesson_id' => $lessonId
    ]);

    if ($stmt->fetchColumn()) {
      $pdo->rollBack();
      $_SESSION['flash_error'] = 'You have already booked this lesson.';
      header('Location: lessons.php');
      exit;
    }

    $stmt = $pdo->prepare(
      "INSERT INTO lesson_bookings (user_id, lesson_id) VALUES (:user_id, :lesson_id)"
    );
    $stmt->execute([
      'user_id' => $_SESSION['user_id'],
      'lesson_id' => $lessonId
    ]);

    $pdo->commit();
    $_SESSION['flash_success'] = 'Lesson booked successfully.';
    header('Location: lessons.php');
    exit;
  } catch (Throwable $e) {
    if ($pdo->inTransaction()) {
      $pdo->rollBack();
    }
    $_SESSION['flash_error'] = 'Something went wrong. Please try again.';
    header('Location: lessons.php');
    exit;
  }
}

$stmt = $pdo->prepare(
  "SELECT id, title, lesson_date, lesson_time, capacity
  FROM lessons
  ORDER BY lesson_date ASC, lesson_time ASC"
);
$stmt->execute();
$lessons = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lessons | Bean and Brew</title>
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
      <!-- LESSONS HERO VARIATION -->
      <section class="page-hero lessons-hero">
        <div class="container page-hero-inner">
          <div class="page-hero-media image-block">
            <img src="assets/images/hero.jpg" alt="Baking lesson table" />
          </div>
          <div class="page-hero-copy">
            <p class="eyebrow">Baking lessons</p>
            <h1>Learn the craft behind every bake.</h1>
            <p class="lead">
              Small groups, hands-on guidance, and a calm pace for every level.
            </p>
          </div>
        </div>
      </section>
      <!-- PAGE HERO END -->

      <!-- DYNAMIC LESSONS START -->
      <section class="section lessons">
        <div class="container">
          <div class="lessons-grid">
            <?php if (!empty($lessons)) : ?>
              <?php foreach ($lessons as $lesson) : ?>
                <?php
                  $lessonDate = $lesson['lesson_date'] ?? '';
                  $lessonTime = $lesson['lesson_time'] ?? '';
                  $dateLabel = $lessonDate ? date('D', strtotime($lessonDate)) : 'Day';
                  $timeLabel = $lessonTime ? date('H:i', strtotime($lessonTime)) : 'Time';
                  $capacity = (int) ($lesson['capacity'] ?? 0);
                  $statusClass = $capacity > 0 && $capacity <= 8 ? 'limited' : 'available';
                  $statusLabel = $statusClass === 'limited' ? 'Limited spots' : 'Spaces open';
                ?>
                <article class="lesson-card">
                  <div class="lesson-media image-block">
                    <img
                      src="assets/images/hero1.jpg"
                      alt="<?php echo htmlspecialchars($lesson['title'] ?? 'Lesson', ENT_QUOTES, 'UTF-8'); ?>"
                    />
                  </div>
                  <div class="lesson-body">
                    <h3><?php echo htmlspecialchars($lesson['title'] ?? 'Lesson', ENT_QUOTES, 'UTF-8'); ?></h3>
                    <div class="lesson-meta">
                      <span><?php echo htmlspecialchars($dateLabel, ENT_QUOTES, 'UTF-8'); ?> · <?php echo htmlspecialchars($timeLabel, ENT_QUOTES, 'UTF-8'); ?></span>
                      <span class="status-pill <?php echo $statusClass; ?>"><?php echo $statusLabel; ?></span>
                    </div>
                    <p class="card-text">Small group lesson with a calm, guided pace.</p>
                    <form method="post" action="lessons.php">
                      <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" />
                      <input type="hidden" name="lesson_id" value="<?php echo (int) ($lesson['id'] ?? 0); ?>" />
                      <button class="btn btn-secondary" type="submit">Book lesson</button>
                    </form>
                  </div>
                </article>
              <?php endforeach; ?>
            <?php else : ?>
              <p class="empty-state">No lessons are currently available.</p>
            <?php endif; ?>
          </div>
        </div>
      </section>
      <!-- DYNAMIC LESSONS END -->
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
