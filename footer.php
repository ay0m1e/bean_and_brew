<footer class="site-footer">
  <div class="container footer-top">
    <div class="footer-branding">
      <div class="footer-logo">
        <img src="assets/images/logo.svg" alt="Bean and Brew" />
        <span class="footer-brand">Bean and Brew</span>
      </div>
      <p class="footer-note">Coffee and bakes, crafted daily.</p>
      <p class="footer-note">Quiet tables, warm loaves, slow pours.</p>
    </div>

    <div class="footer-links-grid">
      <div class="footer-col">
        <p class="footer-title">About</p>
        <a class="footer-link" href="#">Our story</a>
        <a class="footer-link" href="#">Our coffee</a>
        <a class="footer-link" href="#">Bakery craft</a>
        <a class="footer-link" href="#">Sustainability</a>
        <a class="footer-link" href="#">Customer care</a>
      </div>
      <div class="footer-col">
        <p class="footer-title">Visit</p>
        <a class="footer-link" href="#">Locations</a>
        <a class="footer-link" href="#">Opening hours</a>
        <a class="footer-link" href="#">Accessibility</a>
        <a class="footer-link" href="#">Press</a>
      </div>
      <div class="footer-col">
        <p class="footer-title">Order</p>
        <a class="footer-link" href="preorder.php">Pre-order</a>
        <a class="footer-link" href="book.php">Book a table</a>
        <a class="footer-link" href="lessons.php">Lessons</a>
        <a class="footer-link" href="account.php">Account</a>
      </div>
    </div>

    <div class="footer-card">
      <p class="footer-card-title">Start ordering ahead</p>
      <p class="footer-card-text">
        Order and pay — then breeze in for collection at your local store.
      </p>
      <div class="footer-card-actions">
        <a class="footer-btn" href="#">App Store</a>
        <a class="footer-btn" href="#">Google Play</a>
      </div>
    </div>
  </div>

  <div class="container footer-bottom">
    <div class="footer-bottom-links">
      <a href="#">Contact</a>
      <a href="#">Terms & Conditions</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Cookie Notice</a>
    </div>
    <div class="footer-social">
      <a class="social-dot" href="#" aria-label="Instagram">Ig</a>
      <a class="social-dot" href="#" aria-label="Facebook">Fb</a>
      <a class="social-dot" href="#" aria-label="X">X</a>
      <a class="social-dot" href="#" aria-label="YouTube">Yt</a>
    </div>
    <p class="footer-legal">© 2026 Bean and Brew.</p>
  </div>
</footer>
<script>
  (function () {
    const links = document.querySelectorAll(".nav-list a");
    if (!links.length) return;
    let current = window.location.pathname.split("/").pop();
    if (!current) current = "index.php";
    links.forEach((link) => {
      link.classList.remove("is-active");
      link.removeAttribute("aria-current");
      const href = link.getAttribute("href");
      if (href === current) {
        link.classList.add("is-active");
        link.setAttribute("aria-current", "page");
      }
    });
  })();
</script>
