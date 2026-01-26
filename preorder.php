<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pre-order | Bean and Brew</title>
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


    <main class="preorder-page">
      <!-- PRE-ORDER HERO VARIATION -->
      <section class="page-hero preorder-hero">
        <div class="preorder-hero-media">
          <img
            src="assets/images/hero.jpg"
            alt="Coffee and baked goods arranged on a counter"
          />
          <div class="container preorder-hero-content">
            <div class="page-hero-copy">
              <p class="eyebrow">Pre-order</p>
              <h1>Pre-order</h1>
              <p class="lead">
                Choose what you want, set a collection window, and arrive to a calm,
                ready counter.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- PAGE INTRO END -->

      <!-- PRE-ORDER CATEGORIES START -->
      <section class="section preorder-body">
        <div class="container preorder-shell">
          <div class="preorder-sections">
            <!-- CATEGORY: Coffee -->
            <section class="category-section is-primary">
              <div class="category-header">
                <h2>Coffee</h2>
                <p class="section-lead">Espresso-led classics for a focused start.</p>
              </div>
              <div class="category-grid">
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Flat white" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Flat White</h3>
                      <p class="card-text">Velvety espresso with microfoam.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.80</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Cortado" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Cortado</h3>
                      <p class="card-text">Short, balanced, and clean.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£3.90</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Long black" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Long Black</h3>
                      <p class="card-text">Bold espresso with hot water.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£3.60</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Oat cappuccino" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Oat Cappuccino</h3>
                      <p class="card-text">Toasted oat, soft foam.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£5.10</span>
                      <a class="btn btn-secondary" href="#">Customize</a>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- CATEGORY: Hot drinks -->
            <section class="category-section is-muted">
              <div class="category-header">
                <h2>Hot drinks</h2>
                <p class="section-lead">Slow pours, warm spices, calm cups.</p>
              </div>
              <div class="category-grid">
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Chai latte" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Chai Latte</h3>
                      <p class="card-text">Black tea, cardamom, clove.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.90</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Hot chocolate" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Hot Chocolate</h3>
                      <p class="card-text">Dark cocoa, sea salt finish.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.40</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Brewed tea" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Brewed Tea</h3>
                      <p class="card-text">Assam, mint, or citrus herbal.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£3.30</span>
                      <a class="btn btn-secondary" href="#">Customize</a>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- CATEGORY: Cold drinks -->
            <section class="category-section">
              <div class="category-header">
                <h2>Cold drinks</h2>
                <p class="section-lead">Bright, chilled, and layered.</p>
              </div>
              <div class="category-grid">
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Iced latte" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Iced Latte</h3>
                      <p class="card-text">Espresso, milk, slow-melt ice.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£5.20</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Citrus cold brew" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Citrus Cold Brew</h3>
                      <p class="card-text">Slow-steeped with orange peel.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.80</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Matcha tonic" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Matcha Tonic</h3>
                      <p class="card-text">Sparkling, bright, softly sweet.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£5.40</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- CATEGORY: Pastries -->
            <section class="category-section is-muted">
              <div class="category-header">
                <h2>Pastries</h2>
                <p class="section-lead">Buttery layers and warm spice.</p>
              </div>
              <div class="category-grid">
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Butter croissant" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Butter Croissant</h3>
                      <p class="card-text">Flaky, golden, hand-laminated.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.20</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Cinnamon bun" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Cinnamon Bun</h3>
                      <p class="card-text">Brown sugar, toasted pecan.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.60</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Almond danish" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Almond Danish</h3>
                      <p class="card-text">Frangipane, sliced almonds.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£4.80</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Seasonal scone" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Seasonal Scone</h3>
                      <p class="card-text">Fruit glaze, clotted cream.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£3.80</span>
                      <a class="btn btn-secondary" href="#">Customize</a>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- CATEGORY: Bread -->
            <section class="category-section">
              <div class="category-header">
                <h2>Bread</h2>
                <p class="section-lead">Fresh loaves for daily tables.</p>
              </div>
              <div class="category-grid">
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Sourdough loaf" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Sourdough Loaf</h3>
                      <p class="card-text">Long ferment, crisp crust.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£6.20</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Seeded rye" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Seeded Rye</h3>
                      <p class="card-text">Caraway, sunflower, sesame.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£6.80</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Olive loaf" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Olive Loaf</h3>
                      <p class="card-text">Briny olives, rosemary finish.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£6.40</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
              </div>
            </section>

            <!-- CATEGORY: Cakes -->
            <section class="category-section is-muted">
              <div class="category-header">
                <h2>Cakes</h2>
                <p class="section-lead">Slices and whole cakes for the table.</p>
              </div>
              <div class="category-grid">
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Carrot cake" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Carrot Cake</h3>
                      <p class="card-text">Spiced sponge, cream cheese.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£5.20</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Chocolate torte" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Chocolate Torte</h3>
                      <p class="card-text">Dark cocoa, espresso glaze.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£5.80</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
                <article class="product-card">
                  <div class="product-media image-block">
                    <img src="assets/images/hero.jpg" alt="Lemon tart" />
                  </div>
                  <div class="product-body">
                    <div>
                      <h3>Lemon Tart</h3>
                      <p class="card-text">Zest, shortcrust, soft cream.</p>
                    </div>
                    <div class="product-meta">
                      <span class="product-price">£5.10</span>
                      <a class="btn btn-secondary" href="#">Add</a>
                    </div>
                  </div>
                </article>
              </div>
            </section>
          </div>

          <aside class="order-summary">
            <h3>Your order</h3>
            <ul class="summary-list">
              <li class="summary-item">
                <div>
                  <p class="list-primary">Flat White</p>
                  <p class="summary-note">12 oz · Oat milk</p>
                </div>
                <span>£4.80</span>
              </li>
              <li class="summary-item">
                <div>
                  <p class="list-primary">Butter Croissant</p>
                  <p class="summary-note">Warmed</p>
                </div>
                <span>£4.20</span>
              </li>
            </ul>
            <div class="summary-total">
              <span>Total</span>
              <span>£9.00</span>
            </div>
            <a class="btn btn-primary" href="#">Checkout</a>
            <p class="field-help">Collection in about 15 minutes.</p>
          </aside>
        </div>
      </section>
      <!-- PRE-ORDER CATEGORIES END -->
    </main>

    <?php include 'footer.php'; ?>

  </body>
</html>
