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
    <?php include 'header.php'; ?>

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

      <!-- ACCOUNT OVERVIEW START -->
      <section class="section account">
        <div class="container account-wrap">
          <div class="account-section">
            <h2>Upcoming bookings</h2>
            <ul class="list-group">
              <li class="list-item">
                <div>
                  <p class="list-primary">Riverside · Window table</p>
                  <p class="list-secondary">Fri · 09:30 · Party of 2</p>
                </div>
                <span class="status-pill confirmed">Confirmed</span>
              </li>
              <li class="list-item">
                <div>
                  <p class="list-primary">Old Town · Community table</p>
                  <p class="list-secondary">Sat · 11:00 · Party of 4</p>
                </div>
                <span class="status-pill upcoming">Upcoming</span>
              </li>
            </ul>
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
