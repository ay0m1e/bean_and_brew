<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bean &amp; Brew | Calm Coffee Experiences</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- PHP include: header.php -->
    <?php include 'header.php'; ?>

    <main id="main">
      <section class="hero">
        <div class="container hero-grid">
          <div class="hero-copy">
            <p class="eyebrow">Bean &amp; Brew</p>
            <h1>Slow, intentional coffee. Ready on your time.</h1>
            <p class="lead">
              Pre-order your favorites, reserve a quiet table, and learn the
              craft with guided brew lessons in one calm flow.
            </p>
            <div class="hero-actions">
              <a class="btn btn-primary" href="preorder.php">Pre-order</a>
              <a class="btn btn-secondary" href="book.php">Book a table</a>
            </div>
            <ul class="hero-highlights">
              <li>Order ahead in under a minute</li>
              <li>Reserve a table without waiting</li>
              <li>Small-group barista lessons</li>
            </ul>
          </div>

          <div class="hero-panel">
            <div class="card hero-card">
              <p class="card-eyebrow">Ordering flow</p>
              <div class="order-step">
                <span class="step-dot" aria-hidden="true"></span>
                <div>
                  <p class="step-title">Choose your brew</p>
                  <p class="step-caption">
                    Espresso, pour-over, or cold brew
                  </p>
                </div>
              </div>
              <div class="order-step">
                <span class="step-dot" aria-hidden="true"></span>
                <div>
                  <p class="step-title">Set your pickup</p>
                  <p class="step-caption">15 minute windows, no rush</p>
                </div>
              </div>
              <div class="order-step">
                <span class="step-dot" aria-hidden="true"></span>
                <div>
                  <p class="step-title">Customize</p>
                  <p class="step-caption">Milk, sweetness, temperature</p>
                </div>
              </div>
              <div class="order-summary">
                <div>
                  <p class="summary-label">Ready in</p>
                  <p class="summary-value">8 minutes</p>
                </div>
                <a class="btn btn-text" href="preorder.php">Customize</a>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header">
            <div>
              <p class="section-eyebrow">Pre-order</p>
              <h2>Signature drinks to start the day</h2>
              <p class="section-lead">
                Balanced, seasonal, and ready when you arrive.
              </p>
            </div>
            <a class="btn btn-text" href="preorder.php">View full menu</a>
          </div>

          <div class="card-grid">
            <article class="card product-card">
              <div class="card-top">
                <span class="tag">Signature</span>
                <span class="price">$5.80</span>
              </div>
              <h3>Oat Milk Latte</h3>
              <p class="card-meta">Espresso, oat milk, cacao dust</p>
              <div class="card-actions">
                <a class="btn btn-secondary" href="preorder.php"
                  >Add to pre-order</a
                >
              </div>
            </article>

            <article class="card product-card">
              <div class="card-top">
                <span class="tag">Cold brew</span>
                <span class="price">$4.90</span>
              </div>
              <h3>Maple Cold Brew</h3>
              <p class="card-meta">Slow-steeped, maple, citrus peel</p>
              <div class="card-actions">
                <a class="btn btn-secondary" href="preorder.php"
                  >Add to pre-order</a
                >
              </div>
            </article>

            <article class="card product-card">
              <div class="card-top">
                <span class="tag">Pour-over</span>
                <span class="price">$6.20</span>
              </div>
              <h3>Single Origin No. 4</h3>
              <p class="card-meta">Floral notes, honey finish</p>
              <div class="card-actions">
                <a class="btn btn-secondary" href="preorder.php"
                  >Add to pre-order</a
                >
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container section-split">
          <div class="section-copy">
            <p class="section-eyebrow">Book</p>
            <h2>Quiet tables, reserved just for you</h2>
            <p class="section-lead">Choose the vibe you want and skip the wait.</p>
            <a class="btn btn-secondary" href="book.php">Book a table</a>
          </div>

          <div class="card-grid booking-grid">
            <article class="card booking-card">
              <p class="card-eyebrow">Window table</p>
              <h3>Morning light</h3>
              <p class="card-meta">Seats 2 to 4 - 9:00 to 11:00</p>
              <p class="card-footnote">Includes a carafe refill</p>
            </article>

            <article class="card booking-card">
              <p class="card-eyebrow">Community table</p>
              <h3>Midday focus</h3>
              <p class="card-meta">Seats 4 to 6 - 12:00 to 14:00</p>
              <p class="card-footnote">Quiet zone seating</p>
            </article>
          </div>
        </div>
      </section>

      <section class="section">
        <div class="container">
          <div class="section-header">
            <div>
              <p class="section-eyebrow">Lessons</p>
              <h2>Learn the craft behind the cup</h2>
              <p class="section-lead">
                Small-group sessions with hands-on brewing.
              </p>
            </div>
            <a class="btn btn-text" href="lessons.php">Explore lessons</a>
          </div>

          <div class="card-grid">
            <article class="card lesson-card">
              <p class="card-eyebrow">60 minutes</p>
              <h3>Pour-over fundamentals</h3>
              <p class="card-meta">Grind, bloom, and extraction basics</p>
              <p class="card-footnote">Next session: Saturday 10:00</p>
            </article>

            <article class="card lesson-card">
              <p class="card-eyebrow">90 minutes</p>
              <h3>Latte art essentials</h3>
              <p class="card-meta">Milk texture, pour control, patterns</p>
              <p class="card-footnote">Next session: Sunday 13:30</p>
            </article>

            <article class="card lesson-card">
              <p class="card-eyebrow">45 minutes</p>
              <h3>Cold brew mastery</h3>
              <p class="card-meta">Steep time, ratios, and flavor balance</p>
              <p class="card-footnote">Next session: Friday 17:00</p>
            </article>
          </div>
        </div>
      </section>
    </main>

    <footer class="site-footer">
      <div class="container footer-inner">
        <p class="footer-brand">Bean &amp; Brew</p>
        <p class="footer-note">Calm coffee, crafted daily.</p>
      </div>
    </footer>
  </body>
</html>
