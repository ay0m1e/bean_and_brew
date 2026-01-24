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
    <?php include 'header.php'; ?>

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

      <!-- LESSONS START -->
      <section class="section lessons">
        <div class="container">
          <div class="lessons-grid">
            <article class="lesson-card">
              <div class="lesson-media image-block">
                <img src="assets/images/hero1.jpg" alt="Sourdough lesson" />
              </div>
              <div class="lesson-body">
                <h3>Sourdough Essentials</h3>
                <div class="lesson-meta">
                  <span>Sat · 10:00</span>
                  <span class="status-pill available">Spaces open</span>
                </div>
                <p class="card-text">Starter care, shaping, and scoring.</p>
                <a class="btn btn-secondary" href="#">Book lesson</a>
              </div>
            </article>

            <article class="lesson-card">
              <div class="lesson-media image-block">
                <img src="assets/images/hero1.jpg" alt="Pastry folding" />
              </div>
              <div class="lesson-body">
                <h3>Viennoiserie Morning</h3>
                <div class="lesson-meta">
                  <span>Sun · 13:30</span>
                  <span class="status-pill limited">Limited spots</span>
                </div>
                <p class="card-text">Butter layering, proofing, and glazing.</p>
                <a class="btn btn-secondary" href="#">Book lesson</a>
              </div>
            </article>

            <article class="lesson-card">
              <div class="lesson-media image-block">
                <img src="assets/images/hero1.jpg" alt="Seasonal cakes" />
              </div>
              <div class="lesson-body">
                <h3>Seasonal Cakes</h3>
                <div class="lesson-meta">
                  <span>Fri · 17:00</span>
                  <span class="status-pill available">Spaces open</span>
                </div>
                <p class="card-text">Sponge basics, fillings, and finish.</p>
                <a class="btn btn-secondary" href="#">Book lesson</a>
              </div>
            </article>
          </div>
        </div>
      </section>
      <!-- LESSONS END -->
    </main>

    <?php include 'footer.php'; ?>
  </body>
</html>
