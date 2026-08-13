<?php get_header(); ?>


    <!-- ===== HOME ===== -->
    <section class="hero" id="home">
      <img class="hero-bg" src="<?php echo esc_url(cha_get_option('hero_image', get_template_directory_uri() . '/Heroo.png')); ?>" alt="">
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <div data-reveal>
          <h1><span class="accent-blue" data-i18n="hero_title_1"><?php echo esc_html(cha_get_option('hero_title_1', 'Together We Care.')); ?></span><br><span class="accent-red" data-i18n="hero_title_2"><?php echo esc_html(cha_get_option('hero_title_2', 'Together We Change Lives.')); ?></span></h1>
          <p class="lead" data-i18n="hero_lead"><?php echo esc_html(cha_get_option('hero_lead', 'Supporting and empowering people with bleeding disorders across Cambodia.')); ?></p>
          <div class="cta-row">
            <a class="btn btn-hero-primary btn-lg" href="<?php echo home_url('/haemophilia'); ?>" data-i18n="hero_cta_support"><?php echo esc_html(cha_get_option('hero_cta_support', 'Get Support')); ?> <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            <a class="btn btn-hero-member btn-lg" href="#" data-member-register-trigger data-i18n="nav_become_member"><?php echo esc_html(cha_get_option('hero_cta_member', 'Become a Member')); ?></a>
          </div>
        </div>
      </div>
      <svg class="hero-wave" viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#EAF0FB"/>
      </svg>
    </section>

    <!-- Stat strip (white card overlaid on hero) -->
    <section class="container" style="position:relative;margin-top:-80px;z-index:5;padding-bottom:0"><div class="stat-strip stat-strip-light" data-reveal><div class="container">
      <div class="stat"><div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div class="stat-text"><span class="value"><?php echo esc_html(cha_get_option('stat_provinces_val', '25')); ?></span><span class="label" data-i18n="stat_provinces"><?php echo esc_html(cha_get_option('stat_provinces_lbl', 'Provinces and Cities')); ?></span></div></div>
      <div class="stat"><div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div class="stat-text"><span class="value"><?php echo esc_html(cha_get_option('stat_patients_val', '500+')); ?></span><span class="label" data-i18n="stat_patients"><?php echo esc_html(cha_get_option('stat_patients_lbl', 'Hemophilia Patients')); ?></span></div></div>
      <div class="stat"><div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><div class="stat-text"><span class="value"><?php echo esc_html(cha_get_option('stat_partners_val', '15+')); ?></span><span class="label" data-i18n="stat_partners"><?php echo esc_html(cha_get_option('stat_partners_lbl', 'Healthcare Partners')); ?></span></div></div>
    </div></div></section>

    <!-- How We Help -->
    <section class="section section-blue-soft" id="help"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="help_heading"><?php echo esc_html(cha_get_option('help_heading', 'How We Help')); ?></h2><p data-i18n="help_sub"><?php echo esc_html(cha_get_option('help_sub', 'Four core areas where CHA makes a difference for patients and families across Cambodia.')); ?></p></div>
      <div class="grid grid-4">
        <div class="help-card" data-reveal><div class="icon icon-blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><h3 data-i18n="help_patient_support"><?php echo esc_html(cha_get_option('help_card_1_title', 'Patient Support')); ?></h3><p data-i18n="help_patient_support_desc"><?php echo esc_html(cha_get_option('help_card_1_desc', 'Emotional support, guidance and community for patients and families.')); ?></p><a class="card-link" href="<?php echo home_url('/about'); ?>" data-i18n="help_learn_more">Learn More <span class="arrow">→</span></a></div>
        <div class="help-card" data-reveal><div class="icon icon-red"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><h3 data-i18n="help_treatment"><?php echo esc_html(cha_get_option('help_card_2_title', 'Treatment Centres')); ?></h3><p data-i18n="help_treatment_desc"><?php echo esc_html(cha_get_option('help_card_2_desc', 'Find haemophilia treatment centres near you and get the care you need.')); ?></p><a class="card-link" href="<?php echo home_url('/programs'); ?>" data-i18n="help_learn_more">Learn More <span class="arrow">→</span></a></div>
        <div class="help-card" data-reveal><div class="icon icon-purple"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg></div><h3 data-i18n="help_become_member"><?php echo esc_html(cha_get_option('help_card_3_title', 'Become a Member')); ?></h3><p data-i18n="help_become_member_desc"><?php echo esc_html(cha_get_option('help_card_3_desc', 'Join our community and access exclusive resources and programs.')); ?></p><a class="card-link" href="#membership" data-i18n="help_join_now">Join Now <span class="arrow">→</span></a></div>
        <div class="help-card" data-reveal><div class="icon icon-green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><h3 data-i18n="help_donate"><?php echo esc_html(cha_get_option('help_card_4_title', 'Donate')); ?></h3><p data-i18n="help_donate_desc"><?php echo esc_html(cha_get_option('help_card_4_desc', 'Your support helps us provide treatment, education and hope.')); ?></p><a class="card-link" href="#" data-donate-trigger data-i18n="help_donate_now">Donate Now <span class="arrow">→</span></a></div>
      </div>
    </div></section>

    <!-- News section -->
    <section class="section section-soft" id="news-events"><div class="container">
      <div class="section-heading flex-between" data-reveal>
        <div>
          <h2 data-i18n="news_heading"><?php echo esc_html(cha_get_option('news_heading', 'Latest News & Events')); ?></h2>
          <p data-i18n="news_sub"><?php echo esc_html(cha_get_option('news_sub', 'Updates from our community awareness, treatment guidelines and training programs.')); ?></p>
        </div>
        <a class="btn btn-outline btn-sm news-view-all" href="javascript:void(0)" data-coming-soon data-i18n="news_view_all">View All <span class="arrow">→</span></a>
      </div>
      <div class="grid grid-3">
        <article class="card news-card" data-reveal><div class="card-img"><img src="<?php echo esc_url(cha_get_option('news_1_img', get_template_directory_uri() . '/news-event-1.jpg')); ?>" alt=""><div class="card-date"><span data-i18n="news_1_date"><?php echo esc_html(cha_get_option('news_1_date', 'Apr 17, 2025')); ?></span><span class="badge badge-event" data-i18n="news_1_badge"><?php echo esc_html(cha_get_option('news_1_badge', 'Event')); ?></span></div></div><div class="card-body"><h3 class="card-title" data-i18n="news_1_title"><?php echo esc_html(cha_get_option('news_1_title', 'World Haemophilia Day 2025 Community Awareness Event')); ?></h3><p class="card-text" data-i18n="news_1_desc"><?php echo esc_html(cha_get_option('news_1_desc', 'Join us for our annual awareness day in Phnom Penh.')); ?></p><a class="card-link" href="javascript:void(0)" data-coming-soon data-i18n="news_read_more">Read More <span class="arrow">→</span></a></div></article>
        <article class="card news-card" data-reveal><div class="card-img"><img src="<?php echo esc_url(cha_get_option('news_2_img', get_template_directory_uri() . '/news-update-1.jpg')); ?>" alt=""><div class="card-date"><span data-i18n="news_2_date"><?php echo esc_html(cha_get_option('news_2_date', 'Apr 16, 2025')); ?></span><span class="badge badge-update" data-i18n="news_2_badge"><?php echo esc_html(cha_get_option('news_2_badge', 'Update')); ?></span></div></div><div class="card-body"><h3 class="card-title" data-i18n="news_2_title"><?php echo esc_html(cha_get_option('news_2_title', 'New Treatment Guidelines Now Available in Cambodia')); ?></h3><p class="card-text" data-i18n="news_2_desc"><?php echo esc_html(cha_get_option('news_2_desc', 'Updated clinical guidelines for haemophilia management.')); ?></p><a class="card-link" href="javascript:void(0)" data-coming-soon data-i18n="news_read_more">Read More <span class="arrow">→</span></a></div></article>
        <article class="card news-card" data-reveal><div class="card-img"><img src="<?php echo esc_url(cha_get_option('news_3_img', get_template_directory_uri() . '/doctor training.png')); ?>" alt=""><div class="card-date"><span data-i18n="news_3_date"><?php echo esc_html(cha_get_option('news_3_date', 'Apr 12, 2025')); ?></span><span class="badge badge-workshop" data-i18n="news_3_badge"><?php echo esc_html(cha_get_option('news_3_badge', 'Workshop')); ?></span></div></div><div class="card-body"><h3 class="card-title" data-i18n="news_3_title"><?php echo esc_html(cha_get_option('news_3_title', 'Training Workshop for Healthcare Professionals')); ?></h3><p class="card-text" data-i18n="news_3_desc"><?php echo esc_html(cha_get_option('news_3_desc', 'Hands-on workshop covering diagnosis and treatment.')); ?></p><a class="card-link" href="javascript:void(0)" data-coming-soon data-i18n="news_read_more">Read More <span class="arrow">→</span></a></div></article>
      </div>
    </div></section>

    <!-- Red CTA banner (full width, separate section) -->
    <section class="section"><div class="container"><div class="cta-banner" data-reveal>
      <div class="cta-banner-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      </div>
      <div class="cta-banner-text">
        <h2 data-i18n="cta_heading"><?php echo esc_html(cha_get_option('cta_heading', 'Help Change Lives')); ?></h2>
        <p data-i18n="cta_sub"><?php echo esc_html(cha_get_option('cta_sub', 'Your donation helps us provide treatment, education and hope to people with bleeding disorders in Cambodia.')); ?></p>
      </div>
      <a class="btn btn-light btn-lg" href="#" data-donate-trigger data-i18n="cta_donate"><?php echo esc_html(cha_get_option('cta_btn', 'Donate Now')); ?> <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
    </div></div></section>

    <!-- ===== ABOUT US (condensed) ===== -->
    <section class="page-hero" id="about"><div class="container">
      <div data-reveal>
        <h1 data-i18n="about_heading"><?php echo esc_html(cha_get_option('about_heading', 'Who is CHA?')); ?></h1>
        <p class="lead" data-i18n="about_lead"><?php echo esc_html(cha_get_option('about_lead', 'The Cambodian Haemophilia Association is a patient-led organization dedicated to improving the quality of life for people living with bleeding disorders across Cambodia.')); ?></p>
        <div class="vm-cards">
          <div class="vm-card" data-reveal>
            <div class="vm-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
            <div class="vm-body">
              <span class="vm-label" data-i18n="about_vision_label"><?php echo esc_html(cha_get_option('about_vision_label', 'Our Vision')); ?></span>
              <p data-i18n="about_vision_text"><?php echo esc_html(cha_get_option('about_vision_text', 'A Cambodia where every person with a bleeding disorder has access to diagnosis, treatment, and support.')); ?></p>
            </div>
          </div>
          <div class="vm-card" data-reveal>
            <div class="vm-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
            <div class="vm-body">
              <span class="vm-label" data-i18n="about_mission_label"><?php echo esc_html(cha_get_option('about_mission_label', 'Our Mission')); ?></span>
              <p data-i18n="about_mission_text"><?php echo esc_html(cha_get_option('about_mission_text', 'To advocate for quality care, educate communities, support families, and empower caregivers.')); ?></p>
            </div>
          </div>
        </div>
      </div>
      <div class="page-hero-art" data-reveal>
        <div class="page-art"><img src="<?php echo esc_url(cha_get_option('about_team_img', get_template_directory_uri() . '/about-team.jpg')); ?>" alt="CHA leadership and team" style="width:100%;height:100%;object-fit:cover"></div>
      </div>
    </div></section>

    <!-- ===== YOUR IMPACT ===== -->
    <div class="section"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="impact_heading"><?php echo esc_html(cha_get_option('impact_heading', 'Your Impact')); ?></h2></div>
      <div class="impact-grid">
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><p data-i18n="impact_treatment"><?php echo esc_html(cha_get_option('impact_1', 'Provide treatment access for patients')); ?></p></div>
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><p data-i18n="impact_education"><?php echo esc_html(cha_get_option('impact_2', 'Support education and awareness')); ?></p></div>
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><p data-i18n="impact_healthcare"><?php echo esc_html(cha_get_option('impact_3', 'Strengthen healthcare capacity')); ?></p></div>
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div><p data-i18n="impact_families"><?php echo esc_html(cha_get_option('impact_4', 'Empower families and communities')); ?></p></div>
      </div>
    </div></div>

    <!-- ===== MEMBERSHIP & DONATE ===== -->
    <div class="section section-soft" id="membership"><div class="container" data-tabs>
      <div class="tabs-nav csr-tabs" style="margin-bottom:var(--s-8)">
        <button class="tab-btn" type="button" data-tab-group data-tab-target="csr-member">Membership</button>
        <button class="tab-btn is-active" type="button" data-tab-group data-tab-target="csr-donate">Donate</button>
      </div>
      <div class="tab-panel" data-tab-panel="csr-member" style="padding-top:0">
        <div class="section-heading" data-reveal><h2 data-i18n="membership_heading"><?php echo esc_html(cha_get_option('membership_benefits_heading', 'Membership Benefits')); ?></h2></div>
        <div class="membership-benefits">
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_1_title"><?php echo esc_html(cha_get_option('benefit_1_title', 'Community & Support')); ?></h3>
              <p data-i18n="membership_benefit_1_desc"><?php echo esc_html(cha_get_option('benefit_1_desc', 'Connect with patients, families, and caregivers across Cambodia.')); ?></p>
            </div>
          </div>
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_2_title"><?php echo esc_html(cha_get_option('benefit_2_title', 'Access to Resources')); ?></h3>
              <p data-i18n="membership_benefit_2_desc"><?php echo esc_html(cha_get_option('benefit_2_desc', 'Exclusive guides, educational materials, and treatment information.')); ?></p>
            </div>
          </div>
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_3_title"><?php echo esc_html(cha_get_option('benefit_3_title', 'Events & Workshops')); ?></h3>
              <p data-i18n="membership_benefit_3_desc"><?php echo esc_html(cha_get_option('benefit_3_desc', 'Participate in hands-on workshops, community events, and online learning sessions.')); ?></p>
            </div>
          </div>
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11l18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_4_title"><?php echo esc_html(cha_get_option('benefit_4_title', 'Advocacy & Awareness')); ?></h3>
              <p data-i18n="membership_benefit_4_desc"><?php echo esc_html(cha_get_option('benefit_4_desc', 'Help raise awareness and advocate for better care nationwide.')); ?></p>
            </div>
          </div>
        </div>
        <div class="membership-cta" data-reveal>
          <div class="membership-cta-content">
            <h2 data-i18n="membership_cta_title"><?php echo esc_html(cha_get_option('membership_cta_heading', 'Become a Member')); ?></h2>
            <p class="lead" data-i18n="membership_cta_sub"><?php echo esc_html(cha_get_option('membership_cta_text', 'Join our community to access exclusive resources, events, and peer support across Cambodia.')); ?></p>
            <div class="membership-features">
              <div class="feature" data-i18n="membership_cta_feature_1"><span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span> <?php echo esc_html(cha_get_option('membership_perk_1', 'Exclusive resources & guides')); ?></div>
              <div class="feature" data-i18n="membership_cta_feature_2"><span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span> <?php echo esc_html(cha_get_option('membership_perk_2', 'Events & community meetups')); ?></div>
              <div class="feature" data-i18n="membership_cta_feature_3"><span class="feature-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg></span> <?php echo esc_html(cha_get_option('membership_perk_3', 'Peer support network')); ?></div>
            </div>
            <div class="membership-cta-btns">
              <a class="btn-primary" href="javascript:void(0)" data-member-register-trigger data-i18n="membership_register"><?php echo esc_html(cha_get_option('membership_cta_btn', 'Register Now')); ?> <span class="arrow">→</span></a>
              <div class="membership-cta-links">
                <a href="javascript:void(0)" data-member-trigger data-i18n="membership_signin"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg> <?php echo esc_html(cha_get_option('membership_cta_login', 'Already a member? Sign In')); ?></a>
              </div>
            </div>
          </div>
          <div class="membership-cta-img">
            <img src="<?php echo get_template_directory_uri(); ?>/family.jpg" alt="CHA community — families and supporters">
            <div class="membership-cta-badge"><strong data-i18n="membership_badge_count"><?php echo esc_html(cha_get_option('membership_count', '500+')); ?></strong><span data-i18n="membership_badge_label"><?php echo esc_html(cha_get_option('membership_count_label', 'members & growing')); ?></span></div>
          </div>
        </div>
      </div>
      <div class="tab-panel is-active" data-tab-panel="csr-donate" style="padding-top:0">
      <div class="donation-wrap">
      <div class="donation-form" data-reveal>
        <h3 data-i18n="donate_heading">Make a Donation</h3>
        <form id="donate-form-submit" novalidate>
          <div class="tab-panel is-active" data-tab-panel="once" data-amount-group>
            <div class="amount-chips"><button type="button" class="amount-chip is-active" data-amount="10">$10</button><button type="button" class="amount-chip" data-amount="25">$25</button><button type="button" class="amount-chip" data-amount="50">$50</button><button type="button" class="amount-chip" data-amount="100">$100</button><button type="button" class="amount-chip" data-amount="other">Other</button></div>
            <input class="form-input mt-4" type="number" placeholder="Enter amount in USD" data-amount-other min="1">
          </div>
          <h4 style="margin:var(--s-6) 0 var(--s-3);font-size:.9375rem">Secure Payment</h4>
          <p class="text-muted mb-4" style="font-size:.875rem">Pay securely with credit/debit cards, ABA Pay, KHQR, WeChat Pay or Alipay via PayWay (ABA Bank).</p>
          <button type="submit" class="btn btn-donate btn-block btn-lg mt-6">Donate Securely</button>
          <p class="secure-note"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Secure &amp; encrypted via PayWay (ABA Bank)</p>
        </form>
        <div class="form-success" data-form-success hidden><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><h3>Thank You!</h3><p>Your generous donation will help change lives across Cambodia.</p></div>
      </div>
      <div class="campaigns-list" data-reveal>
        <h3 data-i18n="campaigns_heading"><?php echo esc_html(cha_get_option('campaigns_heading', 'Current Campaigns')); ?></h3>
        <div class="campaign-card"><div class="thumb"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:28px;height:28px;color:var(--c-red)"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><div><h4 data-i18n="campaigns_1_title"><?php echo esc_html(cha_get_option('campaign_1_title', 'Patient Support Fund')); ?></h4><p style="font-size:.8125rem;color:var(--c-muted);margin:0 0 var(--s-2)" data-i18n="campaigns_1_desc"><?php echo esc_html(cha_get_option('campaign_1_desc', 'Help patients access essential treatment and medication.')); ?></p><div class="progress"><div class="progress-bar" style="width:28%"></div></div><div class="progress-meta"><span><span data-i18n="campaigns_raised_label"><?php echo esc_html(cha_get_option('campaigns_raised_lbl', 'raised')); ?></span> <strong>$4,250</strong></span><span><span data-i18n="campaigns_goal_label"><?php echo esc_html(cha_get_option('campaigns_goal_lbl', 'Goal')); ?></span> $15,000</span></div></div></div>
        <div class="campaign-card"><div class="thumb"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:28px;height:28px;color:var(--c-blue)"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><div><h4 data-i18n="campaigns_2_title"><?php echo esc_html(cha_get_option('campaign_2_title', 'Education & Awareness')); ?></h4><p style="font-size:.8125rem;color:var(--c-muted);margin:0 0 var(--s-2)" data-i18n="campaigns_2_desc"><?php echo esc_html(cha_get_option('campaign_2_desc', 'Support workshops and awareness seminars across provinces.')); ?></p><div class="progress"><div class="progress-bar" style="width:26%"></div></div><div class="progress-meta"><span><span data-i18n="campaigns_raised_label"><?php echo esc_html(cha_get_option('campaigns_raised_lbl', 'raised')); ?></span> <strong>$2,180</strong></span><span><span data-i18n="campaigns_goal_label"><?php echo esc_html(cha_get_option('campaigns_goal_lbl', 'Goal')); ?></span> $8,500</span></div></div></div>
        <div class="campaign-card"><div class="thumb"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:28px;height:28px;color:var(--c-purple)"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div><div><h4 data-i18n="campaigns_3_title"><?php echo esc_html(cha_get_option('campaign_3_title', 'Emergency Assistance')); ?></h4><p style="font-size:.8125rem;color:var(--c-muted);margin:0 0 var(--s-2)" data-i18n="campaigns_3_desc"><?php echo esc_html(cha_get_option('campaign_3_desc', 'Provide urgent help for patients in critical situations.')); ?></p><div class="progress"><div class="progress-bar" style="width:30%"></div></div><div class="progress-meta"><span><span data-i18n="campaigns_raised_label"><?php echo esc_html(cha_get_option('campaigns_raised_lbl', 'raised')); ?></span> <strong>$1,500</strong></span><span><span data-i18n="campaigns_goal_label"><?php echo esc_html(cha_get_option('campaigns_goal_lbl', 'Goal')); ?></span> $5,000</span></div></div></div>
        <div style="margin-top:var(--s-8)"><div class="section-heading"><h3 style="font-size:1.125rem"><?php echo esc_html(cha_get_option('campaigns_corporate_heading', 'Corporate Partners')); ?></h3></div>
        <div class="partners-strip" data-reveal><div class="logos">
          <div class="logo" title="WFH"><svg viewBox="0 0 100 40" width="100" height="40" aria-label="WFH"><circle cx="14" cy="20" r="10" fill="none" stroke="currentColor" stroke-width="2"/><text x="32" y="18" font-family="Poppins" font-size="13" font-weight="700" fill="currentColor">WFH</text></svg></div>
          <div class="logo" title="IFAH"><svg viewBox="0 0 100 40" width="100" height="40"><text x="6" y="26" font-family="Poppins" font-size="20" font-weight="700" fill="currentColor">IFAH</text></svg></div>
          <div class="logo" title="PATH"><svg viewBox="0 0 80 40" width="80" height="40"><text x="6" y="28" font-family="Poppins" font-size="22" font-weight="700" fill="currentColor">PATH</text></svg></div>
        </div></div></div>
      </div>
    </div>
      </div>
    </div></div>

    <!-- ===== CONTACT ===== -->
    <div class="section-divider"><div class="divider-inner" data-i18n="contact_divider">Contact Us</div></div>
    <section class="section" id="contact"><div class="container">
      <div class="section-heading" data-reveal>
        <h2 data-i18n="contact_heading"><?php echo esc_html(cha_get_option('contact_heading', 'Contact Us')); ?></h2>
        <p data-i18n="contact_sub"><?php echo esc_html(cha_get_option('contact_sub', 'Have a question or want to get involved? We\'d love to hear from you.')); ?></p>
      </div><div class="contact-grid">
      <div class="contact-info" data-reveal>
        <h3 data-i18n="contact_info"><?php echo esc_html(cha_get_option('contact_get_in_touch', 'Get In Touch')); ?></h3>
        <p class="subtitle" data-i18n="contact_subtitle"><?php echo esc_html(cha_get_option('contact_we_are_here', "We're here to help patients, families, and partners across Cambodia.")); ?></p>
        <div class="items">
          <div class="item">
            <div class="icon-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            <div><span class="label" data-i18n="contact_address">Address</span><span class="value"><?php echo nl2br(esc_html(cha_get_option('contact_address', '#35, St. 121, Sangkat Tuel Tumpong 2,<br>Khan Chamkarmon, Phnom Penh, Cambodia'))); ?></span></div>
          </div>
          <div class="item">
            <div class="icon-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
            <div><span class="label" data-i18n="contact_phone">Phone</span><a class="value" href="tel:<?php echo esc_attr(cha_get_option('contact_phone_digits', '+85512345678')); ?>"><?php echo esc_html(cha_get_option('contact_phone', '(+855) 12 345 678')); ?></a></div>
          </div>
          <div class="item">
            <div class="icon-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <div><span class="label" data-i18n="contact_email">Email</span><a class="value" href="mailto:<?php echo esc_attr(cha_get_option('contact_email', 'info@chacambodia.org')); ?>"><?php echo esc_html(cha_get_option('contact_email', 'info@chacambodia.org')); ?></a></div>
          </div>
        </div>
        <div class="hours">
          <div class="hours-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> <span data-i18n="contact_hours"><?php echo esc_html(cha_get_option('contact_office_hours', 'Office Hours')); ?></span></div>
          <div class="hours-row"><span class="day">Monday – Friday</span><span class="time"><?php echo esc_html(cha_get_option('contact_hours_mf', '8:00 — 17:00')); ?></span></div>
          <div class="hours-row"><span class="day">Saturday</span><span class="time"><?php echo esc_html(cha_get_option('contact_hours_sat', '9:00 — 13:00')); ?></span></div>
          <div class="hours-row"><span class="day">Sunday</span><span class="time">Closed</span></div>
        </div>
        <div class="socials" aria-label="Social media">
          <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
          <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
          <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
          <a href="#" aria-label="Email"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></a>
          <a href="#" aria-label="Telegram"><svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M22 2L2 9.5l7 2.5L11 19l3.5-5L22 2zM9.5 12.5L20 4l-9 9.5-.5-1z"/></svg></a>
        </div>
      </div>
      <div class="contact-form" data-reveal>
        <h3 data-i18n="contact_message"><?php echo esc_html(cha_get_option('contact_send_msg', 'Send us a Message')); ?></h3>
        <p class="subtitle" data-i18n="contact_message_sub"><?php echo esc_html(cha_get_option('contact_send_sub', 'Fill out the form and our team will respond within 1-2 working days.')); ?></p>
        <form data-mock-form novalidate>
          <div class="form-row"><div class="form-group"><label class="form-label" for="cname" data-i18n="contact_name"><?php echo esc_html(cha_get_option('contact_form_name', 'Full Name')); ?> <span class="req">*</span></label><input class="form-input" type="text" id="cname" placeholder="<?php echo esc_attr(cha_get_option('contact_form_name_ph', 'Enter your full name')); ?>" required></div><div class="form-group"><label class="form-label" for="cemail" data-i18n="contact_email_label"><?php echo esc_html(cha_get_option('contact_form_email', 'Email')); ?> <span class="req">*</span></label><input class="form-input" type="email" id="cemail" placeholder="<?php echo esc_attr(cha_get_option('contact_form_email_ph', 'Enter your email')); ?>" required></div></div>
          <div class="form-group"><label class="form-label" for="csubject" data-i18n="contact_subject"><?php echo esc_html(cha_get_option('contact_form_subject', 'Subject')); ?> <span class="req">*</span></label><input class="form-input" type="text" id="csubject" placeholder="<?php echo esc_attr(cha_get_option('contact_form_subject_ph', "What's this about?")); ?>" required></div>
          <div class="form-group"><label class="form-label" for="cmessage" data-i18n="contact_message_label"><?php echo esc_html(cha_get_option('contact_form_message', 'Message')); ?> <span class="req">*</span></label><textarea class="form-textarea" id="cmessage" placeholder="<?php echo esc_attr(cha_get_option('contact_form_message_ph', 'How can we help?')); ?>" required></textarea></div>
          <button type="submit" class="btn btn-primary btn-lg" data-i18n="contact_send"><?php echo esc_html(cha_get_option('contact_form_btn', 'Send Message')); ?> <span class="arrow">→</span></button>
        </form>
        <div class="form-success" data-form-success hidden><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><h3><?php echo esc_html(cha_get_option('contact_form_success', 'Message Sent! Thank you for reaching out. We\'ll respond within 1-2 working days.')); ?></h3></div>
      </div>
    </div></div></section>

  </main>

  <?php get_footer(); ?>
