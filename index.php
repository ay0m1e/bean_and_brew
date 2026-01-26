<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bean and Brew | Calm Coffee</title>
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
      <!-- HERO BACKGROUND IMAGE -->
      <section class="hero">
        <div class="container hero-inner">
          <div class="hero-media reveal" aria-hidden="true"></div>
          <div class="hero-copy reveal">
            <p class="eyebrow">Bean and Brew</p>
            <!-- UPDATED HERO COPY -->
            <h1>Coffee and baking, crafted for unhurried mornings.</h1>
            <p class="lead">
              Espresso, fresh bakes, and warm tables, made daily with quiet care.
            </p>
            <div class="cta-group">
              <a class="btn btn-primary" href="preorder.php">Pre-order</a>
              <a class="btn btn-secondary" href="book.php">Book a table</a>
            </div>
          </div>
        </div>
      </section>
      <!-- HERO END -->

      <!-- SERVICES IMAGE UPDATE -->
      <section class="section services">
        <div class="container">
          <div class="section-head reveal">
            <p class="section-label">Services</p>
            <h2>Three fast ways to enjoy Bean and Brew.</h2>
            <p class="section-lead">
              Keep it quick or linger longer with intentional options.
            </p>
          </div>
          <div class="service-grid">
            <article class="card service-card is-featured reveal delay-1">
              <div class="service-media image-block">
                <img
                  src="assets/images/pre-order.jpg"
                  alt="Pre-order coffee and pastry spread"
                />
              </div>
              <h3>Pre-order</h3>
              <p class="card-text">Build your drink and collect at your time.</p>
              <a class="btn btn-secondary" href="preorder.php">Start pre-order</a>
            </article>
            <article class="card service-card reveal delay-2">
              <div class="service-media image-block">
                <img
                  src="assets/images/book-table.jpg"
                  alt="Reserved table with sunlight"
                />
              </div>
              <h3>Book a table</h3>
              <p class="card-text">Reserve a calm corner without the wait.</p>
              <a class="btn btn-secondary" href="book.php">Reserve a table</a>
            </article>
            <article class="card service-card reveal delay-3">
              <div class="service-media image-block">
                <img src="assets/images/baking-lesson.jpg" alt="Baking lesson setup" />
              </div>
              <h3>Baking lessons</h3>
              <p class="card-text">Learn pastry basics with guided tastings.</p>
              <a class="btn btn-secondary" href="lessons.php">View lessons</a>
            </article>
          </div>
        </div>
      </section>
      <!-- SERVICES END -->

      <!-- VISUAL PAUSE IMAGE UPDATE -->
      <section class="pause-strip">
        <div class="container pause-inner">
          <div class="pause-image image-block pause-hero reveal">
            <img
              src="assets/images/scenery1.jpg"
              alt="Café interior with soft morning light"
            />
            <div class="pause-overlay">
              <p class="section-label">A quiet pause</p>
              <h2>Soft light, warm cups, and room to breathe.</h2>
              <p class="section-lead">
                Inspired by a slower pace and a deliberate pour.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- VISUAL PAUSE END -->

      <!-- FEATURED IMAGE UPDATE -->
      <section class="section featured">
        <div class="container">
          <div class="section-head reveal">
            <p class="section-label">Featured</p>
            <h2>Curated pours, crafted daily.</h2>
          </div>
          <div class="featured-grid">
            <article class="card featured-card featured-large reveal delay-1">
              <div class="media image-block">
                <img
                  src="assets/images/honey-float.png"
                  alt="Honey oat flat white"
                />
              </div>
              <div class="card-body">
                <h3>Honey Oat Flat White</h3>
                <p class="card-text">
                  Velvety espresso with toasted oat and honey.
                </p>
                <a class="btn btn-text" href="#">Add</a>
              </div>
            </article>
            <div class="featured-stack">
              <article class="card featured-card reveal delay-2">
                <div class="media image-block">
                  <img
                    src="assets/images/matcha-cloud.png"
                    alt="Seasonal matcha cloud"
                  />
                </div>
                <div class="card-body">
                  <h3>Seasonal Matcha Cloud</h3>
                  <p class="card-text">Soft foam, bright matcha.</p>
                  <a class="btn btn-text" href="#">View</a>
                </div>
              </article>
              <article class="card featured-card reveal delay-3">
                <div class="media image-block">
                  <img
                    src="assets/images/hero.jpg"
                    alt="Citrus cold brew"
                  />
                </div>
                <div class="card-body">
                  <h3>Citrus Cold Brew</h3>
                  <p class="card-text">Slow-steeped with orange peel.</p>
                  <a class="btn btn-text" href="#">View</a>
                </div>
              </article>
            </div>
          </div>
        </div>
      </section>
      <!-- FEATURED END -->

      <!-- FINAL CTA IMAGE UPDATE -->
      <section class="final-cta">
        <div class="container final-inner reveal">
          <div class="final-media image-block">
            <img
              src="assets/images/hero.jpg"
              alt="Prepared coffee cup on the counter"
            />
          </div>
          <div class="final-copy">
            <h2>Ready when you are.</h2>
            <p class="section-lead">
              Order ahead and arrive to a calm, prepared cup.
            </p>
            <a class="btn btn-primary" href="preorder.php">Pre-order now</a>
          </div>
        </div>
      </section>
      <!-- FINAL CTA END -->
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
