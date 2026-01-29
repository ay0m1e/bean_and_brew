<?php
session_start();
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
      </ul>
    </nav>
  </div>
</header>
