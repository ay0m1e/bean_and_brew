<?php
include 'header.php';
require 'config/db.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST'){
  $userId = $_SESSION['user_id'];

  if (!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit;
  }

  if(empty($_SESSION['cart'])){
    die('Your cart is empty');
  }

  
  $collectionTime = $_POST['collection_time'];


  $stmt = $pdo->prepare(
    "INSERT INTO orders (user_id, collection_time)
    VALUES (:user_id, :collection_time)"
  );

  $stmt->execute([
  'user_id' => $userId,
  'collection_time' => $collectionTime
  ]);

  $orderId = $pdo->lastInsertId();


  $itemStmt = $pdo->prepare(
    "INSERT INTO order_items (order_id, product_name, quantity, price)
    VALUE (:order_id, :product_name, :quantity, :price)"
  );

  foreach ($_SESSION ['cart'] as $item) {
    $itemStmt -> execute([
      'order_id' => $orderId,
      'product_name' => $item['product_name'],
      'quantity' => (int)$item['quantity'],
      'price' => (float) $item['price']
    ]);
  }


  unset($_SESSION['cart']);

  echo 'Order placed successfully';
}
?>


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
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="flat-white" />
                  <input type="hidden" name="product_name" value="Flat White" />
                  <input type="hidden" name="price" value="4.80" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="cortado" />
                  <input type="hidden" name="product_name" value="Cortado" />
                  <input type="hidden" name="price" value="3.90" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="long-black" />
                  <input type="hidden" name="product_name" value="Long Black" />
                  <input type="hidden" name="price" value="3.60" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="oat-cappuccino" />
                  <input type="hidden" name="product_name" value="Oat Cappuccino" />
                  <input type="hidden" name="price" value="5.10" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>

            <!-- CATEGORY: Hot drinks -->
            <section class="category-section is-muted">
              <div class="category-header">
                <h2>Hot drinks</h2>
                <p class="section-lead">Slow pours, warm spices, calm cups.</p>
              </div>
              <div class="category-grid">
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="chai-latte" />
                  <input type="hidden" name="product_name" value="Chai Latte" />
                  <input type="hidden" name="price" value="4.90" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="hot-chocolate" />
                  <input type="hidden" name="product_name" value="Hot Chocolate" />
                  <input type="hidden" name="price" value="4.40" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="brewed-tea" />
                  <input type="hidden" name="product_name" value="Brewed Tea" />
                  <input type="hidden" name="price" value="3.30" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>

            <!-- CATEGORY: Cold drinks -->
            <section class="category-section">
              <div class="category-header">
                <h2>Cold drinks</h2>
                <p class="section-lead">Bright, chilled, and layered.</p>
              </div>
              <div class="category-grid">
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="iced-latte" />
                  <input type="hidden" name="product_name" value="Iced Latte" />
                  <input type="hidden" name="price" value="5.20" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="citrus-cold-brew" />
                  <input type="hidden" name="product_name" value="Citrus Cold Brew" />
                  <input type="hidden" name="price" value="4.80" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="matcha-tonic" />
                  <input type="hidden" name="product_name" value="Matcha Tonic" />
                  <input type="hidden" name="price" value="5.40" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>

            <!-- CATEGORY: Pastries -->
            <section class="category-section is-muted">
              <div class="category-header">
                <h2>Pastries</h2>
                <p class="section-lead">Buttery layers and warm spice.</p>
              </div>
              <div class="category-grid">
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="butter-croissant" />
                  <input type="hidden" name="product_name" value="Butter Croissant" />
                  <input type="hidden" name="price" value="4.20" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="cinnamon-bun" />
                  <input type="hidden" name="product_name" value="Cinnamon Bun" />
                  <input type="hidden" name="price" value="4.60" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="almond-danish" />
                  <input type="hidden" name="product_name" value="Almond Danish" />
                  <input type="hidden" name="price" value="4.80" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="seasonal-scone" />
                  <input type="hidden" name="product_name" value="Seasonal Scone" />
                  <input type="hidden" name="price" value="3.80" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>

            <!-- CATEGORY: Bread -->
            <section class="category-section">
              <div class="category-header">
                <h2>Bread</h2>
                <p class="section-lead">Fresh loaves for daily tables.</p>
              </div>
              <div class="category-grid">
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="sourdough-loaf" />
                  <input type="hidden" name="product_name" value="Sourdough Loaf" />
                  <input type="hidden" name="price" value="6.20" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="seeded-rye" />
                  <input type="hidden" name="product_name" value="Seeded Rye" />
                  <input type="hidden" name="price" value="6.80" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="olive-loaf" />
                  <input type="hidden" name="product_name" value="Olive Loaf" />
                  <input type="hidden" name="price" value="6.40" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>

            <!-- CATEGORY: Cakes -->
            <section class="category-section is-muted">
              <div class="category-header">
                <h2>Cakes</h2>
                <p class="section-lead">Slices and whole cakes for the table.</p>
              </div>
              <div class="category-grid">
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="carrot-cake" />
                  <input type="hidden" name="product_name" value="Carrot Cake" />
                  <input type="hidden" name="price" value="5.20" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="chocolate-torte" />
                  <input type="hidden" name="product_name" value="Chocolate Torte" />
                  <input type="hidden" name="price" value="5.80" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
                <!-- ADD TO CART FORM -->
                <form class="product-card" action="cart-add.php" method="post">
                  <input type="hidden" name="product_key" value="lemon-tart" />
                  <input type="hidden" name="product_name" value="Lemon Tart" />
                  <input type="hidden" name="price" value="5.10" />
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
                      <!-- CART QUANTITY CONTROL -->
                      <div class="qty-control">
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=Math.max(1, parseInt(input.value || 1, 10) - 1);">-</button>
                        <input class="qty-input" type="number" name="quantity" value="1" min="1" readonly />
                        <button class="qty-btn" type="button" onclick="const input=this.parentNode.querySelector('input'); input.value=parseInt(input.value || 1, 10) + 1;">+</button>
                      </div>
                      <button class="btn btn-secondary btn-cart" type="submit">Add to cart</button>
                    </div>
                  </div>
                </form>
              </div>
            </section>
          </div>

          <!-- CHECKOUT UI -->
          <?php $cartItems = $_SESSION['cart'] ?? []; ?>
          <?php if (!empty($cartItems)) : ?>
            <?php
              $cartTotal = 0;
              $itemCount = 0;
              foreach ($cartItems as $item) {
                $qty = (int) ($item['quantity'] ?? 1);
                $price = (float) ($item['price'] ?? 0);
                $cartTotal += ($qty * $price);
                $itemCount += $qty;
              }
            ?>
            <aside class="order-summary">
              <h3>Your order</h3>
              <!-- COLLAPSIBLE ORDER SUMMARY -->
              <ul class="summary-list">
                <?php foreach ($cartItems as $item) : ?>
                  <?php
                    $qty = (int) ($item['quantity'] ?? 1);
                    $price = (float) ($item['price'] ?? 0);
                    $lineTotal = $qty * $price;
                  ?>
                  <li class="summary-item">
                    <div>
                      <p class="list-primary"><?php echo htmlspecialchars($item['product_name'] ?? 'Item', ENT_QUOTES, 'UTF-8'); ?></p>
                      <p class="summary-note">Qty <?php echo $qty; ?></p>
                    </div>
                    <span class="summary-line">£<?php echo number_format($lineTotal, 2); ?></span>
                  </li>
                <?php endforeach; ?>
              </ul>
              <div class="summary-total">
                <span>Total</span>
                <span>£<?php echo number_format($cartTotal, 2); ?></span>
              </div>
              <form id="checkout-form" class="checkout-form" method="post" action="checkout.php">
                <div class="checkout-field">
                  <label for="collection-time">Collection time</label>
                  <input id="collection-time" name="collection_time" type="time" required />
                </div>
                <button class="btn btn-primary" type="submit">Checkout</button>
              </form>
              <p class="field-help">Collection in about 15 minutes.</p>
            </aside>
          <?php else : ?>
            <div class="order-empty">
              <p class="empty-state">Your cart is empty. Add items to continue.</p>
            </div>
          <?php endif; ?>
        </div>
        <?php if (!empty($cartItems)) : ?>
          <!-- MOBILE CHECKOUT BAR -->
          <div class="order-bar">
            <!-- ORDER DETAILS TOGGLE -->
            <div class="order-details-toggle">
              <details class="summary-details">
                <summary class="summary-toggle">
                  <span class="summary-toggle-show">View order details</span>
                  <span class="summary-toggle-hide">Hide order details</span>
                </summary>
                <!-- COLLAPSIBLE ORDER SUMMARY -->
                <div class="summary-panel">
                  <ul class="summary-list">
                    <?php foreach ($cartItems as $item) : ?>
                      <?php
                        $qty = (int) ($item['quantity'] ?? 1);
                        $price = (float) ($item['price'] ?? 0);
                        $lineTotal = $qty * $price;
                      ?>
                      <li class="summary-item">
                        <div>
                          <p class="list-primary"><?php echo htmlspecialchars($item['product_name'] ?? 'Item', ENT_QUOTES, 'UTF-8'); ?></p>
                          <p class="summary-note">Qty <?php echo $qty; ?></p>
                        </div>
                        <span class="summary-line">£<?php echo number_format($lineTotal, 2); ?></span>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
              </details>
            </div>
            <div class="order-bar-summary">
              <p class="summary-label"><?php echo $itemCount; ?> items</p>
              <p class="summary-value">£<?php echo number_format($cartTotal, 2); ?></p>
            </div>
            <form class="checkout-form checkout-form-bar" method="post" action="checkout.php">
              <label class="sr-only" for="collection-time-bar">Collection time</label>
              <input
                id="collection-time-bar"
                class="order-time-input"
                name="collection_time"
                type="time"
                required
              />
              <button class="btn btn-primary" type="submit">Checkout</button>
            </form>
          </div>
        <?php endif; ?>
      </section>
      <!-- PRE-ORDER CATEGORIES END -->
    </main>

    <?php include 'footer.php'; ?>

  </body>
</html>
