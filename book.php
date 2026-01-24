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
    <?php include 'header.php'; ?>

    <main>
      <!-- BOOK PAGE HERO UPDATE -->
      <section class="page-hero book-hero">
        <div class="book-hero-media">
          <img src="assets/images/hero.jpg" alt="Sunlit cafe table" />
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
          <form class="booking-steps" action="#" method="post">
            <div class="form-grid">
              <div class="field">
                <label for="location">Location</label>
                <select id="location" name="location">
                  <option>Select a café</option>
                  <option>Riverside</option>
                  <option>Old Town</option>
                  <option>Market Street</option>
                </select>
                <p class="field-help">Choose the space that fits your pace.</p>
              </div>
              <div class="field">
                <label for="date">Date</label>
                <input id="date" name="date" type="date" />
                <p class="field-help">Reservations open up to 7 days ahead.</p>
              </div>
              <div class="field">
                <label for="time">Time</label>
                <select id="time" name="time">
                  <option>Select a time</option>
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
                <select id="party" name="party">
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
              <button class="btn btn-primary" type="button">Reserve table</button>
              <p class="field-help">We’ll hold your table for 10 minutes.</p>
            </div>
          </form>
        </div>
      </section>
      <!-- BOOKING FORM END -->
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
