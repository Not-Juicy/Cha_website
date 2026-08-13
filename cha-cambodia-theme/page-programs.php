<?php get_header(); ?>

    <!-- ===== PROGRAMS PAGE ===== -->
    <section class="section section-soft" id="treatment-centres"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="treatment_heading"><?php echo esc_html(cha_get_option('programs_heading', 'Treatment Centres')); ?></h2><p data-i18n="treatment_sub"><?php echo esc_html(cha_get_option('programs_sub', 'Find haemophilia treatment centres across Cambodia — search by province.')); ?></p></div>
      <div class="tc-search mb-6" data-reveal><label class="form-label" for="province" data-i18n="treatment_select"><?php echo esc_html(cha_get_option('programs_select_lbl', 'Select Province')); ?></label><select class="form-select" id="province" data-province-select><option value=""><?php echo esc_html(cha_get_option('programs_select_all', 'All provinces')); ?></option><option value="phnom-penh">Phnom Penh</option><option value="siem-reap">Siem Reap</option><option value="battambang">Battambang</option><option value="sihanoukville">Sihanoukville</option></select></div>
      <div class="grid" style="gap:var(--s-5)">
        <article class="tc-card" data-reveal><div class="tc-img"><img src="<?php echo get_template_directory_uri(); ?>/hospital-1.jpg" alt="National Paediatric Hospital" style="width:100%;height:100%;object-fit:cover"></div><div class="tc-body"><h3>National Paediatric Hospital — Haemophilia Clinic</h3><div class="tc-meta"><span>📍 Phnom Penh</span><span>📞 012 751 728</span></div><div class="tc-tags"><span class="tc-tag">Haemophilia A &amp; B</span><span class="tc-tag">VWD</span><span class="tc-tag">Consultation</span><span class="tc-tag">Laboratory</span></div>          <a class="card-link mt-4" href="#" data-i18n="treatment_view_map"><?php echo esc_html(cha_get_option('programs_view_map', 'View on Map')); ?> <span class="arrow">→</span></a></div></article>
        <article class="tc-card" data-reveal><div class="tc-img"><img src="<?php echo get_template_directory_uri(); ?>/hospital-2.jpg" alt="Calmette Hospital" style="width:100%;height:100%;object-fit:cover"></div><div class="tc-body"><h3>Calmette Hospital — Haemophilia Unit</h3><div class="tc-meta"><span>📍 Phnom Penh</span><span>📞 012 794 685</span></div><div class="tc-tags"><span class="tc-tag">Haemophilia A &amp; B</span><span class="tc-tag">Factor Replacement</span><span class="tc-tag">Counselling</span></div><a class="card-link mt-4" href="#" data-i18n="treatment_view_map"><?php echo esc_html(cha_get_option('programs_view_map', 'View on Map')); ?> <span class="arrow">→</span></a></div></article>
        <article class="tc-card" data-reveal><div class="tc-img"><img src="<?php echo get_template_directory_uri(); ?>/hospital-3.jpg" alt="Siem Reap Provincial Hospital" style="width:100%;height:100%;object-fit:cover"></div><div class="tc-body"><h3>Siem Reap Provincial Hospital</h3><div class="tc-meta"><span>📍 Siem Reap</span><span>📞 063 765 376</span></div><div class="tc-tags"><span class="tc-tag">Haemophilia A &amp; B</span><span class="tc-tag">Consultation</span><span class="tc-tag">Emergency Care</span></div><a class="card-link mt-4" href="#" data-i18n="treatment_view_map"><?php echo esc_html(cha_get_option('programs_view_map', 'View on Map')); ?> <span class="arrow">→</span></a></div></article>
      </div>
      <div class="emergency-banner" data-reveal><div><h3 data-i18n="treatment_emergency"><?php echo esc_html(cha_get_option('emergency_heading', 'Emergency Support')); ?></h3><p data-i18n="treatment_emergency_desc"><?php echo esc_html(cha_get_option('emergency_text', 'If you have a bleeding emergency, contact your nearest treatment centre or call our support line.')); ?></p></div><a class="phone" href="tel:+85512345678"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg><?php echo esc_html(cha_get_option('emergency_phone', '012 345 678')); ?></a></div>
    </div></section>

    <section class="section" id="csr"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="csr_heading"><?php echo esc_html(cha_get_option('csr_heading', 'CSR Program')); ?></h2><p data-i18n="csr_sub"><?php echo esc_html(cha_get_option('csr_sub', 'Fundraising, donations, and corporate partnerships that power our mission.')); ?></p></div>
      <div class="csr-grid">
        <div class="csr-block csr-blue" id="csr-fundraising" data-reveal>
          <div class="csr-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div>
          <h3 data-i18n="csr_fundraising"><?php echo esc_html(cha_get_option('csr_1_title', 'Fundraising')); ?></h3>
          <p data-i18n="csr_fundraising_desc"><?php echo esc_html(cha_get_option('csr_1_desc', 'Raising funds through community drives, events, and partner campaigns that keep our programs running.')); ?></p>
          <a class="csr-btn csr-btn-blue" href="<?php echo home_url('/#news-events'); ?>" data-i18n="csr_view_campaigns"><?php echo esc_html(cha_get_option('csr_1_link', 'View campaigns')); ?> <span class="arrow">→</span></a>
        </div>
        <div class="csr-block csr-red" id="csr-donate" data-reveal>
          <div class="csr-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
          <h3 data-i18n="csr_donate_online"><?php echo esc_html(cha_get_option('csr_2_title', 'Online donation')); ?></h3>
          <p data-i18n="csr_donate_online_desc"><?php echo esc_html(cha_get_option('csr_2_desc', 'Donate securely via PayWay (ABA Bank) — every contribution changes lives across Cambodia.')); ?></p>
          <a class="csr-btn csr-btn-red" href="#" data-donate-trigger data-i18n="csr_donate_now"><?php echo esc_html(cha_get_option('csr_2_link', 'Donate now')); ?> <span class="arrow">→</span></a>
        </div>
        <div class="csr-block csr-purple" id="csr-partners" data-reveal>
          <div class="csr-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
          <h3 data-i18n="csr_partners_title"><?php echo esc_html(cha_get_option('csr_3_title', 'Corporate Partners')); ?></h3>
          <p data-i18n="csr_partners_desc"><?php echo esc_html(cha_get_option('csr_3_desc', 'Trusted organisations that support our mission and amplify our reach nationwide.')); ?></p>
          <a class="csr-btn csr-btn-purple" href="<?php echo home_url('/#contact'); ?>" data-i18n="csr_become_partner"><?php echo esc_html(cha_get_option('csr_3_link', 'Become a partner')); ?> <span class="arrow">→</span></a>
        </div>
      </div>
    </div></section>

  </main>

  <?php get_footer(); ?>
