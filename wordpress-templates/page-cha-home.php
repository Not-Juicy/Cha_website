<?php
/*
Template Name: CHA Home Page
Description: Custom home page template for CHA website
*/

get_header();
?>

<a class="skip-link" href="#main">Skip to main content</a>

  <!-- HEADER -->
  <header class="site-header">
    <div class="container header-inner">
      <a class="brand" href="#home"><img class="brand-logo" src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/cha-logo-small.png" alt="Cambodian Haemophilia Association"></a>
      <nav class="main-nav" aria-label="Primary">
        <a href="#home" data-i18n="nav_home">Home</a>
        <div class="nav-drop" data-nav-drop>
          <button class="nav-drop-trigger" type="button" aria-expanded="false" aria-haspopup="true" data-i18n="nav_about_us">About Us<svg width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="nav-drop-panel">
            <a href="#about" data-i18n="nav_who_is_cha">Who is CHA?</a>
            <a href="#about-leadership" data-i18n="nav_leadership">Leadership structure and Groups</a>
            <a href="#about-src" data-i18n="nav_src">SRC</a>
            <a href="#about-history" data-i18n="nav_history">Our History</a>
            <a href="#about-wfh" data-i18n="nav_wfh">Our work with WFH and HFA</a>
            <a href="#contact" data-i18n="nav_contact_us">Contact Us</a>
          </div>
        </div>
        <div class="nav-drop" data-nav-drop>
          <button class="nav-drop-trigger" type="button" aria-expanded="false" aria-haspopup="true" data-i18n="nav_about_haemophilia">About Haemophilia<svg width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="nav-drop-panel">
            <a href="#vwd" data-i18n="nav_about_vwd">About VWD</a>
            <a href="#other-bleeding" data-i18n="nav_other_bleeding">About other bleeding disorders</a>
            <a href="#programs-centres" data-i18n="nav_treatment_centres">Haemophilia Treatment Centres</a>
            <span class="nav-drop-divider"></span>
            <a href="#csr" class="nav-drop-parent" data-i18n="nav_csr_program">CSR Program</a>
            <a href="#csr-fundraising" class="nav-drop-sub" data-i18n="nav_fundraising">Fundraising</a>
            <a href="#csr-donate" class="nav-drop-sub" data-i18n="nav_online_donation">Online donation</a>
            <a href="#csr-partners" class="nav-drop-sub" data-i18n="nav_corporate_partners">Corporate Partners</a>
          </div>
        </div>
        <div class="nav-drop" data-nav-drop>
          <button class="nav-drop-trigger" type="button" aria-expanded="false" aria-haspopup="true" data-i18n="nav_news">News<svg width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true"><path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="nav-drop-panel">
            <a href="#news" data-i18n="nav_latest_news">Latest News</a>
            <a href="#news-events" data-i18n="nav_upcoming_events">Upcoming Events</a>
          </div>
        </div>
        <a href="#contact" data-i18n="nav_contact">Contact</a>
      </nav>
      <div class="header-actions">
        <button class="lang-switcher" type="button" aria-label="Switch language" data-i18n-attr="aria-label:lang_switcher_aria" data-lang-toggle>
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          <span class="lang-label" data-i18n="lang_label">EN</span>
        </button>
        <a class="btn btn-member btn-sm" href="#" data-member-trigger aria-label="Member login" data-i18n="nav_become_member" data-i18n-attr="aria-label:nav_become_member_aria">Become a Member</a>
        <a class="btn btn-donate" href="#" data-donate-trigger aria-label="Open donation form" data-i18n="nav_donate" data-i18n-attr="aria-label:nav_donate_aria">Donate</a>
        <button class="nav-toggle" type="button" aria-label="Open menu" aria-expanded="false" aria-controls="mobile-drawer"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg></button>
      </div>
    </div>
  </header>

  <!-- MOBILE DRAWER -->
  <div class="mobile-drawer" id="mobile-drawer" aria-hidden="true">
    <div class="backdrop"></div>
    <div class="panel" role="dialog" aria-modal="true" aria-label="Site menu">
      <div class="panel-head">
<a class="brand" href="#home"><img class="brand-logo" src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/cha-logo-small.png" alt="Cambodian Haemophilia Association"></a>
        <button class="close" type="button" aria-label="Close menu"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
      </div>
      <nav aria-label="Mobile primary">
        <a href="#home" data-i18n="nav_home">Home</a>
        <div class="drawer-group">
          <button class="drawer-sub-trigger" type="button" aria-expanded="false" data-i18n="nav_about_us">About Us<svg width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="drawer-sub-items">
            <a href="#about" data-i18n="nav_who_is_cha">Who is CHA?</a>
            <a href="#about-leadership" data-i18n="nav_leadership">Leadership structure and Groups</a>
            <a href="#about-src" data-i18n="nav_src">SRC</a>
            <a href="#about-history" data-i18n="nav_history">Our History</a>
            <a href="#about-wfh" data-i18n="nav_wfh">Our work with WFH and HFA</a>
            <a href="#contact" data-i18n="nav_contact_us">Contact Us</a>
          </div>
        </div>
        <div class="drawer-group">
          <button class="drawer-sub-trigger" type="button" aria-expanded="false" data-i18n="nav_about_haemophilia">About Haemophilia<svg width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="drawer-sub-items">
            <a href="#vwd" data-i18n="nav_about_vwd">About VWD</a>
            <a href="#other-bleeding" data-i18n="nav_other_bleeding">About other bleeding disorders</a>
            <a href="#programs-centres" data-i18n="nav_treatment_centres">Haemophilia Treatment Centres</a>
            <span class="drawer-sub-divider"></span>
            <a href="#csr" class="drawer-sub-parent" data-i18n="nav_csr_program">CSR Program</a>
            <a href="#csr-fundraising" class="drawer-sub-sub" data-i18n="nav_fundraising">Fundraising</a>
            <a href="#csr-donate" class="drawer-sub-sub" data-i18n="nav_online_donation">Online donation</a>
            <a href="#csr-partners" class="drawer-sub-sub" data-i18n="nav_corporate_partners">Corporate Partners</a>
          </div>
        </div>
        <div class="drawer-group">
          <button class="drawer-sub-trigger" type="button" aria-expanded="false" data-i18n="nav_news">News<svg width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true"><path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg></button>
          <div class="drawer-sub-items">
            <a href="#news" data-i18n="nav_latest_news">Latest News</a>
            <a href="#news-events" data-i18n="nav_upcoming_events">Upcoming Events</a>
          </div>
        </div>
        <a href="#contact" data-i18n="nav_contact">Contact</a>
      </nav>
      <div class="panel-actions">
        <button class="lang-switcher" type="button" aria-label="Switch language" data-lang-toggle data-i18n-attr="aria-label:lang_switcher_aria" style="margin-bottom:var(--s-3);width:100%;justify-content:center">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
          <span class="lang-label" data-i18n="lang_label">EN</span>
        </button>
        <a class="btn btn-member btn-block" href="#" data-member-trigger data-i18n="nav_become_member">Become a Member</a>
        <a class="btn btn-donate btn-block" href="#" data-donate-trigger data-i18n="nav_donate">Donate</a>
      </div>
    </div>
  </div>

  <main id="main">

    <!-- ===== HOME ===== -->
    <section class="hero" id="home">
      <img class="hero-bg" src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/Heroo.png" alt="">
      <div class="hero-overlay"></div>
      <div class="container hero-content">
        <div data-reveal>
          <h1><span class="accent-blue" data-i18n="hero_title_1">Together We Care.</span><br><span class="accent-red" data-i18n="hero_title_2">Together We Change Lives.</span></h1>
          <p class="lead" data-i18n="hero_lead">Supporting and empowering people with bleeding disorders across Cambodia.</p>
          <div class="cta-row">
            <a class="btn btn-hero-primary btn-lg" href="#haemophilia" data-i18n="hero_cta_support">Get Support <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
            <a class="btn btn-hero-member btn-lg" href="#" data-member-register-trigger data-i18n="nav_become_member">Become a Member</a>
          </div>
        </div>
      </div>
      <svg class="hero-wave" viewBox="0 0 1440 80" preserveAspectRatio="none" aria-hidden="true">
        <path d="M0,40 C360,80 1080,0 1440,40 L1440,80 L0,80 Z" fill="#EAF0FB"/>
      </svg>
    </section>

    <!-- Stat strip (white card overlaid on hero) -->
    <section class="container" style="position:relative;margin-top:-80px;z-index:5;padding-bottom:0"><div class="stat-strip stat-strip-light" data-reveal><div class="container">
      <div class="stat"><div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div class="stat-text"><span class="value">12+</span><span class="label" data-i18n="stat_provinces">Provinces Reached</span></div></div>
      <div class="stat"><div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><div class="stat-text"><span class="value">1,200+</span><span class="label" data-i18n="stat_patients">Patients Supported</span></div></div>
      <div class="stat"><div class="stat-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><div class="stat-text"><span class="value">15+</span><span class="label" data-i18n="stat_partners">Healthcare Partners</span></div></div>
    </div></div></section>

    <!-- How We Help -->
    <section class="section section-blue-soft" id="help"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="help_heading">How We Help</h2><p data-i18n="help_sub">Four core areas where CHA makes a difference for patients and families across Cambodia.</p></div>
      <div class="grid grid-4">
        <div class="help-card" data-reveal><div class="icon icon-blue"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div><h3 data-i18n="help_patient_support">Patient Support</h3><p data-i18n="help_patient_support_desc">Emotional support, guidance and community for patients and families.</p><a class="card-link" href="#about" data-i18n="help_learn_more">Learn More <span class="arrow">→</span></a></div>
        <div class="help-card" data-reveal><div class="icon icon-red"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><h3 data-i18n="help_treatment">Treatment Centres</h3><p data-i18n="help_treatment_desc">Find haemophilia treatment centres near you and get the care you need.</p><a class="card-link" href="#programs-centres" data-i18n="help_learn_more">Learn More <span class="arrow">→</span></a></div>
        <div class="help-card" data-reveal><div class="icon icon-purple"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/></svg></div><h3 data-i18n="help_become_member">Become a Member</h3><p data-i18n="help_become_member_desc">Join our community and access exclusive resources and programs.</p><a class="card-link" href="#programs-member" data-i18n="help_join_now">Join Now <span class="arrow">→</span></a></div>
        <div class="help-card" data-reveal><div class="icon icon-green"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><h3 data-i18n="help_donate">Donate</h3><p data-i18n="help_donate_desc">Your support helps us provide treatment, education and hope.</p><a class="card-link" href="#" data-donate-trigger data-i18n="help_donate_now">Donate Now <span class="arrow">→</span></a></div>
      </div>
    </div></section>

    <!-- News section -->
    <section class="section section-soft" id="news-events"><div class="container">
      <div class="section-heading flex-between" data-reveal>
        <div>
          <h2 data-i18n="news_heading">Latest News &amp; Events</h2>
          <p data-i18n="news_sub">Updates from our community awareness, treatment guidelines and training programs.</p>
        </div>
        <a class="btn btn-tertiary" href="#" data-i18n="news_view_all">View All <span class="arrow">→</span></a>
      </div>
      <div class="grid grid-3">
        <article class="card news-card" data-reveal><div class="card-img"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/news-event-1.jpg" alt="World Haemophilia Day 2025"></div><div class="card-body"><div class="card-date">Apr 17, 2025<span class="badge badge-event">Event</span></div><h3 class="card-title">World Haemophilia Day 2025 Community Awareness Event</h3><p class="card-text">Join us for our annual awareness day in Phnom Penh.</p><a class="card-link" href="#" data-i18n="news_read_more">Read More <span class="arrow">→</span></a></div></article>
        <article class="card news-card" data-reveal><div class="card-img"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/news-update-1.jpg" alt="New Treatment Guidelines"></div><div class="card-body"><div class="card-date">Apr 16, 2025<span class="badge badge-update">Update</span></div><h3 class="card-title">New Treatment Guidelines Now Available in Cambodia</h3><p class="card-text">Updated clinical guidelines for haemophilia management.</p><a class="card-link" href="#" data-i18n="news_read_more">Read More <span class="arrow">→</span></a></div></article>
        <article class="card news-card" data-reveal><div class="card-img"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/doctor-training.png" alt="Training Workshop"></div><div class="card-body"><div class="card-date">Apr 12, 2025<span class="badge badge-workshop">Workshop</span></div><h3 class="card-title">Training Workshop for Healthcare Professionals</h3><p class="card-text">Hands-on workshop covering diagnosis and treatment.</p><a class="card-link" href="#" data-i18n="news_read_more">Read More <span class="arrow">→</span></a></div></article>
      </div>
    </div></section>

    <!-- Red CTA banner (full width, separate section) -->
    <section class="section"><div class="container"><div class="cta-banner" data-reveal>
      <div class="cta-banner-icon" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
      </div>
      <div class="cta-banner-text">
        <h2 data-i18n="cta_heading">Help Change Lives</h2>
        <p data-i18n="cta_sub">Your donation helps us provide treatment, education and hope to people with bleeding disorders in Cambodia.</p>
      </div>
      <a class="btn btn-light btn-lg" href="#" data-donate-trigger data-i18n="cta_donate">Donate Now <svg class="arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg></a>
    </div></div></section>

    <!-- ===== ABOUT US ===== -->
    <div class="section-divider"><div class="divider-inner" data-i18n="about_divider">About Us</div></div>
    <section class="page-hero" id="about"><div class="container">
      <div data-reveal>
        <h1 data-i18n="about_heading">Who is CHA?</h1>
        <p class="lead" data-i18n="about_lead">The Cambodian Haemophilia Association is a patient-led organization dedicated to improving the quality of life for people living with bleeding disorders across Cambodia.</p>
        <div class="vm-cards">
          <div class="vm-card" data-reveal>
            <div class="vm-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></div>
            <div class="vm-body">
              <span class="vm-label" data-i18n="about_vision_label">Our Vision</span>
              <p data-i18n="about_vision_text">A Cambodia where every person with a bleeding disorder has access to diagnosis, treatment, and support.</p>
            </div>
          </div>
          <div class="vm-card" data-reveal>
            <div class="vm-card-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg></div>
            <div class="vm-body">
              <span class="vm-label" data-i18n="about_mission_label">Our Mission</span>
              <p data-i18n="about_mission_text">To advocate for quality care, educate communities, support families, and empower caregivers.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="page-hero-art" data-reveal>
        <div class="page-art"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/about-team.jpg" alt="CHA leadership and team" style="width:100%;height:100%;object-fit:cover"></div>
      </div>
    </div></section>

    <section class="section section-soft src-section" id="about-src"><div class="container">
      <div class="src-header">
        <div>
          <span class="src-eyebrow"><span class="heart" aria-hidden="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></span><span data-i18n="src_eyebrow">Serving Communities</span></span>
          <h2 class="src-title" data-i18n="src_heading">SRC</h2>
          <p class="src-sub" data-i18n="src_sub">CHA's commitment to community outreach, volunteer engagement, and public awareness across Cambodia.</p>
        </div>
        <div class="src-header-art" aria-hidden="true">
          <div class="dot-grid">
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            <span></span><span></span><span></span><span></span><span></span><span></span><span></span>
          </div>
          <span class="accent-dot"></span>
          <span class="accent-dot small"></span>
          <div class="big-drop">
            <svg viewBox="0 0 140 175" xmlns="http://www.w3.org/2000/svg">
              <defs>
                <linearGradient id="srcDropGrad" x1="0" y1="0" x2="1" y2="1">
                  <stop offset="0%" stop-color="#E31E24"/>
                  <stop offset="100%" stop-color="#6A2C91"/>
                </linearGradient>
              </defs>
              <path d="M70 5 C 35 55, 18 85, 18 110 C 18 145, 42 168, 70 168 C 98 168, 122 145, 122 110 C 122 85, 105 55, 70 5 Z" fill="url(#srcDropGrad)"/>
              <g transform="translate(70 90)" stroke="#fff" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path d="M-22 18 C -22 8, -16 0, -8 0 C -3 0, 0 3, 0 6 C 0 3, 3 0, 8 0 C 16 0, 22 8, 22 18 C 22 28, 0 42, 0 42 C 0 42, -22 28, -22 18 Z"/>
                <path d="M-14 8 C -10 0, -4 -2, 0 -2"/>
                <path d="M-22 22 L -18 28"/>
                <path d="M-18 14 L -22 18"/>
                <path d="M22 22 L 18 28"/>
                <path d="M18 14 L 22 18"/>
              </g>
            </svg>
          </div>
        </div>
      </div>
      <div class="grid grid-3">
        <article class="src-card src-card-v2 red-top" data-reveal>
          <div class="src-bg" aria-hidden="true"></div>
          <div class="src-photo-art">
            <div class="src-photo-icon" aria-hidden="true">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11l18-8v18l-18-8z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg>
            </div>
            <div class="src-photo-stat">
              <span class="src-photo-stat-num">12+</span>
              <span class="src-photo-stat-lbl" data-i18n="src_stat_label_1">Provinces</span>
            </div>
          </div>
          <div class="src-stamp" aria-hidden="true"></div>
          <div class="src-body">
            <span class="src-kicker" data-i18n="src_kicker_reach">Reach</span>
            <h3 data-i18n="src_card_1_title">Community Outreach</h3>
            <p data-i18n="src_card_1_desc">Awareness campaigns, Khmer-language education, and partnerships with local health centres that reach patients where they live.</p>
            <div class="src-foot">
              <a class="src-link" href="#contact" data-i18n="src_link_1">Learn more <span class="arrow">→</span></a>
            </div>
          </div>
        </article>
        <article class="src-card src-card-v2 blue-top" data-reveal>
          <div class="src-bg" aria-hidden="true"></div>
          <div class="src-photo-art">
            <div class="src-photo-icon" aria-hidden="true">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <div class="src-photo-stat">
              <span class="src-photo-stat-num">80+</span>
              <span class="src-photo-stat-lbl" data-i18n="src_stat_label_2">Volunteers</span>
            </div>
          </div>
          <div class="src-stamp" aria-hidden="true"></div>
          <div class="src-body">
            <span class="src-kicker" data-i18n="src_kicker_people">People</span>
            <h3 data-i18n="src_card_2_title">Volunteer Program</h3>
            <p data-i18n="src_card_2_desc">Patients, families, and healthcare students who lead events, mentor newly diagnosed peers, and run community-based activities year-round.</p>
            <div class="src-foot">
              <a class="src-link" href="#contact" data-i18n="src_link_2">Join us <span class="arrow">→</span></a>
            </div>
          </div>
        </article>
        <article class="src-card src-card-v2 purple-top" data-reveal>
          <div class="src-bg" aria-hidden="true"></div>
          <div class="src-photo-art">
            <div class="src-photo-icon" aria-hidden="true">
              <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.75" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            </div>
            <div class="src-photo-stat">
              <span class="src-photo-stat-num">1</span>
              <span class="src-photo-stat-lbl" data-i18n="src_stat_label_3">Chapter</span>
            </div>
          </div>
          <div class="src-stamp" aria-hidden="true"></div>
          <div class="src-body">
            <span class="src-kicker" data-i18n="src_kicker_region">Region</span>
            <h3 data-i18n="src_card_3_title">Siem Reap Chapter</h3>
            <p data-i18n="src_card_3_desc">Our northwest hub coordinates local outreach, patient support, and partnerships with Siem Reap Provincial Hospital.</p>
            <div class="src-foot">
              <a class="src-link" href="#contact" data-i18n="src_link_3">Visit chapter <span class="arrow">→</span></a>
            </div>
          </div>
        </article>
      </div>
      <div class="src-cta" data-reveal>
        <div class="src-cta-icon" aria-hidden="true">
          <svg width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
          </svg>
        </div>
        <div class="src-cta-text">
          <h3 data-i18n="src_cta_heading">Want to get involved?</h3>
          <p data-i18n="src_cta_sub">Join our volunteer network and make a difference in the bleeding disorders community across Cambodia.</p>
        </div>
        <div class="src-cta-actions">
          <a class="btn btn-light" href="#contact" data-i18n="src_cta_btn_1">Get Involved <span class="arrow">→</span></a>
          <a class="btn btn-ghost" href="#" data-i18n="src_cta_btn_2">Learn More <span class="arrow">→</span></a>
        </div>
      </div>
    </div></section>

    <section class="section" id="about-history"><div class="container">
      <div class="section-heading flex-between" data-reveal><div><h2 data-i18n="history_heading">Our History</h2></div><a class="btn btn-tertiary" href="#" data-i18n="history_view_timeline">View Full Timeline <span class="arrow">→</span></a></div>
      <div class="history-intro" data-reveal>
        <p data-i18n="history_intro">CHA was founded in 2011 by patients and families who came together with a shared vision: to ensure no one in Cambodia faces a bleeding disorder alone. What began as a small support group has grown into a national patient-led organization.</p>
      </div>
      <div class="timeline">
        <div class="timeline-item" data-reveal>
          <div class="timeline-head">
            <span class="year">2011</span>
          </div>
          <h3 data-i18n="history_established">CHA Established</h3>
          <p data-i18n="history_established_desc">CHA was established by patients and families.</p>
        </div>
        <div class="timeline-item" data-reveal>
          <div class="timeline-head">
            <span class="year">2014</span>
          </div>
          <h3 data-i18n="history_wfh_member">WFH Member</h3>
          <p data-i18n="history_wfh_member_desc">Became a member of the World Federation of Hemophilia.</p>
        </div>
        <div class="timeline-item" data-reveal>
          <div class="timeline-head">
            <span class="year">2017</span>
          </div>
          <h3 data-i18n="history_hospital">Hospital Partnerships</h3>
          <p data-i18n="history_hospital_desc">Partnered with hospitals to improve treatment access.</p>
        </div>
        <div class="timeline-item" data-reveal>
          <div class="timeline-head">
            <span class="year">2023</span>
          </div>
          <h3 data-i18n="history_national">National Reach</h3>
          <p data-i18n="history_national_desc">Expanded education and outreach across provinces.</p>
        </div>
      </div>
      <div class="presidents-block" data-reveal>
        <h3 data-i18n="history_presidents">Past Presidents</h3>
        <div class="presidents-grid">
          <div class="president-card">
            <div class="president-image"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/president-1.jpg" alt="Past President 1"></div>
            <div class="president-body">
              <p class="president-role" data-i18n="history_president">President</p>
              <h4>Past President 1</h4>
              <span class="president-term">2011 – 2015</span>
            </div>
          </div>
          <div class="president-card">
            <div class="president-image"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/president-2.jpg" alt="Past President 2"></div>
            <div class="president-body">
              <p class="president-role" data-i18n="history_president">President</p>
              <h4>Past President 2</h4>
              <span class="president-term">2015 – 2019</span>
            </div>
          </div>
          <div class="president-card">
            <div class="president-image"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/president-3.jpg" alt="Past President 3"></div>
            <div class="president-body">
              <p class="president-role" data-i18n="history_president">President</p>
              <h4>Past President 3</h4>
              <span class="president-term">2019 – 2023</span>
            </div>
          </div>
        </div>
      </div>
    </div></section>

    <section class="section section-soft" id="about-leadership"><div class="container">
      <div class="section-heading flex-between" data-reveal><div><h2 data-i18n="leadership_heading">Leadership Team</h2><p data-i18n="leadership_sub">Dedicated individuals leading CHA's mission across Cambodia.</p></div><a class="btn btn-secondary btn-sm" href="#" data-i18n="leadership_meet">Meet the Full Team <span class="arrow">→</span></a></div>
      <div class="leadership-grid">
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&h=500&q=80" alt="Chan Soveun Ly"></div><div class="leader-info"><h3>Chan Soveun Ly</h3><p class="role">President</p></div></div>
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&h=500&q=80" alt="Sok Sothea"></div><div class="leader-info"><h3>Sok Sothea</h3><p class="role">Vice President</p></div></div>
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&h=500&q=80" alt="Bory Kao"></div><div class="leader-info"><h3>Bory Kao</h3><p class="role">Medical Advisor</p></div></div>
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&h=500&q=80" alt="Yordak Kim"></div><div class="leader-info"><h3>Yordak Kim</h3><p class="role">Executive Director</p></div></div>
      </div>
      <div class="groups-grid">
        <div class="group-card" data-reveal>
          <div class="group-icon" style="background:var(--c-blue-100);color:var(--c-blue)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <h3 data-i18n="leadership_youth_title">Youth Group</h3>
          <p data-i18n="leadership_youth_desc">A network of young patients and supporters driving awareness campaigns, peer mentoring, and youth-led advocacy across Cambodia.</p>
        </div>
        <div class="group-card" data-reveal>
          <div class="group-icon" style="background:#EFE6F4;color:var(--c-purple)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
          <h3 data-i18n="leadership_women_title">Women's Group</h3>
          <p data-i18n="leadership_women_desc">Empowering women affected by bleeding disorders through support circles, education on VWD and carrier issues, and community-building events.</p>
        </div>
      </div>
    </div></section>

    <section class="section" id="about-wfh" style="background:linear-gradient(180deg, #FAFBFE 0%, #F4F6FC 100%)"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="wfh_heading">Our Work with WFH &amp; HFA</h2><p data-i18n="wfh_sub">CHA proudly partners with leading global organizations to strengthen haemophilia care across Cambodia.</p></div>
      <div class="wfh-feature-grid">
        <div class="wfh-feature" data-reveal>
          <div class="wfh-feature-mark">
            <svg viewBox="0 0 56 56" fill="none" aria-hidden="true"><circle cx="28" cy="28" r="26" fill="#E5E8F2" stroke="#0B1D6D" stroke-width="1.5"/><circle cx="28" cy="28" r="10" fill="none" stroke="#0B1D6D" stroke-width="1.5"/><path d="M28 6a15.3 15.3 0 0 1 6 14 15.3 15.3 0 0 1-6 14 15.3 15.3 0 0 1-6-14 15.3 15.3 0 0 1 6-14z" fill="none" stroke="#0B1D6D" stroke-width="1.5"/></svg>
          </div>
          <h3 data-i18n="wfh_wfh_name">World Federation of Hemophilia</h3>
          <span class="wfh-tag" data-i18n="wfh_wfh_tag">Member Since 2014</span>
          <div class="wfh-stat"><span class="wfh-stat-num">140+</span><span class="wfh-stat-label" data-i18n="wfh_wfh_stat_label">Countries in Network</span></div>
          <p data-i18n="wfh_wfh_desc">Global member of the WFH network. Through this partnership, CHA accesses international treatment guidelines, training programs, and humanitarian aid that directly improve patient care.</p>
          <a class="wfh-link" href="#" data-i18n="wfh_wfh_link">Visit WFH <span class="arrow">→</span></a>
        </div>
        <div class="wfh-divider"><svg viewBox="0 0 24 24" fill="none" stroke="var(--c-border)" stroke-width="1.5" aria-hidden="true"><line x1="1" y1="12" x2="23" y2="12"/></svg></div>
        <div class="wfh-feature" data-reveal>
          <div class="wfh-feature-mark">
            <svg viewBox="0 0 56 56" fill="none" aria-hidden="true"><circle cx="28" cy="28" r="26" fill="#EFE6F4" stroke="#6A2C91" stroke-width="1.5"/><path d="M28 12c-6 0-10 4-10 10 0 8 10 20 10 20s10-12 10-20c0-6-4-10-10-10z" fill="none" stroke="#6A2C91" stroke-width="1.5"/><circle cx="28" cy="22" r="3" fill="#6A2C91"/></svg>
          </div>
          <h3 data-i18n="wfh_hfa_name">Haemophilia Foundation Australia</h3>
          <span class="wfh-tag purple-tag" data-i18n="wfh_hfa_tag">Training Partner</span>
          <div class="wfh-stat"><span class="wfh-stat-num">15+</span><span class="wfh-stat-label" data-i18n="wfh_hfa_stat_label">Joint Programs</span></div>
          <p data-i18n="wfh_hfa_desc">HFA partners with CHA on capacity building, clinical training, and patient advocacy. Joint programs connect Cambodian clinicians with Australian expertise.</p>
          <a class="wfh-link" href="#" data-i18n="wfh_hfa_link">Learn More <span class="arrow">→</span></a>
        </div>
      </div>
    </div></section>

    <!-- ===== ABOUT HAEMOPHILIA ===== -->
    <div class="section-divider"><div class="divider-inner" data-i18n="haem_divider">About Haemophilia</div></div>
    <div class="section" id="haemophilia" style="background:linear-gradient(135deg, #FAFBFE 0%, #F0F4FB 50%, #E8EEF8 100%)"><div class="container"><div class="split">
      <div data-reveal><h2 style="margin-bottom:var(--s-4)" data-i18n="haem_heading">What is Haemophilia?</h2>
      <p data-i18n="haem_para_1">Haemophilia is a rare genetic bleeding disorder that affects a person's ability to stop bleed. People with haemophilia can bleed longer than others after an injury or even without a known cause.</p>
      <p data-i18n="haem_para_2">While there is no cure, modern treatments allow people with haemophilia to live full, active and healthy lives. Early diagnosis, proper treatment and ongoing support are key to preventing complications and joint damage.</p>
      <a class="btn btn-secondary" href="#contact" data-i18n="haem_contact">Contact a Specialist <span class="arrow">→</span></a></div>
      <div class="split-illust" data-reveal><svg viewBox="0 0 200 240" width="280" height="280" aria-label="Blood drop"><defs><radialGradient id="drop-grad" cx="50%" cy="40%" r="60%"><stop offset="0%" stop-color="#FF6B6B"/><stop offset="100%" stop-color="#E31E24"/></radialGradient></defs><path d="M100 20 C 60 80, 30 130, 30 170 C 30 210, 60 230, 100 230 C 140 230, 170 210, 170 170 C 170 130, 140 80, 100 20 Z" fill="url(#drop-grad)"/><ellipse cx="78" cy="120" rx="14" ry="22" fill="rgba(255,255,255,0.35)"/></svg></div>
    </div></div></div>

    <div class="section section-soft"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="types_heading">Types of Haemophilia</h2><p data-i18n="types_sub">The two main types of haemophilia — both require proper diagnosis and lifelong management.</p></div>
      <div class="grid grid-2">
        <div class="type-card" data-reveal><svg class="drop" viewBox="0 0 56 64" aria-hidden="true"><path d="M28 4 C 16 24, 8 38, 8 48 C 8 58, 18 64, 28 64 C 38 64, 48 58, 48 48 C 48 38, 40 24, 28 4 Z" fill="#E31E24"/><ellipse cx="20" cy="32" rx="4" ry="7" fill="rgba(255,255,255,0.4)"/></svg><div><h3 data-i18n="types_a_title">Haemophilia A</h3><p data-i18n="types_a_desc">Caused by a deficiency of factor VIII. The most common type.</p></div></div>
        <div class="type-card" data-reveal><svg class="drop" viewBox="0 0 56 64" aria-hidden="true"><path d="M28 4 C 16 24, 8 38, 8 48 C 8 58, 18 64, 28 64 C 38 64, 48 58, 48 48 C 48 38, 40 24, 28 4 Z" fill="#0B1D6D"/><ellipse cx="20" cy="32" rx="4" ry="7" fill="rgba(255,255,255,0.4)"/></svg><div><h3 data-i18n="types_b_title">Haemophilia B</h3><p data-i18n="types_b_desc">Caused by a deficiency of factor IX. Sometimes called Christmas disease.</p></div></div>
      </div>
    </div></div>

    <div class="section symptoms-section"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="symptoms_heading">Common Symptoms</h2><p data-i18n="symptoms_sub">Recognizing the signs of a bleeding disorder is the first step toward diagnosis and proper care.</p></div>
      <div class="symptoms-grid">
        <div class="symptom-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg></div><p class="label" data-i18n="symptom_bruising">Easy Bruising</p><p class="hint" data-i18n="symptom_bruising_desc">Unexplained bruises from minor bumps or pressure.</p></div>
        <div class="symptom-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2C8 2 6 5 6 8c0 4 6 12 6 12s6-8 6-12c0-3-2-6-6-6z"/><circle cx="12" cy="8" r="2"/></svg></div><p class="label" data-i18n="symptom_nosebleeds">Frequent Nosebleeds</p><p class="hint" data-i18n="symptom_nosebleeds_desc">Recurring nosebleeds that are hard to stop.</p></div>
        <div class="symptom-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 2v20M2 12h20"/><circle cx="12" cy="12" r="4"/></svg></div><p class="label" data-i18n="symptom_gums">Bleeding Gums</p><p class="hint" data-i18n="symptom_gums_desc">Gums that bleed during brushing or eating.</p></div>
        <div class="symptom-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 18h8"/><path d="M3 22h18"/><path d="M14 22a7 7 0 1 0 0-14h-1"/><path d="M9 14h2"/><path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2z"/><path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3"/></svg></div><p class="label" data-i18n="symptom_joint">Joint Pain or Swelling</p><p class="hint" data-i18n="symptom_joint_desc">Painful, swollen joints after minor injury or activity.</p></div>
        <div class="symptom-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><p class="label" data-i18n="symptom_prolonged">Prolonged Bleeding</p><p class="hint" data-i18n="symptom_prolonged_desc">Bleeding that lasts longer than expected after cuts.</p></div>
      </div>
      <div class="symptoms-cta" data-reveal><p data-i18n="symptom_cta">Experiencing any of these symptoms? Early diagnosis can make a life-changing difference.</p><div class="btn-row"><a class="btn btn-primary" href="#programs-centres" data-i18n="symptom_find_centre">Find a Treatment Centre <span class="arrow">→</span></a><a class="btn btn-secondary" href="#contact" data-i18n="symptom_contact_specialist">Contact a Specialist</a></div></div>
    </div></div>

    <section class="section section-soft" id="vwd"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="vwd_heading">Von Willebrand Disease (VWD)</h2></div>
      <div class="split"><div data-reveal><p data-i18n="vwd_para_1">Von Willebrand Disease is the most common inherited bleeding disorder, affecting both males and females equally. It is caused by a deficiency or dysfunction of von Willebrand factor (VWF), a protein that helps blood clot.</p><p data-i18n="vwd_para_2">There are three main types of VWD — Type 1 (mild), Type 2 (moderate), and Type 3 (severe). Each varies in how much VWF is present and how well it functions. Symptoms include easy bruising, frequent nosebleeds, heavy menstrual bleeding, and prolonged bleeding after surgery or injury.</p><a class="btn btn-secondary" href="#programs-centres" data-i18n="vwd_find">Find Treatment <span class="arrow">→</span></a></div><div class="split-illust" data-reveal><svg viewBox="0 0 240 240" width="260" height="260" aria-label="VWD blood factors illustration"><defs><linearGradient id="vwd-grad" x1="0%" y1="0%" x2="100%" y2="100%"><stop offset="0%" stop-color="#6A2C91"/><stop offset="100%" stop-color="#B07AD4"/></linearGradient></defs><circle cx="120" cy="120" r="100" fill="none" stroke="url(#vwd-grad)" stroke-width="2.5" stroke-dasharray="8 6"/><circle cx="120" cy="120" r="70" fill="none" stroke="var(--c-purple-100)" stroke-width="1.5"/><circle cx="85" cy="95" r="16" fill="#EFE6F4" stroke="var(--c-purple)" stroke-width="2"/><circle cx="155" cy="95" r="16" fill="#EFE6F4" stroke="var(--c-purple)" stroke-width="2"/><circle cx="120" cy="160" r="22" fill="var(--c-purple-100)" stroke="var(--c-purple)" stroke-width="2"/><line x1="85" y1="95" x2="155" y2="95" stroke="#D4C4E8" stroke-width="1"/><line x1="120" y1="111" x2="120" y2="138" stroke="#D4C4E8" stroke-width="1"/></svg></div></div>
    </div></section>

    <section class="section" id="other-bleeding"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="other_heading">Other Bleeding Disorders</h2></div>
      <div class="grid grid-2">
        <div class="type-card" data-reveal><svg class="drop" viewBox="0 0 56 64" aria-hidden="true"><path d="M28 4 C 16 24, 8 38, 8 48 C 8 58, 18 64, 28 64 C 38 64, 48 58, 48 48 C 48 38, 40 24, 28 4 Z" fill="#6A2C91"/><ellipse cx="20" cy="32" rx="4" ry="7" fill="rgba(255,255,255,0.4)"/></svg><div><h3 data-i18n="other_rare_title">Rare Factor Deficiencies</h3><p data-i18n="other_rare_desc">Deficiencies in factors I, II, V, VII, X, XI, XII and XIII. Each requires specific diagnosis and treatment.</p></div></div>
        <div class="type-card" data-reveal><svg class="drop" viewBox="0 0 56 64" aria-hidden="true"><path d="M28 4 C 16 24, 8 38, 8 48 C 8 58, 18 64, 28 64 C 38 64, 48 58, 48 48 C 48 38, 40 24, 28 4 Z" fill="#B45309"/><ellipse cx="20" cy="32" rx="4" ry="7" fill="rgba(255,255,255,0.4)"/></svg><div><h3 data-i18n="other_platelet_title">Platelet Function Disorders</h3><p data-i18n="other_platelet_desc">Conditions where platelets don't work properly, leading to bleeding despite normal platelet counts.</p></div></div>
      </div>
      <p style="text-align:center;margin-top:var(--s-6);color:var(--c-muted)" data-i18n="other_more">For more information on any bleeding disorder, contact our team or visit a treatment centre.</p>
    </div></section>

    <section class="section section-soft" id="programs-centres"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="treatment_heading">Treatment Centres</h2><p data-i18n="treatment_sub">Find haemophilia treatment centres across Cambodia — search by province.</p></div>
      <div class="tc-search mb-6" data-reveal><label class="form-label" for="province" data-i18n="treatment_select">Select Province</label><select class="form-select" id="province" data-province-select><option value="">All provinces</option><option value="phnom-penh">Phnom Penh</option><option value="siem-reap">Siem Reap</option><option value="battambang">Battambang</option><option value="sihanoukville">Sihanoukville</option></select></div>
      <div class="grid" style="gap:var(--s-5)">
        <article class="tc-card" data-reveal><div class="tc-img"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/hospital-1.jpg" alt="National Paediatric Hospital" style="width:100%;height:100%;object-fit:cover"></div><div class="tc-body"><h3>National Paediatric Hospital — Haemophilia Clinic</h3><div class="tc-meta"><span>📍 Phnom Penh</span><span>📞 023 721 833</span></div><div class="tc-tags"><span class="tc-tag">Haemophilia A &amp; B</span><span class="tc-tag">VWD</span><span class="tc-tag">Consultation</span><span class="tc-tag">Laboratory</span></div><a class="card-link mt-4" href="#" data-i18n="treatment_view_map">View on Map <span class="arrow">→</span></a></article>
        <article class="tc-card" data-reveal><div class="tc-img"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/hospital-2.jpg" alt="Calmette Hospital" style="width:100%;height:100%;object-fit:cover"></div><div class="tc-body"><h3>Calmette Hospital — Haemophilia Unit</h3><div class="tc-meta"><span>📍 Phnom Penh</span><span>📞 023 338 707</span></div><div class="tc-tags"><span class="tc-tag">Haemophilia A &amp; B</span><span class="tc-tag">Factor Replacement</span><span class="tc-tag">Counselling</span></div><a class="card-link mt-4" href="#" data-i18n="treatment_view_map">View on Map <span class="arrow">→</span></a></article>
        <article class="tc-card" data-reveal><div class="tc-img"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/hospital-3.jpg" alt="Siem Reap Provincial Hospital" style="width:100%;height:100%;object-fit:cover"></div><div class="tc-body"><h3>Siem Reap Provincial Hospital</h3><div class="tc-meta"><span>📍 Siem Reap</span><span>📞 063 765 376</span></div><div class="tc-tags"><span class="tc-tag">Haemophilia A &amp; B</span><span class="tc-tag">Consultation</span><span class="tc-tag">Emergency Care</span></div><a class="card-link mt-4" href="#" data-i18n="treatment_view_map">View on Map <span class="arrow">→</span></a></article>
      </div>
      <div class="emergency-banner" data-reveal><div><h3 data-i18n="treatment_emergency">Emergency Support</h3><p data-i18n="treatment_emergency_desc">If you have a bleeding emergency, contact your nearest treatment centre or call our support line.</p></div><a class="phone" href="tel:+85512345678"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>012 345 678</a></div>
    </div></section>

    <section class="section" id="csr"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="csr_heading">CSR Program</h2><p data-i18n="csr_sub">Fundraising, donations, and corporate partnerships that power our mission.</p></div>
      <div class="csr-grid">
        <div class="csr-block csr-blue" id="csr-fundraising" data-reveal>
          <div class="csr-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/><polyline points="17 6 23 6 23 12"/></svg></div>
          <h3 data-i18n="csr_fundraising">Fundraising</h3>
          <p data-i18n="csr_fundraising_desc">Raising funds through community drives, events, and partner campaigns that keep our programs running.</p>
          <a class="csr-btn csr-btn-blue" href="#programs-campaigns" data-i18n="csr_view_campaigns">View campaigns <span class="arrow">→</span></a>
        </div>
        <div class="csr-block csr-red" id="csr-donate" data-reveal>
          <div class="csr-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg></div>
          <h3 data-i18n="csr_donate_online">Online donation</h3>
          <p data-i18n="csr_donate_online_desc">Donate securely via PayPal or Stripe — every contribution changes lives across Cambodia.</p>
          <a class="csr-btn csr-btn-red" href="#" data-donate-trigger data-i18n="csr_donate_now">Donate now <span class="arrow">→</span></a>
        </div>
        <div class="csr-block csr-purple" id="csr-partners" data-reveal>
          <div class="csr-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
          <h3 data-i18n="csr_partners_title">Corporate Partners</h3>
          <p data-i18n="csr_partners_desc">Trusted organisations that support our mission and amplify our reach nationwide.</p>
          <a class="csr-btn csr-btn-purple" href="#contact" data-i18n="csr_become_partner">Become a partner <span class="arrow">→</span></a>
        </div>
      </div>
    </div></section>

    <div class="hero-red" style="margin-top:0"><div class="container">
      <div data-reveal><h1 data-i18n="cta_heading">Help Change Lives</h1><p data-i18n="cta_sub">Your donation helps us provide treatment, education and hope to people with bleeding disorders in Cambodia.</p></div>
      <div class="heart-art" data-reveal><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/heart-hands.jpg" alt="Heart in hands - donation" style="width:100%;height:100%;object-fit:cover;border-radius:var(--r-lg)"></div>
    </div></div>

    <div class="section"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="impact_heading">Your Impact</h2></div>
      <div class="impact-grid">
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><p data-i18n="impact_treatment">Provide treatment access for patients</p></div>
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><p data-i18n="impact_education">Support education and awareness</p></div>
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><p data-i18n="impact_healthcare">Strengthen healthcare capacity</p></div>
        <div class="impact-card" data-reveal><div class="icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div><p data-i18n="impact_families">Empower families and communities</p></div>
      </div>
    </div></div>

    <div class="section section-soft"><div class="container" data-tabs>
      <div class="tabs-nav csr-tabs" style="margin-bottom:var(--s-8)">
        <button class="tab-btn" type="button" data-tab-group data-tab-target="csr-member">Membership</button>
        <button class="tab-btn is-active" type="button" data-tab-group data-tab-target="csr-donate">Donate</button>
      </div>
      <div class="tab-panel" data-tab-panel="csr-member" style="padding-top:0">
        <div class="section-heading" data-reveal><h2 data-i18n="membership_heading">Membership Benefits</h2></div>
        <div class="membership-benefits">
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_1_title">Community &amp; Support</h3>
              <p data-i18n="membership_benefit_1_desc">Connect with patients, families, and caregivers across Cambodia.</p>
            </div>
          </div>
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_2_title">Access to Resources</h3>
              <p data-i18n="membership_benefit_2_desc">Exclusive guides, educational materials, and treatment information.</p>
            </div>
          </div>
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_3_title">Events &amp; Workshops</h3>
              <p data-i18n="membership_benefit_3_desc">Attend training sessions, awareness events, and webinars.</p>
            </div>
          </div>
          <div class="membership-benefit-card" data-reveal>
            <div class="membership-benefit-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 11l18-5v12L3 14v-3z"/><path d="M11.6 16.8a3 3 0 1 1-5.8-1.6"/></svg></div>
            <div>
              <h3 data-i18n="membership_benefit_4_title">Advocacy &amp; Awareness</h3>
              <p data-i18n="membership_benefit_4_desc">Help raise awareness and advocate for better care nationwide.</p>
            </div>
          </div>
        </div>
        <div class="membership-cta" data-reveal>
          <div class="membership-cta-content">
            <h2>Become a Member</h2>
            <p class="lead">Join our community to access exclusive resources, events, and peer support across Cambodia.</p>
            <div class="membership-cta-btns">
              <a class="btn-primary" href="#" data-member-register-trigger>Register Now <span class="arrow">→</span></a>
              <div class="membership-cta-links">
                <a href="#" data-member-trigger>Already a member? Sign In</a>
                <span class="sep">·</span>
                <a href="patient-card.html">View My Card</a>
              </div>
            </div>
          </div>
          <div class="membership-cta-img">
            <img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/family.jpg" alt="CHA community — families and supporters">
            <div class="membership-cta-badge"><strong>500+</strong><span>members &amp; growing</span></div>
          </div>
        </div>
      </div>
      <div class="tab-panel is-active" data-tab-panel="csr-donate" style="padding-top:0">
      <div class="donation-wrap">
      <div class="donation-form" data-reveal>
        <h3 data-i18n="donate_heading">Make a Donation</h3>
        <form id="donate-form-submit" novalidate>
          <div class="tabs-nav" data-tabs><button class="tab-btn is-active" type="button" data-tab-group data-tab-target="once">One-time</button><button class="tab-btn" type="button" data-tab-group data-tab-target="monthly">Monthly</button></div>
          <div class="tab-panel is-active" data-tab-panel="once" data-amount-group>
            <div class="amount-chips"><button type="button" class="amount-chip is-active" data-amount="10">$10</button><button type="button" class="amount-chip" data-amount="25">$25</button><button type="button" class="amount-chip" data-amount="50">$50</button><button type="button" class="amount-chip" data-amount="100">$100</button><button type="button" class="amount-chip" data-amount="other">Other</button></div>
            <input class="form-input mt-4" type="number" placeholder="Enter amount in USD" data-amount-other min="1">
          </div>
          <div class="tab-panel" data-tab-panel="monthly" data-amount-group>
            <p class="text-muted mb-4" style="font-size:.875rem">Monthly gifts provide steady support for long-term care.</p>
            <div class="amount-chips"><button type="button" class="amount-chip" data-amount="5">$5/mo</button><button type="button" class="amount-chip is-active" data-amount="10">$10/mo</button><button type="button" class="amount-chip" data-amount="25">$25/mo</button><button type="button" class="amount-chip" data-amount="50">$50/mo</button><button type="button" class="amount-chip" data-amount="other">Other</button></div>
            <input class="form-input mt-4" type="number" placeholder="Enter monthly amount" data-amount-other min="1">
          </div>
          <h4 style="margin:var(--s-6) 0 var(--s-3);font-size:.9375rem">Payment Method</h4>
          <div class="radio-row"><label class="radio-pill"><input type="radio" name="pay" value="paypal" checked> PayPal</label><label class="radio-pill"><input type="radio" name="pay" value="aba"> ABA</label></div>
          <button type="submit" class="btn btn-donate btn-block btn-lg mt-6">Donate Securely</button>
          <p class="secure-note"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg> Secure &amp; encrypted via PayPal &amp; ABA</p>
        </form>
        <div class="form-success" data-form-success hidden><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><h3>Thank You!</h3><p>Your generous donation will help change lives across Cambodia.</p></div>
      </div>
      <div class="campaigns-list" data-reveal>
        <h3>Current Campaigns</h3>
        <div class="campaign-card"><div class="thumb"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:28px;height:28px;color:var(--c-red)"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><div><h4>Patient Support Fund</h4><p style="font-size:.8125rem;color:var(--c-muted);margin:0 0 var(--s-2)">Help patients access essential treatment and medication.</p><div class="progress"><div class="progress-bar" style="width:28%"></div></div><div class="progress-meta"><span><strong>$4,250</strong> raised</span><span>Goal $15,000</span></div></div></div>
        <div class="campaign-card"><div class="thumb"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:28px;height:28px;color:var(--c-blue)"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div><div><h4>Education &amp; Awareness</h4><p style="font-size:.8125rem;color:var(--c-muted);margin:0 0 var(--s-2)">Support workshops and awareness seminars across provinces.</p><div class="progress"><div class="progress-bar" style="width:26%"></div></div><div class="progress-meta"><span><strong>$2,180</strong> raised</span><span>Goal $8,500</span></div></div></div>
        <div class="campaign-card"><div class="thumb"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" style="width:28px;height:28px;color:var(--c-purple)"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div><div><h4>Emergency Assistance</h4><p style="font-size:.8125rem;color:var(--c-muted);margin:0 0 var(--s-2)">Provide urgent help for patients in critical situations.</p><div class="progress"><div class="progress-bar" style="width:30%"></div></div><div class="progress-meta"><span><strong>$1,500</strong> raised</span><span>Goal $5,000</span></div></div></div>
        <div style="margin-top:var(--s-8)"><div class="section-heading"><h3 style="font-size:1.125rem">Corporate Partners</h3></div>
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
        <h2 data-i18n="contact_heading">Contact Us</h2>
        <p data-i18n="contact_sub">Have a question or want to get involved? We'd love to hear from you.</p>
      </div><div class="contact-grid">
      <div class="contact-info" data-reveal>
        <h3 data-i18n="contact_info">Get In Touch</h3>
        <p class="subtitle" data-i18n="contact_subtitle">We're here to help patients, families, and partners across Cambodia.</p>
        <div class="items">
          <div class="item">
            <div class="icon-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
            <div><span class="label" data-i18n="contact_address">Address</span><span class="value">#35, St. 121, Sangkat Tuel Tumpong 2,<br>Khan Chamkarmon, Phnom Penh, Cambodia</span></div>
          </div>
          <div class="item">
            <div class="icon-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></div>
            <div><span class="label" data-i18n="contact_phone">Phone</span><a class="value" href="tel:+85512345678">(+855) 12 345 678</a></div>
          </div>
          <div class="item">
            <div class="icon-wrap"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
            <div><span class="label" data-i18n="contact_email">Email</span><a class="value" href="mailto:info@chacambodia.org.kh">info@chacambodia.org.kh</a></div>
          </div>
        </div>
        <div class="hours">
          <div class="hours-title"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> <span data-i18n="contact_hours">Office Hours</span></div>
          <div class="hours-row"><span class="day">Monday – Friday</span><span class="time">8:00 – 17:00</span></div>
          <div class="hours-row"><span class="day">Saturday</span><span class="time">9:00 – 13:00</span></div>
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
        <h3 data-i18n="contact_message">Send us a Message</h3>
        <p class="subtitle" data-i18n="contact_message_sub">Fill out the form and our team will respond within 1–2 working days.</p>
        <form data-mock-form novalidate>
          <div class="form-row"><div class="form-group"><label class="form-label" for="cname" data-i18n="contact_name">Full Name <span class="req">*</span></label><input class="form-input" type="text" id="cname" placeholder="Enter your full name" data-i18n-placeholder="contact_name_ph" required></div><div class="form-group"><label class="form-label" for="cemail" data-i18n="contact_email_label">Email <span class="req">*</span></label><input class="form-input" type="email" id="cemail" placeholder="Enter your email" data-i18n-placeholder="contact_email_ph" required></div></div>
          <div class="form-group"><label class="form-label" for="csubject" data-i18n="contact_subject">Subject <span class="req">*</span></label><input class="form-input" type="text" id="csubject" placeholder="What's this about?" data-i18n-placeholder="contact_subject_ph" required></div>
          <div class="form-group"><label class="form-label" for="cmessage" data-i18n="contact_message_label">Message <span class="req">*</span></label><textarea class="form-textarea" id="cmessage" placeholder="How can we help?" data-i18n-placeholder="contact_message_ph" required></textarea></div>
          <button type="submit" class="btn btn-primary btn-lg" data-i18n="contact_send">Send Message <span class="arrow">→</span></button>
        </form>
        <div class="form-success" data-form-success hidden><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg><h3>Message Sent!</h3><p>Thank you for reaching out. We'll respond within 1–2 working days.</p></div>
      </div>
    </div></div></section>

  </main>

  <!-- Donate modal -->
  <div class="donate-modal" id="donate-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Make a donation">
    <div class="donate-modal-backdrop" data-donate-close></div>
    <div class="donate-modal-panel">
      <div class="donate-modal-header">
        <div class="donate-modal-title-block">
          <div class="donate-modal-icon" style="background: rgba(227,30,36,0.1); color: var(--c-red);">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
            </svg>
          </div>
          <span class="donate-modal-title" style="font-size: 1.0625rem; font-weight: 700; color: var(--c-blue);">Make a Donation</span>
        </div>
        <button class="donate-modal-close" type="button" data-donate-close aria-label="Close donation form"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
      </div>
      <div class="donate-modal-body">
        <div class="modal-acct-top">
          <div>
            <h3 class="modal-acct-welcome">Help Change Lives! ❤️</h3>
            <p class="modal-acct-sub">Your support provides treatment, education, and hope to people with bleeding disorders in Cambodia.</p>
          </div>
          <div class="modal-acct-shield">
            <svg viewBox="0 0 80 80" fill="none">
              <path d="M40 6C40 6 18 18 18 34c0 14 10 22 22 22s22-8 22-22C62 18 40 6 40 6z" fill="url(#donate-shield-grad)"/>
              <path d="M32 38l6 6 12-12" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
              <defs>
                <linearGradient id="donate-shield-grad" x1="18" y1="6" x2="62" y2="56">
                  <stop stop-color="#E31E24"/>
                  <stop offset="1" stop-color="#0B1D6D"/>
                </linearGradient>
              </defs>
            </svg>
          </div>
        </div>

        <div class="modal-acct-header">
          <div class="modal-acct-avatar" style="background: linear-gradient(135deg, #E31E24 0%, #9E171A 100%);">❤️</div>
          <div class="modal-acct-info">
            <p class="modal-acct-name">Donation</p>
            <p class="modal-acct-email">Secure & encrypted</p>
          </div>
          <span class="modal-acct-status"><span class="dot" style="background: #22C55E;"></span> Safe</span>
        </div>

        <form id="donate-modal-form" novalidate>
          <div data-tabs>
            <!-- One-time / Monthly Tabs -->
            <div class="tabs-nav" style="background: var(--c-gray-100); padding: 6px; border-radius: var(--r-xl); margin-bottom: var(--s-5);">
              <button class="tab-btn is-active" type="button" data-tab-group data-tab-target="modal-once" style="flex: 1; padding: 12px 16px; border-radius: var(--r-lg); font-weight: 700; font-size: 1.125rem; white-space: nowrap;">One-time</button>
              <button class="tab-btn" type="button" data-tab-group data-tab-target="modal-monthly" style="flex: 1; padding: 12px 16px; border-radius: var(--r-lg); font-weight: 700; font-size: 1.125rem; white-space: nowrap;">Monthly</button>
            </div>

            <!-- One-time panel -->
            <div class="tab-panel is-active" data-tab-panel="modal-once">
              <div class="amount-chips" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: var(--s-3); margin-bottom: var(--s-4);">
                <button type="button" class="amount-chip is-active" data-amount="10" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$10</button>
                <button type="button" class="amount-chip" data-amount="25" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$25</button>
                <button type="button" class="amount-chip" data-amount="50" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$50</button>
                <button type="button" class="amount-chip" data-amount="100" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$100</button>
                <button type="button" class="amount-chip" data-amount="other" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">Other</button>
              </div>
              <input class="form-input" type="number" placeholder="Enter amount in USD" data-amount-other min="1" style="padding: 16px 18px; border-radius: var(--r-lg); font-size: 1.125rem;">
            </div>

            <!-- Monthly panel -->
            <div class="tab-panel" data-tab-panel="modal-monthly">
              <p class="text-muted mb-4" style="font-size:.875rem; padding: 12px 16px; background: var(--c-gray-100); border-radius: var(--r-lg); margin-bottom: var(--s-4); display: flex; align-items: center; gap: 10px;">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 18px; height: 18px; color: var(--c-red);">
                  <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
                Monthly gifts provide steady support for long-term care.
              </p>
              <div class="amount-chips" style="display: grid; grid-template-columns: repeat(5, 1fr); gap: var(--s-3); margin-bottom: var(--s-4);">
                <button type="button" class="amount-chip" data-amount="5" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$5/mo</button>
                <button type="button" class="amount-chip is-active" data-amount="10" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$10/mo</button>
                <button type="button" class="amount-chip" data-amount="25" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$25/mo</button>
                <button type="button" class="amount-chip" data-amount="50" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">$50/mo</button>
                <button type="button" class="amount-chip" data-amount="other" style="padding: 16px 12px; font-size: 1.25rem; font-weight: 700; border-radius: var(--r-lg); border: 2px solid var(--c-border);">Other</button>
              </div>
              <input class="form-input" type="number" placeholder="Enter monthly amount" data-amount-other min="1" style="padding: 16px 18px; border-radius: var(--r-lg); font-size: 1.125rem;">
            </div>
          </div>

          <!-- Payment Method -->
          <h4 style="margin: var(--s-6) 0 var(--s-3); font-size: 1.125rem; font-weight: 700; color: var(--c-text); display: flex; align-items: center; gap: 10px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 20px; height: 20px; color: var(--c-red);">
              <rect x="2" y="5" width="20" height="14" rx="2"/>
              <line x1="2" y1="10" x2="22" y2="10"/>
            </svg>
            Payment Method
          </h4>
          <div class="radio-row" style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--s-4); margin-bottom: var(--s-6);">
            <label class="radio-pill" data-payment-option="paypal" style="padding: 18px 16px; border-radius: var(--r-lg); border: 2px solid var(--c-border); display: flex; align-items: center; justify-content: space-between; gap: 12px; cursor: pointer;">
              <div style="display: flex; align-items: center; gap: 12px;">
                <span class="custom-radio" style="width: 24px; height: 24px; border-radius: 50%; border: 2px solid var(--c-border); display: flex; align-items: center; justify-content: center; transition: all 0.2s;">
                  <span style="width: 12px; height: 12px; border-radius: 50%; background: var(--c-red); display: none;"></span>
                </span>
                <span style="font-size: 1.25rem; font-weight: 700;">PayPal</span>
              </div>
              <input type="radio" name="modal-pay" value="paypal" checked style="display: none;">
              <svg viewBox="0 0 24 24" fill="currentColor" style="width: 32px; height: 32px;">
                <path d="M7.076 21.337H2.47a.641.641 0 0 1-.633-.74L4.944.901C5.026.382 5.474 0 5.998 0h7.46c2.57 0 4.578.543 5.69 1.81 1.01 1.15 1.304 2.42 1.012 4.287-.023.143-.047.288-.077.437-.983 5.05-4.349 6.797-8.647 6.797h-2.19c-.524 0-.968.382-1.05.9l-1.12 7.106z"/>
              </svg>
            </label>
            <label class="radio-pill" data-payment-option="aba" style="padding: 18px 16px; border-radius: var(--r-lg); border: 2px solid var(--c-border); display: flex; align-items: center; justify-content: space-between; gap: 12px; cursor: pointer;">
              <div style="display: flex; align-items: center; gap: 12px;">
                <span class="custom-radio" style="width: 24px; height: 24px; border-radius: 50%; border: 2px solid var(--c-border); display: flex; align-items: center; justify-content: center; transition: all 0.2s;">
                  <span style="width: 12px; height: 12px; border-radius: 50%; background: var(--c-red); display: none;"></span>
                </span>
                <span style="font-size: 1.25rem; font-weight: 700;">ABA</span>
              </div>
              <input type="radio" name="modal-pay" value="aba" style="display: none;">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 24px; height: 24px; color: var(--c-gray-400);">
                <rect x="2" y="5" width="20" height="14" rx="2"/>
                <line x1="2" y1="10" x2="22" y2="10"/>
              </svg>
            </label>
          </div>

          <!-- Submit Button -->
          <button type="submit" class="btn btn-donate btn-block btn-lg" style="padding: 18px 24px; border-radius: var(--r-full); font-size: 1.25rem; font-weight: 800; background: linear-gradient(135deg, var(--c-red) 0%, #9E171A 100%); box-shadow: 0 8px 24px rgba(227, 30, 36, 0.3); display: flex; align-items: center; justify-content: center; gap: 12px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 22px; height: 22px;">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
            Donate Now
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 22px; height: 22px;">
              <polyline points="9 18 15 12 9 6"/>
            </svg>
          </button>

          <p class="secure-note" style="margin-top: var(--s-4); text-align: center; font-size: 1rem; color: var(--c-gray-500); display: flex; align-items: center; justify-content: center; gap: 8px;">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width: 20px; height: 20px; color: #22C55E;">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              <polyline points="9 12 11 14 15 10"/>
            </svg>
            Secure &amp; encrypted via PayPal &amp; ABA
          </p>
        </form>
      </div>
    </div>
  </div>

  <!-- Member modal -->
  <div class="donate-modal" id="member-modal" aria-hidden="true" role="dialog" aria-modal="true" aria-label="Member login">
    <div class="donate-modal-backdrop" data-member-close></div>
    <div class="donate-modal-panel">
      <div class="donate-modal-header">
        <div class="donate-modal-title-block">
          <div class="donate-modal-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
          <span class="donate-modal-title" id="member-modal-title">Member Login</span>
        </div>
        <button class="donate-modal-close" type="button" data-member-close aria-label="Close"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
      </div>
      <div class="donate-modal-body">
        <div id="member-login-panel">
          <p class="modal-subtitle">Sign in to access your account, resources, and community.</p>
          <form data-mock-form novalidate>
            <div class="form-group"><label class="form-label" for="memail">Email <span class="req">*</span></label><input class="form-input" type="email" id="memail" placeholder="Enter your email" required></div>
            <div class="form-group"><label class="form-label" for="mpass">Password <span class="req">*</span></label><input class="form-input" type="password" id="mpass" placeholder="Enter your password" required></div>
            <div style="display:flex;justify-content:flex-end;margin-bottom:var(--s-4)"><a href="#" style="font-size:0.8125rem;color:var(--c-muted)">Forgot password?</a></div>
            <div class="modal-btn-row">
              <button type="submit" class="btn btn-primary">Sign In</button>
            </div>
          </form>
          <p style="text-align:center;margin-top:var(--s-5);font-size:0.875rem;color:var(--c-muted)"><a href="#" data-member-register style="color:var(--c-blue);font-weight:var(--fw-semibold)">Create Account</a></p>
        </div>
        <div id="member-account-panel" style="display:none">
          <div class="modal-acct-top">
            <div>
              <h3 class="modal-acct-welcome">Welcome back, <span class="name" id="acct-name">—</span>! 👋</h3>
              <p class="modal-acct-sub">Your membership is active and ready to use.</p>
            </div>
            <div class="modal-acct-shield">
              <svg viewBox="0 0 80 80" fill="none"><path d="M40 6C40 6 18 18 18 34c0 14 10 22 22 22s22-8 22-22C62 18 40 6 40 6z" fill="url(#shield-grad)"/><path d="M32 38l6 6 12-12" stroke="#fff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/><defs><linearGradient id="shield-grad" x1="18" y1="6" x2="62" y2="56"><stop stop-color="#0B1D6D"/><stop offset="1" stop-color="#6A2C91"/></linearGradient></defs></svg>
            </div>
          </div>
          <div class="modal-acct-header">
            <div class="modal-acct-avatar" id="acct-avatar">—</div>
            <div class="modal-acct-info">
              <p class="modal-acct-name" id="acct-name-display">—</p>
              <p class="modal-acct-email" id="acct-email">—</p>
            </div>
            <span class="modal-acct-status"><span class="dot"></span> Active</span>
          </div>
          <div class="modal-acct-id">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><line x1="2" y1="10" x2="22" y2="10"/></svg>
            <span class="id-label">Membership ID:</span> <span class="id-value" id="acct-id">—</span>
          </div>
          <div class="modal-info-card">
            <div class="modal-info-card-title"><span class="title-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></span> Member Details</div>
            <div class="modal-info-grid">
              <div class="modal-info-item">
                <div class="item-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
                <div><div class="label">Role</div><div class="value" id="acct-role">—</div></div>
              </div>
              <div class="modal-info-item">
                <div class="item-icon red"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                <div><div class="label">Province</div><div class="value" id="acct-province">—</div></div>
              </div>
              <div class="modal-info-item">
                <div class="item-icon purple"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg></div>
                <div><div class="label">Member Since</div><div class="value" id="acct-since">—</div></div>
              </div>
            </div>
          </div>
          <div class="modal-btn-row">
            <a class="btn btn-primary" href="patient-card.html">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
              My CHA Member Card <span class="arrow">→</span>
            </a>
            <button type="button" id="acct-logout" class="btn btn-outline">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
              Sign Out
            </button>
          </div>
        </div>
        <div id="member-register-panel" style="display:none">
          <p class="modal-subtitle">Join our community of patients, families, and supporters.</p>
          <form data-mock-form novalidate>
            <div class="form-row"><div class="form-group"><label class="form-label" for="mregname">Full Name <span class="req">*</span></label><input class="form-input" type="text" id="mregname" placeholder="Enter your full name" required></div><div class="form-group"><label class="form-label" for="mregemail">Email <span class="req">*</span></label><input class="form-input" type="email" id="mregemail" placeholder="Enter your email" required></div></div>
            <div class="form-group"><label class="form-label" for="mregpass">Password <span class="req">*</span></label><input class="form-input" type="password" id="mregpass" placeholder="Create a password" required></div>
            <div class="form-row"><div class="form-group"><label class="form-label" for="mregprov">Province</label><select class="form-select" id="mregprov"><option value="">Select Province</option><option>Phnom Penh</option><option>Siem Reap</option><option>Battambang</option><option>Other</option></select></div><div class="form-group"><label class="form-label" for="mregrole">I am a</label><select class="form-select" id="mregrole"><option value="">Select</option><option>Patient</option><option>Family member / Caregiver</option><option>Healthcare professional</option><option>Supporter</option></select></div></div>
            <div class="form-group"><label class="form-check"><input type="checkbox" id="mregterms"><span>I agree to the <a href="terms.html" target="_blank">Terms &amp; Conditions</a></span></label></div>
            <div class="modal-btn-row">
              <button type="submit" class="btn btn-primary">Create Account</button>
            </div>
          </form>
          <p style="text-align:center;margin-top:var(--s-5);font-size:0.875rem;color:var(--c-muted)">Already have an account? <a href="#" data-member-back-login style="color:var(--c-blue);font-weight:var(--fw-semibold)">Sign In</a></p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer transition wave -->
  <div class="footer-wave">
    <svg viewBox="0 0 1440 80" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0,0 L0,60 Q120,80 360,60 Q600,40 720,50 Q960,70 1200,50 Q1320,40 1440,50 L1440,0 Z" fill="#ffffff"/>
    </svg>
  </div>

  <!-- FOOTER -->
  <footer class="site-footer"><div class="container">
    <div class="footer-grid">
      <div class="footer-col footer-col-brand">
        <div class="footer-brand"><img src="http://chacambodia.nexusfinance.asia/wp-content/uploads/2026/06/cha-logo-small.png" alt="Cambodian Haemophilia Association" style="height:52px;width:auto;max-width:200px;object-fit:contain"></div>
        <p class="footer-tagline" data-i18n="footer_tagline">Dedicated to improving the quality of life for all people affected by bleeding disorders in Cambodia.</p>
        <div class="footer-socials">
          <a href="#" aria-label="Facebook"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12c0 4.84 3.44 8.87 8 9.8V15H8v-3h2V9.5C10 7.57 11.57 6 13.5 6H16v3h-2c-.55 0-1 .45-1 1v2h3v3h-3v6.95c5.05-.5 9-4.76 9-9.95z"/></svg></a>
          <a href="#" aria-label="Instagram"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
          <a href="#" aria-label="YouTube"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg></a>
          <a href="#" aria-label="LinkedIn"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.063 2.063 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg></a>
        </div>
      </div>
      <div class="footer-col">
        <h4 data-i18n="footer_quick_links">Quick Links</h4>
        <ul><li><a href="#home">Home</a></li><li><a href="#about">About Us</a></li><li><a href="#haemophilia">About Haemophilia</a></li><li><a href="#vwd">About VWD</a></li><li><a href="#news-events">News &amp; Activities</a></li><li><a href="#contact">Contact Us</a></li></ul>
      </div>
      <div class="footer-col">
        <h4 data-i18n="footer_resources">Resources</h4>
        <ul><li><a href="#haemophilia" data-i18n="footer_patient_guides">Patient Guides</a></li><li><a href="#news" data-i18n="footer_news_events">News &amp; Events</a></li><li><a href="#programs-centres">Treatment Centres</a></li><li><a href="#" data-donate-trigger data-i18n="footer_donation">Donation</a></li></ul>
      </div>
      <div class="footer-col">
        <h4 data-i18n="footer_contact">Contact Us</h4>
        <div class="footer-contact">
          <div class="item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
            <span>#35, St. 121, Sangkat Tuel Tumpong 2, Khan Chamkarmon, Phnom Penh, Cambodia</span>
          </div>
          <div class="item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            <a href="tel:+85512345678">(+855) 12 345 678</a>
          </div>
          <div class="item">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <a href="mailto:info@chacambodia.org.kh">info@chacambodia.org.kh</a>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <span data-i18n="footer_copyright">© 2026 Cambodian Haemophilia Association. All rights reserved.</span>
      <div class="footer-bottom-links">
        <a href="privacy.html" data-i18n="footer_privacy">Privacy Policy</a>
        <a href="disclaimer.html" data-i18n="footer_disclaimer">Disclaimer</a>
        <a href="#" data-i18n="footer_social">Social Media Links</a>
        <a href="#contact">Contact Us</a>
      </div>
    </div>
  </div></footer>

  <!-- BACK TO TOP -->
  <button class="back-to-top" type="button" data-back-to-top aria-label="Back to top">
    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polyline points="18 15 12 9 6 15"/></svg>
  </button>

  <script defer>
/* ============================================
   CHA Website — Interactivity
   Vanilla JS, no libraries
   ============================================ */

(function () {
  'use strict';

  // Handle custom radio buttons for donate modal payment methods
  function initDonateRadioButtons() {
    const donateModal = document.getElementById('donate-modal');
    if (!donateModal) return;

    const radioLabels = donateModal.querySelectorAll('.radio-pill');

    radioLabels.forEach((label) => {
      const radio = label.querySelector('input[type="radio"]');
      const radioIndicator = label.querySelector('span > span');

      // Initial state
      if (radio.checked) {
        label.style.borderColor = 'var(--c-red)';
        label.style.background = 'rgba(227,30,36,0.05)';
        if (radioIndicator) radioIndicator.style.display = 'flex';
      }

      label.addEventListener('click', (e) => {
        // Uncheck all others
        radioLabels.forEach((otherLabel) => {
          const otherRadio = otherLabel.querySelector('input[type="radio"]');
          const otherIndicator = otherLabel.querySelector('span > span');
          otherLabel.style.borderColor = 'var(--c-border)';
          otherLabel.style.background = 'transparent';
          if (otherIndicator) otherIndicator.style.display = 'none';
        });

        // Check this one
        radio.checked = true;
        label.style.borderColor = 'var(--c-red)';
        label.style.background = 'rgba(227,30,36,0.05)';
        if (radioIndicator) radioIndicator.style.display = 'flex';
      });
    });
  }

  // ---------- 1. Sticky header shadow on scroll ----------
  const header = document.querySelector('.site-header');
  if (header) {
    const onScroll = () => {
      if (window.scrollY > 8) header.classList.add('is-scrolled');
      else header.classList.remove('is-scrolled');
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  // ---------- 2. Mobile drawer ----------
  const toggle = document.querySelector('.nav-toggle');
  const drawer = document.querySelector('.mobile-drawer');
  const closeBtn = document.querySelector('.mobile-drawer .close');
  const backdrop = document.querySelector('.mobile-drawer .backdrop');

  function openDrawer() {
    if (!drawer) return;
    drawer.classList.add('is-open');
    document.body.style.overflow = 'hidden';
    const firstLink = drawer.querySelector('nav a');
    if (firstLink) firstLink.focus();
  }
  function closeDrawer() {
    if (!drawer) return;
    drawer.classList.remove('is-open');
    document.body.style.overflow = '';
  }

  if (toggle) toggle.addEventListener('click', openDrawer);
  if (closeBtn) closeBtn.addEventListener('click', closeDrawer);
  if (backdrop) backdrop.addEventListener('click', closeDrawer);

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && drawer && drawer.classList.contains('is-open')) {
      closeDrawer();
    }
  });

  // ---------- 3. Donation tabs (one-time / monthly) ----------
  const tabBtns = document.querySelectorAll('[data-tab-group]');
  tabBtns.forEach((btn) => {
    btn.addEventListener('click', () => {
      const target = btn.dataset.tabTarget;
      const group = btn.closest('[data-tabs]');
      const panelRoot = group || document;
      // Deactivate all buttons and panels within this tab group
      const scopeBtns = group ? group.querySelectorAll('[data-tab-group]') : document.querySelectorAll('[data-tab-group]');
      const scopePanels = group ? group.querySelectorAll('[data-tab-panel]') : document.querySelectorAll('[data-tab-panel]');
      scopeBtns.forEach((b) => b.classList.remove('is-active'));
      scopePanels.forEach((p) => p.classList.remove('is-active'));
      btn.classList.add('is-active');
      // Try to find panel within group first, then fallback to document
      let panel = group ? group.querySelector(`[data-tab-panel="${target}"]`) : null;
      if (!panel) panel = document.querySelector(`[data-tab-panel="${target}"]`);
      if (panel) panel.classList.add('is-active');
    });
  });

  // ---------- 4. News carousel ----------
  document.querySelectorAll('[data-carousel]').forEach((carousel) => {
    const track = carousel.querySelector('.carousel-track');
    const slides = carousel.querySelectorAll('.carousel-slide');
    const prev = carousel.querySelector('.carousel-prev');
    const next = carousel.querySelector('.carousel-next');
    const dotsWrap = carousel.querySelector('.carousel-dots');
    if (!track || slides.length === 0) return;

    let index = 0;
    let autoTimer;

    // Build dots
    if (dotsWrap) {
      slides.forEach((_, i) => {
        const dot = document.createElement('button');
        dot.className = 'carousel-dot' + (i === 0 ? ' is-active' : '');
        dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
        dot.addEventListener('click', () => goTo(i));
        dotsWrap.appendChild(dot);
      });
    }

    function goTo(i) {
      index = (i + slides.length) % slides.length;
      track.style.transform = `translateX(-${index * 100}%)`;
      if (dotsWrap) {
        dotsWrap.querySelectorAll('.carousel-dot').forEach((d, j) =>
          d.classList.toggle('is-active', j === index)
        );
      }
    }
    function startAuto() {
      stopAuto();
      autoTimer = setInterval(() => goTo(index + 1), 6000);
    }
    function stopAuto() {
      if (autoTimer) clearInterval(autoTimer);
    }

    if (prev) prev.addEventListener('click', () => { goTo(index - 1); startAuto(); });
    if (next) next.addEventListener('click', () => { goTo(index + 1); startAuto(); });

    carousel.addEventListener('mouseenter', stopAuto);
    carousel.addEventListener('mouseleave', startAuto);
    startAuto();

    // Touch swipe
    let startX = 0;
    track.addEventListener('touchstart', (e) => { startX = e.touches[0].clientX; stopAuto(); }, { passive: true });
    track.addEventListener('touchend', (e) => {
      const dx = e.changedTouches[0].clientX - startX;
      if (Math.abs(dx) > 50) goTo(index + (dx < 0 ? 1 : -1));
      startAuto();
    });
  });

  // ---------- 5. Donation amount chip ----------
  document.querySelectorAll('[data-amount]').forEach((chip) => {
    chip.addEventListener('click', () => {
      const group = chip.closest('[data-amount-group]') || document;
      group.querySelectorAll('[data-amount]').forEach((c) => c.classList.remove('is-active'));
      chip.classList.add('is-active');
      const val = chip.dataset.amount;
      const other = document.querySelector('[data-amount-other]');
      if (other && val === 'other') other.focus();
    });
  });

  // ---------- 6. Form mock submit ----------
  // Skip forms that have their own handler (registration, login, donate handled separately)
  document.querySelectorAll('[data-mock-form]').forEach((form) => {
    if (form.closest('#member-modal') || form.closest('#donate-modal')) return;
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      // Simple required validation
      let ok = true;
      form.querySelectorAll('[required]').forEach((field) => {
        if (!field.value || (field.type === 'checkbox' && !field.checked)) {
          ok = false;
          field.classList.add('is-invalid');
        } else {
          field.classList.remove('is-invalid');
        }
      });
      if (!ok) return;
      // Hide form, show success
      const success = form.parentElement.querySelector('[data-form-success]');
      if (success) {
        form.style.display = 'none';
        success.removeAttribute('hidden');
        success.scrollIntoView({ behavior: 'smooth', block: 'center' });
      } else {
        alert('Thank you! Your submission has been received.');
        form.reset();
      }
    });
  });

  // ---------- 7. Province → Map pin highlight ----------
  const provinceSelect = document.querySelector('[data-province-select]');
  const cambodiaMap = document.querySelector('[data-cambodia-map]');
  if (provinceSelect && cambodiaMap) {
    provinceSelect.addEventListener('change', () => {
      const v = provinceSelect.value;
      cambodiaMap.querySelectorAll('[data-province]').forEach((p) => {
        p.classList.toggle('is-highlighted', p.dataset.province === v);
      });
    });
  }

  // ---------- 8. Scroll reveal ----------
  if ('IntersectionObserver' in window) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12 }
    );
    document.querySelectorAll('[data-reveal]').forEach((el) => observer.observe(el));
  } else {
    document.querySelectorAll('[data-reveal]').forEach((el) => el.classList.add('is-visible'));
  }

  // ---------- 9. Active nav link based on scroll position (single-page) ----------
  const navLinks = document.querySelectorAll('.main-nav a, .mobile-drawer nav a');
  const sectionMap = new Map();
  navLinks.forEach((a) => {
    const href = a.getAttribute('href') || '';
    if (href.startsWith('#')) {
      const target = document.querySelector(href);
      if (target) sectionMap.set(href, a);
    }
  });

  if (sectionMap.size > 0 && 'IntersectionObserver' in window) {
    const setActive = (href) => {
      navLinks.forEach((a) => a.classList.remove('is-active'));
      sectionMap.forEach((link, h) => {
        if (h === href) link.classList.add('is-active');
      });
    };
    const navObserver = new IntersectionObserver(
      (entries) => {
        // Use the entry closest to the top of the viewport that is intersecting
        const visible = entries
          .filter((e) => e.isIntersecting)
          .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top);
        if (visible.length > 0) {
          const id = '#' + visible[0].target.id;
          if (sectionMap.has(id)) setActive(id);
        }
      },
      { rootMargin: '-30% 0px -55% 0px', threshold: 0 }
    );
    sectionMap.forEach((_, href) => {
      const el = document.querySelector(href);
      if (el) navObserver.observe(el);
    });
  }

  // ---------- 10. Close mobile drawer on link click ----------
  document.querySelectorAll('.mobile-drawer nav a').forEach((a) => {
    a.addEventListener('click', () => {
      // Delay so the anchor scroll fires before we close
      setTimeout(closeDrawer, 50);
    });
  });

  // ---------- 11. Back-to-top button ----------
  const topBtn = document.querySelector('[data-back-to-top]');
  if (topBtn) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 600) topBtn.classList.add('is-visible');
      else topBtn.classList.remove('is-visible');
    }, { passive: true });
    topBtn.addEventListener('click', () => {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    });
  }

  // ---------- 12. Donate form — redirect to PayPal or ABA ----------
  const donateForm = document.getElementById('donate-form-submit');
  if (donateForm) {
    donateForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // Get selected amount
      const activePanel = donateForm.querySelector('.tab-panel.is-active');
      const activeChip = activePanel ? activePanel.querySelector('.amount-chip.is-active') : null;
      const otherInput = activePanel ? activePanel.querySelector('[data-amount-other]') : null;
      let amount = activeChip ? activeChip.dataset.amount : '10';
      if (amount === 'other' && otherInput && otherInput.value) {
        amount = otherInput.value;
      }

      // Get selected payment method
      const payMethod = donateForm.querySelector('input[name="pay"]:checked');
      const method = payMethod ? payMethod.value : 'paypal';

      // Get donation type (one-time or monthly)
      const isMonthly = activePanel && activePanel.dataset.tabPanel === 'monthly';

      // Redirect URLs — replace these with your real PayPal/ABA links
      const paypalUrl = 'https://www.paypal.com/donate?business=YOUR_PAYPAL_ID';
      const abaUrl = 'https://www.ababank.com/your-payment-link';

      if (method === 'paypal') {
        window.open(paypalUrl, '_blank');
      } else {
        window.open(abaUrl, '_blank');
      }
    });
  }

  // ---------- 13. Nav dropdowns (desktop hover + click) ----------
  document.querySelectorAll('[data-nav-drop]').forEach((drop) => {
    const trigger = drop.querySelector('.nav-drop-trigger');
    if (!trigger) return;
    let leaveTimer;
    // Desktop hover with short delay on leave
    drop.addEventListener('mouseenter', () => {
      clearTimeout(leaveTimer);
      drop.classList.add('is-open');
    });
    drop.addEventListener('mouseleave', () => {
      leaveTimer = setTimeout(() => drop.classList.remove('is-open'), 80);
    });
    // Mobile tap toggle
    trigger.addEventListener('click', (e) => {
      e.stopPropagation();
      const wasOpen = drop.classList.contains('is-open');
      document.querySelectorAll('[data-nav-drop].is-open').forEach((d) => d.classList.remove('is-open'));
      if (!wasOpen) drop.classList.add('is-open');
    });
    // Close on Escape
    trigger.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') drop.classList.remove('is-open');
    });
  });
  // Click outside closes dropdowns
  document.addEventListener('click', () => {
    document.querySelectorAll('[data-nav-drop].is-open').forEach((d) => d.classList.remove('is-open'));
  });

  // ---------- 14. Mobile drawer sub-group toggles ----------
  document.querySelectorAll('.drawer-sub-trigger').forEach((btn) => {
    btn.addEventListener('click', () => {
      const group = btn.parentElement;
      group.classList.toggle('is-open');
      btn.setAttribute('aria-expanded', group.classList.contains('is-open'));
    });
  });

  // ---------- 15. Donate modal ----------
  const donateModal = document.getElementById('donate-modal');
  const donateTriggers = document.querySelectorAll('[data-donate-trigger]');
  const donateClosers = document.querySelectorAll('[data-donate-close]');

  const openModal = (e) => { if (e) e.preventDefault(); donateModal.classList.add('is-open'); donateModal.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden'; setTimeout(initDonateRadioButtons, 50); };
  const closeModal = () => { donateModal.classList.remove('is-open'); donateModal.setAttribute('aria-hidden', 'true'); document.body.style.overflow = ''; };

  donateTriggers.forEach((t) => t.addEventListener('click', openModal));
  donateClosers.forEach((c) => c.addEventListener('click', closeModal));
  donateModal.addEventListener('click', (e) => { if (e.target === donateModal) closeModal(); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && donateModal.classList.contains('is-open')) closeModal(); });

  // Modal donate form submit
  const modalForm = document.getElementById('donate-modal-form');
  if (modalForm) {
    modalForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const activePanel = modalForm.querySelector('.tab-panel.is-active');
      const activeChip = activePanel ? activePanel.querySelector('.amount-chip.is-active') : null;
      const otherInput = activePanel ? activePanel.querySelector('[data-amount-other]') : null;
      let amount = activeChip ? activeChip.dataset.amount : '10';
      if (amount === 'other' && otherInput && otherInput.value) amount = otherInput.value;
      const payMethod = modalForm.querySelector('input[name="modal-pay"]:checked');
      const method = payMethod ? payMethod.value : 'paypal';
      const paypalUrl = 'https://www.paypal.com/donate?business=YOUR_PAYPAL_ID';
      const abaUrl = 'https://www.ababank.com/your-payment-link';
      if (method === 'paypal') window.open(paypalUrl, '_blank');
      else window.open(abaUrl, '_blank');
    });
  }

  // ---------- 16. Member modal ----------
  const memberModal = document.getElementById('member-modal');
  const memberTriggers = document.querySelectorAll('[data-member-trigger]');
  const memberClosers = document.querySelectorAll('[data-member-close]');

  const openMember = (e) => { if (e) e.preventDefault(); memberModal.classList.add('is-open'); memberModal.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden'; };
  let closeMember = () => { memberModal.classList.remove('is-open'); memberModal.setAttribute('aria-hidden', 'true'); document.body.style.overflow = ''; };

  memberTriggers.forEach((t) => t.addEventListener('click', openMember));
  memberClosers.forEach((c) => c.addEventListener('click', closeMember));
  memberModal.addEventListener('click', (e) => { if (e.target === memberModal) closeMember(); });
  document.addEventListener('keydown', (e) => { if (e.key === 'Escape' && memberModal.classList.contains('is-open')) closeMember(); });

  // Toggle between login and register panels
  const loginPanel = document.getElementById('member-login-panel');
  const registerPanel = document.getElementById('member-register-panel');

  // Register-specific trigger (hero button): open modal and show register panel
  const registerTriggers = document.querySelectorAll('[data-member-register-trigger]');
  registerTriggers.forEach((t) => t.addEventListener('click', (e) => {
    e.preventDefault();
    memberModal.classList.add('is-open'); memberModal.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden';
    if (loginPanel) loginPanel.style.display = 'none';
    if (registerPanel) registerPanel.style.display = 'block';
    if (acctPanel) acctPanel.style.display = 'none';
    if (modalTitle) modalTitle.textContent = 'Create Account';
  }));

  const registerLink = memberModal.querySelector('[data-member-register]');
  const backLoginLink = memberModal.querySelector('[data-member-back-login]');
  if (registerLink) registerLink.addEventListener('click', (e) => { e.preventDefault(); loginPanel.style.display = 'none'; registerPanel.style.display = 'block'; if (acctPanel) acctPanel.style.display = 'none'; if (modalTitle) modalTitle.textContent = 'Create Account'; });
  if (backLoginLink) backLoginLink.addEventListener('click', (e) => { e.preventDefault(); registerPanel.style.display = 'none'; loginPanel.style.display = 'block'; if (acctPanel) acctPanel.style.display = 'none'; if (modalTitle) modalTitle.textContent = 'Member Login'; });
  const acctPanel = document.getElementById('member-account-panel');
  // Reset to login on close
  const origCloseMember = closeMember;
  closeMember = () => { origCloseMember(); if (loginPanel) loginPanel.style.display = 'block'; if (registerPanel) registerPanel.style.display = 'none'; if (acctPanel) acctPanel.style.display = 'none'; if (modalTitle) modalTitle.textContent = 'Member Login'; };

  // ---- localStorage auth: registration ----
  const regForm = registerPanel.querySelector('form[data-mock-form]');
  if (regForm) regForm.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    const name = document.getElementById('mregname').value.trim();
    const email = document.getElementById('mregemail').value.trim();
    const pass = document.getElementById('mregpass').value;
    const province = document.getElementById('mregprov').value;
    const role = document.getElementById('mregrole').value;
    const agreed = document.getElementById('mregterms').checked;
    if (!name || !email || !pass) { alert('Please fill in all required fields.'); return; }
    if (!agreed) { alert('Please agree to the Terms & Conditions.'); return; }
    const users = JSON.parse(localStorage.getItem('cha_users') || '[]');
    if (users.find(u => u.email === email)) { alert('An account with this email already exists. Please sign in.'); return; }
    const memberId = 'CHA-' + new Date().getFullYear() + '-' + String(users.length + 1).padStart(4, '0');
    const user = { name, email, pass, province, role, memberId, memberSince: new Date().toLocaleDateString('en-US', { month: 'long', year: 'numeric' }), bloodType: '', condition: '', dob: '', emergencyContact: '', emergencyPhone: '', treatmentCentre: '', treatmentPhone: '' };
    users.push(user);
    localStorage.setItem('cha_users', JSON.stringify(users));
    localStorage.setItem('cha_current_user', JSON.stringify(user));
    closeMember();
    updateMemberButton(user);
    alert('Account created! Welcome, ' + name + '.');
  });

  // ---- localStorage auth: login ----
  const loginForm = loginPanel.querySelector('form[data-mock-form]');
  if (loginForm) loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    e.stopPropagation();
    const email = document.getElementById('memail').value.trim();
    const pass = document.getElementById('mpass').value;
    if (!email || !pass) { alert('Please enter your email and password.'); return; }
    const users = JSON.parse(localStorage.getItem('cha_users') || '[]');
    const user = users.find(u => u.email === email && u.pass === pass);
    if (!user) { alert('Invalid email or password. Please try again.'); return; }
    localStorage.setItem('cha_current_user', JSON.stringify(user));
    closeMember();
    updateMemberButton(user);
    alert('Welcome back, ' + user.name + '!');
  });

  // ---- localStorage auth: check session on load ----
  function updateMemberButton(user) {
    const triggers = document.querySelectorAll('[data-member-trigger]');
    triggers.forEach(t => { t.textContent = user ? 'My Account' : 'Become a Member'; });
  }
  function showAccountPanel(user) {
    if (!user || !acctPanel) return;
    document.getElementById('acct-name').textContent = user.name;
    document.getElementById('acct-name-display').textContent = user.name;
    document.getElementById('acct-email').textContent = user.email;
    document.getElementById('acct-role').textContent = user.role || '—';
    document.getElementById('acct-province').textContent = user.province || '—';
    document.getElementById('acct-id').textContent = user.memberId || '—';
    document.getElementById('acct-since').textContent = user.memberSince || '—';
    const avatar = document.getElementById('acct-avatar');
    if (avatar) avatar.textContent = (user.name || '?').split(' ').map(w => w[0]).join('').substring(0, 2).toUpperCase();
    if (loginPanel) loginPanel.style.display = 'none';
    if (registerPanel) registerPanel.style.display = 'none';
    acctPanel.style.display = 'block';
  }
  const currentUser = JSON.parse(localStorage.getItem('cha_current_user') || 'null');
  if (currentUser) updateMemberButton(currentUser);

  // ---- Open modal: if logged in, show account panel; else show login panel ----
  const modalTitle = document.getElementById('member-modal-title');
  memberTriggers.forEach((t) => {
    t.removeEventListener('click', openMember);
    t.addEventListener('click', (e) => {
      e.preventDefault();
      const u = JSON.parse(localStorage.getItem('cha_current_user') || 'null');
      memberModal.classList.add('is-open'); memberModal.setAttribute('aria-hidden', 'false'); document.body.style.overflow = 'hidden';
      if (u) { showAccountPanel(u); if (modalTitle) modalTitle.textContent = 'My Account'; } else { if (loginPanel) loginPanel.style.display = 'block'; if (registerPanel) registerPanel.style.display = 'none'; if (acctPanel) acctPanel.style.display = 'none'; if (modalTitle) modalTitle.textContent = 'Member Login'; }
    });
  });

  // Update header title when toggling between login and register
  const updateTitle = (text) => { if (modalTitle) modalTitle.textContent = text; };

  // Logout button
  const logoutBtn = document.getElementById('acct-logout');
  if (logoutBtn) logoutBtn.addEventListener('click', () => {
    localStorage.removeItem('cha_current_user');
    updateMemberButton(null);
    closeMember();
    alert('You have been signed out.');
  });
})();
</script>

<?php
get_footer();
?>
