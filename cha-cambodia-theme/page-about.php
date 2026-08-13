<?php get_header(); ?>

    <!-- ===== ABOUT US PAGE ===== -->
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

    <section class="section section-soft src-section" id="about-src"><div class="container">
      <div class="src-header">
        <div>
          <span class="src-eyebrow"><span class="heart" aria-hidden="true"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></span><span data-i18n="src_eyebrow"><?php echo esc_html(cha_get_option('src_eyebrow', 'Serving Communities')); ?></span></span>
          <h2 class="src-title" data-i18n="src_heading"><?php echo esc_html(cha_get_option('src_heading', 'SRC')); ?></h2>
          <p class="src-sub" data-i18n="src_sub"><?php echo esc_html(cha_get_option('src_sub', "CHA's commitment to community outreach, volunteer engagement, and public awareness across Cambodia.")); ?></p>
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
              <span class="src-photo-stat-num">25</span>
              <span class="src-photo-stat-lbl" data-i18n="src_stat_label_1"><?php echo esc_html(cha_get_option('src_stat_label_1', 'Provinces')); ?></span>
            </div>
          </div>
          <div class="src-stamp" aria-hidden="true"></div>
          <div class="src-body">
            <span class="src-kicker" data-i18n="src_kicker_reach"><?php echo esc_html(cha_get_option('src_kicker_reach', 'Reach')); ?></span>
            <h3 data-i18n="src_card_1_title"><?php echo esc_html(cha_get_option('src_card_1_title', 'Community Outreach')); ?></h3>
            <p data-i18n="src_card_1_desc"><?php echo esc_html(cha_get_option('src_card_1_desc', 'Awareness campaigns, Khmer-language education, and partnerships with local health centres that reach patients where they live.')); ?></p>
            <div class="src-foot">
              <a class="src-link" href="<?php echo home_url('/#contact'); ?>" data-i18n="src_link_1"><?php echo esc_html(cha_get_option('src_link_1', 'Learn more')); ?> <span class="arrow">→</span></a>
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
              <span class="src-photo-stat-lbl" data-i18n="src_stat_label_2"><?php echo esc_html(cha_get_option('src_stat_label_2', 'Volunteers')); ?></span>
            </div>
          </div>
          <div class="src-stamp" aria-hidden="true"></div>
          <div class="src-body">
            <span class="src-kicker" data-i18n="src_kicker_people"><?php echo esc_html(cha_get_option('src_kicker_people', 'People')); ?></span>
            <h3 data-i18n="src_card_2_title"><?php echo esc_html(cha_get_option('src_card_2_title', 'Volunteer Program')); ?></h3>
            <p data-i18n="src_card_2_desc"><?php echo esc_html(cha_get_option('src_card_2_desc', 'Patients, families, and healthcare students who lead events, mentor newly diagnosed peers, and run community-based activities year-round.')); ?></p>
            <div class="src-foot">
              <a class="src-link" href="<?php echo home_url('/#contact'); ?>" data-i18n="src_link_2"><?php echo esc_html(cha_get_option('src_link_2', 'Join us')); ?> <span class="arrow">→</span></a>
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
              <span class="src-photo-stat-lbl" data-i18n="src_stat_label_3"><?php echo esc_html(cha_get_option('src_stat_label_3', 'Chapter')); ?></span>
            </div>
          </div>
          <div class="src-stamp" aria-hidden="true"></div>
          <div class="src-body">
            <span class="src-kicker" data-i18n="src_kicker_region"><?php echo esc_html(cha_get_option('src_kicker_region', 'Region')); ?></span>
            <h3 data-i18n="src_card_3_title"><?php echo esc_html(cha_get_option('src_card_3_title', 'Siem Reap Chapter')); ?></h3>
            <p data-i18n="src_card_3_desc"><?php echo esc_html(cha_get_option('src_card_3_desc', 'Our northwest hub coordinates local outreach, patient support, and partnerships with Siem Reap Provincial Hospital.')); ?></p>
            <div class="src-foot">
              <a class="src-link" href="<?php echo home_url('/#contact'); ?>" data-i18n="src_link_3"><?php echo esc_html(cha_get_option('src_link_3', 'Visit chapter')); ?> <span class="arrow">→</span></a>
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
          <h3 data-i18n="src_cta_heading"><?php echo esc_html(cha_get_option('src_cta_heading', 'Want to get involved?')); ?></h3>
          <p data-i18n="src_cta_sub"><?php echo esc_html(cha_get_option('src_cta_sub', 'Join our volunteer network and make a difference in the bleeding disorders community across Cambodia.')); ?></p>
        </div>
        <div class="src-cta-actions">
          <a class="btn btn-light" href="<?php echo home_url('/#contact'); ?>" data-i18n="src_cta_btn_1"><?php echo esc_html(cha_get_option('src_cta_btn_1', 'Get Involved')); ?> <span class="arrow">→</span></a>
          <a class="btn btn-ghost" href="<?php echo home_url('/haemophilia'); ?>" data-i18n="src_cta_btn_2"><?php echo esc_html(cha_get_option('src_cta_btn_2', 'Learn More')); ?> <span class="arrow">→</span></a>
        </div>
      </div>
    </div></section>

    <section class="section" id="about-history"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="history_heading"><?php echo esc_html(cha_get_option('history_heading', 'Our History')); ?></h2></div>
      <div class="history-intro" data-reveal>
        <p data-i18n="history_intro"><?php echo esc_html(cha_get_option('history_intro', 'CHA was founded in 2011 by patients and families who came together with a shared vision: to ensure no one in Cambodia faces a bleeding disorder alone. What began as a small support group has grown into a national patient-led organization.')); ?></p>
      </div>
      <div class="timeline">
        <div class="timeline-item" data-reveal><div class="tl-dot"></div><div class="tl-year">2011</div><div class="tl-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="4 2 20 7 4 12"/><line x1="4" y1="22" x2="4" y2="2"/></svg></div><div class="tl-card"><h3 data-i18n="history_established"><?php echo esc_html(cha_get_option('history_1_title', 'CHA Established')); ?></h3><p data-i18n="history_established_desc"><?php echo esc_html(cha_get_option('history_1_desc', 'CHA was established by patients and families.')); ?></p></div></div>
        <div class="timeline-item" data-reveal><div class="tl-dot"></div><div class="tl-year">2014</div><div class="tl-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg></div><div class="tl-card"><h3 data-i18n="history_wfh_member"><?php echo esc_html(cha_get_option('history_2_title', 'WFH Member')); ?></h3><p data-i18n="history_wfh_member_desc"><?php echo esc_html(cha_get_option('history_2_desc', 'Became a member of the World Federation of Hemophilia.')); ?></p></div></div>
        <div class="timeline-item" data-reveal><div class="tl-dot"></div><div class="tl-year">2017</div><div class="tl-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div><div class="tl-card"><h3 data-i18n="history_hospital"><?php echo esc_html(cha_get_option('history_3_title', 'Hospital Partnerships')); ?></h3><p data-i18n="history_hospital_desc"><?php echo esc_html(cha_get_option('history_3_desc', 'Partnered with hospitals to improve treatment access.')); ?></p></div></div>
        <div class="timeline-item" data-reveal><div class="tl-dot"></div><div class="tl-year">2023</div><div class="tl-icon"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 2v7"/><path d="M12 15v7"/><path d="M2 12h7"/><path d="M15 12h7"/></svg></div><div class="tl-card"><h3 data-i18n="history_national"><?php echo esc_html(cha_get_option('history_4_title', 'National Reach')); ?></h3><p data-i18n="history_national_desc"><?php echo esc_html(cha_get_option('history_4_desc', 'Expanded education and outreach across provinces.')); ?></p></div></div>
      </div>
      <div class="presidents-block" data-reveal>
        <h3 data-i18n="history_presidents"><?php echo esc_html(cha_get_option('president_heading', 'Past Presidents')); ?></h3>
        <div class="presidents-grid">
          <div class="president-card"><div class="president-avatar"><img src="<?php echo get_template_directory_uri(); ?>/president-1.jpg" alt="Past President 1" loading="lazy"></div><h4>Past President 1</h4><div class="president-accent"></div><p class="president-role" data-i18n="history_president"><?php echo esc_html(cha_get_option('president_1_role', 'President')); ?></p><span class="president-term">2011 – 2015</span></div>
          <div class="president-card"><div class="president-avatar"><img src="<?php echo get_template_directory_uri(); ?>/president-2.jpg" alt="Past President 2" loading="lazy"></div><h4>Past President 2</h4><div class="president-accent"></div><p class="president-role" data-i18n="history_president"><?php echo esc_html(cha_get_option('president_2_role', 'President')); ?></p><span class="president-term">2015 – 2019</span></div>
          <div class="president-card"><div class="president-avatar"><img src="<?php echo get_template_directory_uri(); ?>/president-3.jpg" alt="Past President 3" loading="lazy"></div><h4>Past President 3</h4><div class="president-accent"></div><p class="president-role" data-i18n="history_president"><?php echo esc_html(cha_get_option('president_3_role', 'President')); ?></p><span class="president-term">2019 – 2023</span></div>
        </div>
      </div>
    </div></section>

    <section class="section section-soft" id="about-leadership"><div class="container">
      <div class="section-heading flex-between" data-reveal><div><h2 data-i18n="leadership_heading"><?php echo esc_html(cha_get_option('leadership_heading', 'Leadership Team')); ?></h2><p data-i18n="leadership_sub"><?php echo esc_html(cha_get_option('leadership_sub', "Dedicated individuals leading CHA's mission across Cambodia.")); ?></p></div><a class="btn btn-secondary btn-sm" href="javascript:void(0)" data-coming-soon data-i18n="leadership_meet"><?php echo esc_html(cha_get_option('leadership_btn', 'Meet the Full Team')); ?> <span class="arrow">→</span></a></div>
      <div class="leadership-grid">
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=400&h=500&q=80" alt="Chan Soveun Ly"></div><div class="leader-info"><h3>Chan Soveun Ly</h3><p class="role">President</p></div></div>
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=400&h=500&q=80" alt="Sok Sothea"></div><div class="leader-info"><h3>Sok Sothea</h3><p class="role">Vice President</p></div></div>
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?auto=format&fit=crop&w=400&h=500&q=80" alt="Bory Kao"></div><div class="leader-info"><h3>Bory Kao</h3><p class="role">Medical Advisor</p></div></div>
        <div class="leader-card" data-reveal><div class="leader-photo"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?auto=format&fit=crop&w=400&h=500&q=80" alt="Yordak Kim"></div><div class="leader-info"><h3>Yordak Kim</h3><p class="role">Executive Director</p></div></div>
      </div>
      <div class="groups-grid">
        <div class="group-card" data-reveal>
          <div class="group-icon" style="background:var(--c-blue-100);color:var(--c-blue)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div>
          <h3 data-i18n="leadership_youth_title"><?php echo esc_html(cha_get_option('youth_title', 'Youth Group')); ?></h3>
          <p data-i18n="leadership_youth_desc"><?php echo esc_html(cha_get_option('youth_desc', 'A network of young patients and supporters driving awareness campaigns, peer mentoring, and youth-led advocacy across Cambodia.')); ?></p>
        </div>
        <div class="group-card" data-reveal>
          <div class="group-icon" style="background:#EFE6F4;color:var(--c-purple)"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg></div>
          <h3 data-i18n="leadership_women_title"><?php echo esc_html(cha_get_option('women_title', "Women's Group")); ?></h3>
          <p data-i18n="leadership_women_desc"><?php echo esc_html(cha_get_option('women_desc', "Empowering women affected by bleeding disorders through support circles, education on VWD and carrier issues, and community-building events.")); ?></p>
        </div>
      </div>
    </div></section>

    <section class="section" id="about-wfh" style="background:linear-gradient(180deg, #FAFBFE 0%, #F4F6FC 100%)"><div class="container">
      <div class="section-heading" data-reveal><h2 data-i18n="wfh_heading"><?php echo esc_html(cha_get_option('wfh_heading', 'Our Work with WFH & HFA')); ?></h2><p data-i18n="wfh_sub"><?php echo esc_html(cha_get_option('wfh_sub', 'CHA proudly partners with leading global organizations to strengthen haemophilia care across Cambodia.')); ?></p></div>
      <div class="wfh-feature-grid">
        <div class="wfh-feature" data-reveal>
          <div class="wfh-feature-mark">
            <svg viewBox="0 0 56 56" fill="none" aria-hidden="true"><circle cx="28" cy="28" r="26" fill="#E5E8F2" stroke="#0B1D6D" stroke-width="1.5"/><circle cx="28" cy="28" r="10" fill="none" stroke="#0B1D6D" stroke-width="1.5"/><path d="M28 6a15.3 15.3 0 0 1 6 14 15.3 15.3 0 0 1-6 14 15.3 15.3 0 0 1-6-14 15.3 15.3 0 0 1 6-14z" fill="none" stroke="#0B1D6D" stroke-width="1.5"/></svg>
          </div>
          <h3 data-i18n="wfh_wfh_name"><?php echo esc_html(cha_get_option('wfh_card_title', 'World Federation of Hemophilia')); ?></h3>
          <span class="wfh-tag" data-i18n="wfh_wfh_tag"><?php echo esc_html(cha_get_option('wfh_card_tag', 'Member Since 2014')); ?></span>
          <div class="wfh-stat"><span class="wfh-stat-num">140+</span><span class="wfh-stat-label" data-i18n="wfh_wfh_stat_label"><?php echo esc_html(cha_get_option('wfh_card_stat_lbl', 'Countries in Network')); ?></span></div>
          <p data-i18n="wfh_wfh_desc"><?php echo esc_html(cha_get_option('wfh_card_desc', 'Global member of the WFH network. Through this partnership, CHA accesses international treatment guidelines, training programs, and humanitarian aid that directly improve patient care.')); ?></p>
          <a class="wfh-link" href="javascript:void(0)" data-coming-soon data-i18n="wfh_wfh_link"><?php echo esc_html(cha_get_option('wfh_card_link', 'Visit WFH')); ?> <span class="arrow">→</span></a>
        </div>
        <div class="wfh-divider"><svg viewBox="0 0 24 24" fill="none" stroke="var(--c-border)" stroke-width="1.5" aria-hidden="true"><line x1="1" y1="12" x2="23" y2="12"/></svg></div>
        <div class="wfh-feature" data-reveal>
          <div class="wfh-feature-mark">
            <svg viewBox="0 0 56 56" fill="none" aria-hidden="true"><circle cx="28" cy="28" r="26" fill="#EFE6F4" stroke="#6A2C91" stroke-width="1.5"/><path d="M28 12c-6 0-10 4-10 10 0 8 10 20 10 20s10-12 10-20c0-6-4-10-10-10z" fill="none" stroke="#6A2C91" stroke-width="1.5"/><circle cx="28" cy="22" r="3" fill="#6A2C91"/></svg>
          </div>
          <h3 data-i18n="wfh_hfa_name"><?php echo esc_html(cha_get_option('hfa_card_title', 'Haemophilia Foundation Australia')); ?></h3>
          <span class="wfh-tag purple-tag" data-i18n="wfh_hfa_tag"><?php echo esc_html(cha_get_option('hfa_card_tag', 'Training Partner')); ?></span>
          <div class="wfh-stat"><span class="wfh-stat-num">15+</span><span class="wfh-stat-label" data-i18n="wfh_hfa_stat_label"><?php echo esc_html(cha_get_option('hfa_card_stat_lbl', 'Joint Programs')); ?></span></div>
          <p data-i18n="wfh_hfa_desc"><?php echo esc_html(cha_get_option('hfa_card_desc', 'HFA partners with CHA on capacity building, clinical training, and patient advocacy. Joint programs connect Cambodian clinicians with Australian expertise.')); ?></p>
          <a class="wfh-link" href="javascript:void(0)" data-coming-soon data-i18n="wfh_hfa_link"><?php echo esc_html(cha_get_option('hfa_card_link', 'Learn More')); ?> <span class="arrow">→</span></a>
        </div>
      </div>
    </div></section>

  </main>

  <?php get_footer(); ?>
