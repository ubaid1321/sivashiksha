(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    // Inject Navbar HTML
    var navbar = document.getElementById('navbar');
    if (!navbar) return;

    navbar.innerHTML = `
      <div id="scrollIndicator"></div>
      <div class="nav-container">
        <div class="logo">
          <a href="/index.html"><img src="/images/logo.png" alt="SIVA Logo" /></a>
        </div>
        <ul class="nav-links" id="navLinks">
          <li><a href="/about.html">About Us</a></li>
          <li><a href="/history.html">Our History</a></li>
          <li><a href="/partners.html">Our Partners</a></li>
          <li><a href="/support.html">Support Us</a></li>
          <li><a href="/contact.html">Contact Us</a></li>
        </ul>
        <div class="hamburger" id="hamburger">
          <span class="material-icons">menu</span>
        </div>
      </div>
    `;

    var navLinks = document.getElementById('navLinks');
    var hamburger = document.getElementById('hamburger');
    var scrollIndicator = document.getElementById('scrollIndicator');

    if (!navLinks || !hamburger) return;

    // ===== ACTIVE LINK (based on current page URL) =====
    var currentPage = window.location.pathname.split('/').pop() || 'index.html';
    document.querySelectorAll('.nav-links a').forEach(function (link) {
      if (link.getAttribute('href') === currentPage) {
        link.classList.add('active');
      }
    });

    // ===== HAMBURGER TOGGLE =====
    hamburger.addEventListener('click', function (e) {
      e.stopPropagation();
      navLinks.classList.toggle('active');
      hamburger.classList.toggle('active');
    });

    // ===== NAV LINK CLICK =====
    document.querySelectorAll('.nav-links a').forEach(function (link) {
      link.addEventListener('click', function () {
        // Close mobile menu
        navLinks.classList.remove('active');
        hamburger.classList.remove('active');

        // Highlight active link
        document.querySelectorAll('.nav-links a').forEach(function (l) {
          l.classList.remove('active');
        });
        link.classList.add('active');
      });
    });

    // ===== CLOSE MENU ON OUTSIDE CLICK =====
    document.addEventListener('click', function (e) {
      if (!navbar.contains(e.target)) {
        navLinks.classList.remove('active');
        hamburger.classList.remove('active');
      }
    });

    // ===== SCROLL EFFECTS =====
    window.addEventListener('scroll', function () {
      // Navbar shadow on scroll
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }

      // Scroll progress indicator
      if (scrollIndicator) {
        var scrollPercent =
          (window.scrollY / (document.body.scrollHeight - window.innerHeight)) * 100;
        scrollIndicator.style.width = scrollPercent + '%';
      }
    });

  });

})();