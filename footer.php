<footer class="site-footer">
  <div class="container footer-inner">
    <div>
      <p class="footer-brand">Bean and Brew</p>
      <p class="footer-note">Calm coffee, crafted daily.</p>
    </div>
    <nav class="footer-nav" aria-label="Footer">
      <a href="#">Locations</a>
      <a href="#">Contact</a>
      <a href="#">Privacy</a>
    </nav>
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
