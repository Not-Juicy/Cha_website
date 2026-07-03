</main>

<!-- Footer -->
<footer class="site-footer">
    <div class="footer-wave">
        <svg viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
            <path d="M0 80L120 73.3C240 66.7 480 53.3 720 53.3C960 53.3 1200 66.7 1320 73.3L1440 80V0H1320C1200 0 960 0 720 0C480 0 240 0 120 0H0V80Z" fill="#0B1D6D"/>
        </svg>
    </div>
    <div class="container">
        <div class="footer-grid">
            <div class="footer-col footer-col-brand">
                <a href="<?php echo home_url(); ?>" class="footer-brand">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cha-logo-small.png" alt="Cambodian Haemophilia Association">
                </a>
                <p class="footer-tagline">
                    Supporting people living with bleeding disorders across Cambodia.
                </p>
                <div class="footer-socials">
                    <a href="#" aria-label="Facebook">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Instagram">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"/>
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>
                        </svg>
                    </a>
                    <a href="#" aria-label="Email">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="<?php echo home_url(); ?>">Home</a></li>
                    <li><a href="#about">About CHA</a></li>
                    <li><a href="#programs">Programs & Care</a></li>
                    <li><a href="#news">News & Events</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h4>Get Involved</h4>
                <ul>
                    <li><a href="#donate">Donate</a></li>
                    <li><a href="#member">Become a Member</a></li>
                    <li><a href="#">Volunteer</a></li>
                    <li><a href="#">Partner With Us</a></li>
                </ul>
            </div>

            <div class="footer-col footer-contact">
                <h4>Contact Us</h4>
                <div class="item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                        <circle cx="12" cy="10" r="3"/>
                    </svg>
                    <div>
                        Phnom Penh, Cambodia
                    </div>
                </div>
                <div class="item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
                    </svg>
                    <div>
                        +855 12 345 678
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div>© <?php echo date('Y'); ?> Cambodian Haemophilia Association. All rights reserved.</div>
            <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Disclaimer</a>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
