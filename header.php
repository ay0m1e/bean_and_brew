<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
  session_start();
}

$cartCount = 0;
if (!empty($_SESSION['cart']) && is_array($_SESSION['cart'])) {
  foreach ($_SESSION['cart'] as $item) {
    $cartCount += (int) ($item['quantity'] ?? 0);
  }
}

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<header class="site-header">
  <div class="container header-inner">
    <a class="logo" href="index.php" aria-label="Bean and Brew homepage">
      <img src="assets/images/logo.svg" alt="Bean and Brew logo" />
      <span class="logo-text">Bean and Brew</span>
    </a>
    <!-- MOBILE HAMBURGER NAV -->
    <input
      type="checkbox"
      id="nav-toggle"
      class="nav-toggle"
      aria-label="Toggle navigation"
    />
    <label for="nav-toggle" class="nav-toggle-label">
      <span class="nav-toggle-bar"></span>
      <span class="nav-toggle-bar"></span>
      <span class="nav-toggle-bar"></span>
    </label>
    <nav class="site-nav" aria-label="Primary">
      <!-- PHP: add "is-active" to the current page link -->
      <ul class="nav-list">
        <li><a class="nav-link" href="index.php">Home</a></li>
        <li><a class="nav-link" href="book.php">Book</a></li>
        <li><a class="nav-link" href="preorder.php">Pre-order</a></li>
        <li><a class="nav-link" href="lessons.php">Lessons</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><a class="nav-link" href="account.php">Account</a></li>
          <li><a class="nav-link" href="logout.php">Log out</a></li>

        <?php else: ?>
          <li><a class="nav-link" href="login.php">Sign in</a></li>
        <?php endif; ?>
        <!-- CART ICON -->
        <li class="nav-cart-item">
          <a class="header-cart" href="preorder.php" aria-label="View cart">
            <span class="header-cart-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" role="img" aria-hidden="true" focusable="false">
                <path d="M6 6h15l-1.5 9h-12z" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round"/>
                <circle cx="9" cy="19" r="1.6" fill="currentColor"/>
                <circle cx="18" cy="19" r="1.6" fill="currentColor"/>
                <path d="M6 6l-1-3H2" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round"/>
              </svg>
            </span>
            <?php if ($cartCount > 0): ?>
              <span class="cart-badge"><?php echo (int) $cartCount; ?></span>
            <?php endif; ?>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

<!-- FLASH MESSAGES -->
<?php if (!empty($_SESSION['flash_success']) || !empty($_SESSION['flash_error'])): ?>
  <div class="flash-wrap">
    <?php if (!empty($_SESSION['flash_success'])): ?>
      <div class="flash flash-success">
        <?php echo htmlspecialchars($_SESSION['flash_success'], ENT_QUOTES, 'UTF-8'); ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($_SESSION['flash_error'])): ?>
      <div class="flash flash-error">
        <?php echo htmlspecialchars($_SESSION['flash_error'], ENT_QUOTES, 'UTF-8'); ?>
      </div>
    <?php endif; ?>
  </div>
  <?php
    unset($_SESSION['flash_success'], $_SESSION['flash_error']);
  ?>
<?php endif; ?>
