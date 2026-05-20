
(function () {
  'use strict';

  document.addEventListener('DOMContentLoaded', function () {

    var footer = document.getElementById('footer');
    if (!footer) return;

  
       footer.innerHTML = `
      <footer class="site-footer">
        <div class="footer-container">

          <!-- Section 1 -->
          <div class="footer-section about">
            <img src="/images/logo.png" alt="SIVA Logo" class="footer-logo" />
            <p>Empowering Communities</p>
          </div>

          <!-- Section 2 -->
          <div class="footer-section links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="/about.html">About Us</a></li>
              <li><a href="/history.html">Our History</a></li>
              <li><a href="/partners.html">Our Partners</a></li>
              <li><a href="/support.html">Support Us</a></li>
              <li><a href="/contact.html">Contact Us</a></li>
            </ul>
          </div>

          <!-- Section 3 -->
          <div class="footer-section policies">
            <h4>Articles & Blogs</h4>
            <ul>
              <li><a href="/articles.html">Articles</a></li>
              <li><a href="/blogs.html">Blogs</a></li>
            </ul>
          </div>

          <!-- Section 4: Social -->
          <div class="footer-section social">
            <h4 style="margin-bottom:10px;">Follow Us</h4>

            <div style="display:flex;gap:16px;align-items:center;">

              <a href="https://www.facebook.com/profile.php?id=61583993918414"
                 aria-label="Facebook"
                 target="_blank"
                 rel="noopener noreferrer"
                 style="color:#000;font-size:18px;text-decoration:none;">
                <i class="fab fa-facebook-f"></i>
              </a>

              <a href="https://x.com/sivashiksha"
                 aria-label="X"
                 target="_blank"
                 rel="noopener noreferrer"
                 style="color:#000;display:inline-flex;align-items:center;">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                  <path d="M18.244 2.25h3.308l-7.227 8.26L22.5 21.75h-6.64l-5.2-6.79-5.94
                  6.79H1.41l7.73-8.84L1.5 2.25h6.81l4.7 6.18 5.234-6.18z"/>
                </svg>
              </a>

              <a href="https://www.linkedin.com/company/sivashiksha/"
                 aria-label="LinkedIn"
                 target="_blank"
                 rel="noopener noreferrer"
                 style="color:#000;font-size:18px;text-decoration:none;">
                <i class="fab fa-linkedin-in"></i>
              </a>

            </div>
          </div>

          <!-- Section 5 -->
          <div class="footer-section policies">
            <h4>Policies</h4>
            <ul>
              <li><a href="/privacy.html">Privacy Policy</a></li>
              <li><a href="/terms.html">Terms & Conditions</a></li>
            </ul>
          </div>

        </div>

        <hr>

        <div class="footer-bottom">
          <p>
            Copyright &copy; 2026
            Sumangali Institute of Valuable Arts Foundation.
            All rights reserved.
          </p>
        </div>
      </footer>
    `;

    /* ===== COOKIE BANNER ===== */
    document.body.insertAdjacentHTML('beforeend', `
      <div class="vmi-cookie" id="vmiCookieBanner">
        <div>
          <strong>We value your privacy</strong>
          <p>We use cookies to improve your experience.</p>
        </div>

        <div class="vmi-cookie__actions">
          <button onclick="vmiCookieCustomize()">Customize</button>
          <button onclick="vmiCookieReject()">Reject</button>
          <button onclick="vmiCookieAccept()">Accept</button>
        </div>
      </div>

      <div class="vmi-cookie-settings" id="vmiCookieSettings">
        <h4>Cookie Preferences</h4>

        <label>
          Necessary
          <input type="checkbox" checked disabled>
        </label>

        <label>
          Analytics
          <input type="checkbox" id="analyticsCookies">
        </label>

        <button onclick="vmiSavePreferences()">Save</button>
      </div>
    `);

    /* ===== INIT ===== */
    var banner = document.getElementById('vmiCookieBanner');
    var consent = localStorage.getItem('vmiCookieConsent');

    if (!consent && banner) {
      setTimeout(function () {
        banner.classList.add('vmi-cookie--visible');
      }, 600);
    }

    if (consent) {
      try {
        var parsed = JSON.parse(consent);
        if (parsed.analytics) {
          loadGTM();
        }
      } catch (e) {}
    }

  });

})(); 