<?php 
include 'header.php'; 

require 'config/db.php';

if (!isset ($_SESSION['user_id'])){
  header('Location: login.php');
  exit;
}



if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $userId = $_SESSION['user_id'];
  $location = trim($_POST['location']);
  $date = $_POST['booking_date'];
  $time = $_POST['booking_time'];
  $guests = (int) $_POST['guests'];

  $stmt = $pdo->prepare(
    "INSERT INTO bookings (user_id, location, booking_date, booking_time, guests)
    VALUES (:user_id, :location, :booking_date, :booking_time, :guests)"
  );


$stmt->execute([
    'user_id' => $userId,
    'location' => $location,
    'booking_date' => $date,
    'booking_time' => $time,
    'guests' => $guests
  ]);

  $bookingMessage = 'Reservation received. We will hold your table for 10 minutes.';
  $bookingMessageType = 'success';
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Book a Table | Bean and Brew</title>
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
      <!-- BOOK PAGE HERO UPDATE -->
      <section class="page-hero book-hero">
        <div class="book-hero-media">
          <img src="assets/images/hero.jpg" alt="Sunlit café table" />
        </div>
        <div class="container book-hero-content">
          <div class="page-hero-copy">
            <p class="eyebrow">Book a table</p>
            <h1>Quiet tables, ready when you are.</h1>
            <p class="lead">
              Reserve a calm corner in under a minute. We hold every table for a
              gentle arrival.
            </p>
          </div>
        </div>
      </section>
      <!-- PAGE HERO END -->

      <!-- BOOKING FORM START -->
      <section class="section booking-form">
        <div class="container">
          <?php if (!empty($bookingMessage)) : ?>
            <div class="message message--<?php echo htmlspecialchars($bookingMessageType ?? 'info', ENT_QUOTES, 'UTF-8'); ?>">
              <?php echo htmlspecialchars($bookingMessage, ENT_QUOTES, 'UTF-8'); ?>
            </div>
          <?php endif; ?>
          <form class="booking-steps" action="#" method="post">
            <div class="form-grid">
              <div class="field">
                <label for="location">Location</label>
                <select id="location" name="location" required>
                  <option value="" disabled selected>Select a café</option>
                  <option>Riverside</option>
                  <option>Old Town</option>
                  <option>Market Street</option>
                </select>
                <p class="field-help">Choose the space that fits your pace.</p>
              </div>
              <div class="field">
                <label for="date">Date</label>
                <input id="date" name="booking_date" type="date" />
                <p class="field-help">Reservations open up to 7 days ahead.</p>
              </div>
              <div class="field">
                <label for="time">Time</label>
                <select id="time" name="booking_time">
                  <option value="" disabled selected>Select a time</option>
                  <option>08:30</option>
                  <option>09:00</option>
                  <option>09:30</option>
                  <option>10:00</option>
                  <option>10:30</option>
                </select>
                <p class="field-help">Quiet seating is spaced every 15 minutes.</p>
              </div>
              <div class="field">
                <label for="party">Party size</label>
                <select id="guests" name="guests">
                  <option>2 guests</option>
                  <option>3 guests</option>
                  <option>4 guests</option>
                  <option>5 guests</option>
                  <option>6 guests</option>
                </select>
                <p class="field-help">Larger groups are welcome with notice.</p>
              </div>
            </div>
            <div class="form-actions">
              <button class="btn btn-primary" type="submit">Reserve table</button>
              <p class="field-help">We’ll hold your table for 10 minutes.</p>
            </div>
          </form>
        </div>
      </section>
      <!-- BOOKING FORM END -->
    </main>

    <?php include 'footer.php'; ?>

    <script>
      (function () {
        const dateInput = document.getElementById('date');
        const timeSelect = document.getElementById('time');
        if (!dateInput || !timeSelect) return;

        const now = new Date();
        const yyyy = now.getFullYear();
        const mm = String(now.getMonth() + 1).padStart(2, '0');
        const dd = String(now.getDate()).padStart(2, '0');
        const todayStr = `${yyyy}-${mm}-${dd}`;

        dateInput.min = todayStr;
        if (!dateInput.value) dateInput.value = todayStr;

        function updateTimes() {
          const isToday = dateInput.value === todayStr;
          const currentMinutes = now.getHours() * 60 + now.getMinutes();
          Array.from(timeSelect.options).forEach((opt) => {
            if (!opt.value) return;
            const [h, m] = opt.value.split(':').map(Number);
            const optMinutes = h * 60 + m;
            opt.disabled = isToday && optMinutes <= currentMinutes;
          });
          if (timeSelect.options[timeSelect.selectedIndex]?.disabled) {
            timeSelect.selectedIndex = 0;
          }
        }

        dateInput.addEventListener('change', updateTimes);
        updateTimes();
      })();
    </script>
  </body>
</html>
