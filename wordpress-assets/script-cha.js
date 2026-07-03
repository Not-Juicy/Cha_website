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

/* ============================================
   i18n — Bilingual EN/KM Language Toggle
   ============================================ */
(function(){
  const i18n = {
    en: {
      /* Nav */
      lang_label: "EN",
      nav_home: "Home",
      nav_about_us: "About Us",
      nav_who_is_cha: "Who is CHA?",
      nav_leadership: "Leadership structure and Groups",
      nav_src: "SRC",
      nav_history: "Our History",
      nav_wfh: "Our work with WFH and HFA",
      nav_contact_us: "Contact Us",
      nav_about_haemophilia: "About Haemophilia",
      nav_about_vwd: "About VWD",
      nav_other_bleeding: "About other bleeding disorders",
      nav_treatment_centres: "Haemophilia Treatment Centres",
      nav_csr_program: "CSR Program",
      nav_fundraising: "Fundraising",
      nav_online_donation: "Online donation",
      nav_corporate_partners: "Corporate Partners",
      nav_news: "News",
      nav_latest_news: "Latest News",
      nav_upcoming_events: "Upcoming Events",
      nav_contact: "Contact",
      nav_become_member: "Become a Member",
      nav_donate: "Donate",
      nav_become_member_aria: "Member login",
      nav_donate_aria: "Open donation form",
      lang_switcher_aria: "Switch language",
      /* Hero */
      hero_title_1: "Together We Care.",
      hero_title_2: "Together We Change Lives.",
      hero_lead: "Supporting and empowering people with bleeding disorders across Cambodia.",
      hero_cta_support: "Get Support",
      /* Stats */
      stat_provinces: "Provinces Reached",
      stat_patients: "Patients Supported",
      stat_partners: "Healthcare Partners",
      /* How We Help */
      help_heading: "How We Help",
      help_sub: "Four core areas where CHA makes a difference for patients and families across Cambodia.",
      help_patient_support: "Patient Support",
      help_patient_support_desc: "Emotional support, guidance and community for patients and families.",
      help_treatment: "Treatment Centres",
      help_treatment_desc: "Find haemophilia treatment centres near you and get the care you need.",
      help_become_member: "Become a Member",
      help_become_member_desc: "Join our community and access exclusive resources and programs.",
      help_donate: "Donate",
      help_donate_desc: "Your support helps us provide treatment, education and hope.",
      help_learn_more: "Learn More",
      help_join_now: "Join Now",
      help_donate_now: "Donate Now",
      /* News */
      news_heading: "Latest News & Events",
      news_sub: "Updates from our community awareness, treatment guidelines and training programs.",
      news_view_all: "View All",
      news_read_more: "Read More",
      /* CTA Banner */
      cta_heading: "Help Change Lives",
      cta_sub: "Your donation helps us provide treatment, education and hope to people with bleeding disorders in Cambodia.",
      cta_donate: "Donate Now",
      /* About */
      about_divider: "About Us",
      about_heading: "Who is CHA?",
      about_lead: "The Cambodian Haemophilia Association is a patient-led organization dedicated to improving the quality of life for people living with bleeding disorders across Cambodia.",
      about_vision_label: "Our Vision",
      about_vision_text: "A Cambodia where every person with a bleeding disorder has access to diagnosis, treatment, and support.",
      about_mission_label: "Our Mission",
      about_mission_text: "To advocate for quality care, educate communities, support families, and empower caregivers.",
      /* SRC */
      src_eyebrow: "Serving Communities",
      src_heading: "SRC",
      src_sub: "CHA's commitment to community outreach, volunteer engagement, and public awareness across Cambodia.",
      src_kicker_reach: "Reach",
      src_kicker_people: "People",
      src_kicker_region: "Region",
      src_stat_1: "12+",
      src_stat_label_1: "Provinces",
      src_stat_2: "80+",
      src_stat_label_2: "Volunteers",
      src_stat_3: "1",
      src_stat_label_3: "Chapter",
      src_card_1_title: "Community Outreach",
      src_card_1_desc: "Awareness campaigns, Khmer-language education, and partnerships with local health centres that reach patients where they live.",
      src_card_2_title: "Volunteer Program",
      src_card_2_desc: "Patients, families, and healthcare students who lead events, mentor newly diagnosed peers, and run community-based activities year-round.",
      src_card_3_title: "Siem Reap Chapter",
      src_card_3_desc: "Our northwest hub coordinates local outreach, patient support, and partnerships with Siem Reap Provincial Hospital.",
      src_link_1: "Learn more",
      src_link_2: "Join us",
      src_link_3: "Visit chapter",
      src_cta_heading: "Want to get involved?",
      src_cta_sub: "Join our volunteer network and make a difference in the bleeding disorders community across Cambodia.",
      src_cta_btn_1: "Get Involved",
      src_cta_btn_2: "Learn More",
      /* History */
      history_heading: "Our History",
      history_view_timeline: "View Full Timeline",
      history_intro: "CHA was founded in 2011 by patients and families who came together with a shared vision: to ensure no one in Cambodia faces a bleeding disorder alone. What began as a small support group has grown into a national patient-led organization.",
      history_presidents: "Past Presidents",
      history_established: "CHA Established",
      history_established_desc: "CHA was established by patients and families.",
      history_wfh_member: "WFH Member",
      history_wfh_member_desc: "Became a member of the World Federation of Hemophilia.",
      history_hospital: "Hospital Partnerships",
      history_hospital_desc: "Partnered with hospitals to improve treatment access.",
      history_national: "National Reach",
      history_national_desc: "Expanded education and outreach across provinces.",
      history_president: "President",
      /* Leadership */
      leadership_heading: "Leadership Team",
      leadership_sub: "Dedicated individuals leading CHA's mission across Cambodia.",
      leadership_meet: "Meet the Full Team",
      leadership_youth_title: "Youth Group",
      leadership_youth_desc: "A network of young patients and supporters driving awareness campaigns, peer mentoring, and youth-led advocacy across Cambodia.",
      leadership_women_title: "Women's Group",
      leadership_women_desc: "Empowering women affected by bleeding disorders through support circles, education on VWD and carrier issues, and community-building events.",
      /* WFH */
      wfh_heading: "Our Work with WFH & HFA",
      wfh_sub: "CHA proudly partners with leading global organizations to strengthen haemophilia care across Cambodia.",
      wfh_wfh_name: "World Federation of Hemophilia",
      wfh_wfh_tag: "Member Since 2014",
      wfh_wfh_stat_label: "Countries in Network",
      wfh_wfh_desc: "Global member of the WFH network. Through this partnership, CHA accesses international treatment guidelines, training programs, and humanitarian aid that directly improve patient care.",
      wfh_wfh_link: "Visit WFH",
      wfh_hfa_name: "Haemophilia Foundation Australia",
      wfh_hfa_tag: "Training Partner",
      wfh_hfa_stat_label: "Joint Programs",
      wfh_hfa_desc: "HFA partners with CHA on capacity building, clinical training, and patient advocacy. Joint programs connect Cambodian clinicians with Australian expertise.",
      wfh_hfa_link: "Learn More",
      /* Haemophilia */
      haem_divider: "About Haemophilia",
      haem_heading: "What is Haemophilia?",
      haem_contact: "Contact a Specialist",
      haem_para_1: "Haemophilia is a rare genetic bleeding disorder that affects a person's ability to stop bleed. People with haemophilia can bleed longer than others after an injury or even without a known cause.",
      haem_para_2: "While there is no cure, modern treatments allow people with haemophilia to live full, active and healthy lives. Early diagnosis, proper treatment and ongoing support are key to preventing complications and joint damage.",
      /* Types */
      types_heading: "Types of Haemophilia",
      types_sub: "The two main types of haemophilia — both require proper diagnosis and lifelong management.",
      types_a_title: "Haemophilia A",
      types_a_desc: "Caused by a deficiency of factor VIII. The most common type.",
      types_b_title: "Haemophilia B",
      types_b_desc: "Caused by a deficiency of factor IX. Sometimes called Christmas disease.",
      /* Symptoms */
      symptoms_heading: "Common Symptoms",
      symptoms_sub: "Recognizing the signs of a bleeding disorder is the first step toward diagnosis and proper care.",
      symptom_bruising: "Easy Bruising",
      symptom_bruising_desc: "Unexplained bruises from minor bumps or pressure.",
      symptom_nosebleeds: "Frequent Nosebleeds",
      symptom_nosebleeds_desc: "Recurring nosebleeds that are hard to stop.",
      symptom_gums: "Bleeding Gums",
      symptom_gums_desc: "Gums that bleed during brushing or eating.",
      symptom_joint: "Joint Pain or Swelling",
      symptom_joint_desc: "Painful, swollen joints after minor injury or activity.",
      symptom_prolonged: "Prolonged Bleeding",
      symptom_prolonged_desc: "Bleeding that lasts longer than expected after cuts.",
      symptom_cta: "Experiencing any of these symptoms? Early diagnosis can make a life-changing difference.",
      symptom_find_centre: "Find a Treatment Centre",
      symptom_contact_specialist: "Contact a Specialist",
      /* VWD */
      vwd_heading: "Von Willebrand Disease (VWD)",
      vwd_para_1: "Von Willebrand Disease is the most common inherited bleeding disorder, affecting both males and females equally. It is caused by a deficiency or dysfunction of von Willebrand factor (VWF), a protein that helps blood clot.",
      vwd_para_2: "There are three main types of VWD — Type 1 (mild), Type 2 (moderate), and Type 3 (severe). Each varies in how much VWF is present and how well it functions. Symptoms include easy bruising, frequent nosebleeds, heavy menstrual bleeding, and prolonged bleeding after surgery or injury.",
      vwd_find: "Find Treatment",
      /* Other */
      other_heading: "Other Bleeding Disorders",
      other_rare_title: "Rare Factor Deficiencies",
      other_rare_desc: "Deficiencies in factors I, II, V, VII, X, XI, XII and XIII. Each requires specific diagnosis and treatment.",
      other_platelet_title: "Platelet Function Disorders",
      other_platelet_desc: "Conditions where platelets don't work properly, leading to bleeding despite normal platelet counts.",
      other_more: "For more information on any bleeding disorder, contact our team or visit a treatment centre.",
      /* Treatment */
      treatment_heading: "Treatment Centres",
      treatment_sub: "Find haemophilia treatment centres across Cambodia — search by province.",
      treatment_select: "Select Province",
      treatment_view_map: "View on Map",
      treatment_emergency: "Emergency Support",
      treatment_emergency_desc: "If you have a bleeding emergency, contact your nearest treatment centre or call our support line.",
      /* CSR */
      csr_heading: "CSR Program",
      csr_sub: "Fundraising, donations, and corporate partnerships that power our mission.",
      csr_fundraising: "Fundraising",
      csr_fundraising_desc: "Raising funds through community drives, events, and partner campaigns that keep our programs running.",
      csr_view_campaigns: "View campaigns",
      csr_donate_online: "Online donation",
      csr_donate_online_desc: "Donate securely via PayPal or ABA — every contribution changes lives across Cambodia.",
      csr_donate_now: "Donate now",
      csr_partners_title: "Corporate Partners",
      csr_partners_desc: "Trusted organisations that support our mission and amplify our reach nationwide.",
      csr_become_partner: "Become a partner",
      /* Impact */
      impact_heading: "Your Impact",
      impact_treatment: "Provide treatment access for patients",
      impact_education: "Support education and awareness",
      impact_healthcare: "Strengthen healthcare capacity",
      impact_families: "Empower families and communities",
      /* Membership */
      membership_heading: "Membership Benefits",
      membership_cta: "Ready to join our community?",
      membership_cta_sub: "Join CHA and get access to support, resources and a community that understands.",
      membership_register: "Register Now",
      membership_signin: "Already a member? Sign In",
      membership_benefit_1_title: "Community & Support",
      membership_benefit_1_desc: "Connect with patients, families, and caregivers across Cambodia.",
      membership_benefit_2_title: "Access to Resources",
      membership_benefit_2_desc: "Exclusive guides, educational materials, and treatment information.",
      membership_benefit_3_title: "Events & Workshops",
      membership_benefit_3_desc: "Attend training sessions, awareness events, and webinars.",
      membership_benefit_4_title: "Advocacy & Awareness",
      membership_benefit_4_desc: "Help raise awareness and advocate for better care nationwide.",
      membership_benefit_5_title: "Updates & Newsletters",
      membership_benefit_5_desc: "Stay informed with the latest news and CHA announcements.",
      /* Donate */
      donate_heading: "Make a Donation",
      /* Contact */
      contact_divider: "Contact Us",
      contact_heading: "Contact Us",
      contact_sub: "Have questions or need support? We're here to help.",
      contact_subtitle: "We're here to help patients, families, and partners across Cambodia.",
      contact_day_monfri: "Monday – Friday",
      contact_day_sat: "Saturday",
      contact_day_sun: "Sunday",
      contact_closed: "Closed",
      contact_info: "Get In Touch",
      contact_address: "Address",
      contact_phone: "Phone",
      contact_email: "Email",
      contact_hours: "Office Hours",
      contact_message: "Send us a Message",
      contact_message_sub: "Fill out the form below and we'll get back to you.",
      contact_name: "Full Name",
      contact_email_label: "Email",
      contact_subject: "Subject",
      contact_message_label: "Message",
      contact_name_ph: "Enter your full name",
      contact_email_ph: "Enter your email",
      contact_subject_ph: "What's this about?",
      contact_message_ph: "How can we help?",
      contact_send: "Send Message",
      /* Footer */
      footer_tagline: "Supporting people with bleeding disorders across Cambodia.",
      footer_quick_links: "Quick Links",
      footer_resources: "Resources",
      footer_contact: "Contact Us",
      footer_patient_guides: "Patient Guides",
      footer_news_events: "News & Events",
      footer_donation: "Donation",
      footer_copyright: "© 2026 Cambodian Haemophilia Association. All rights reserved.",
      footer_privacy: "Privacy Policy",
      footer_disclaimer: "Disclaimer",
      footer_social: "Social Media Links",
      footer_find_us: "Find Us",
    },
    km: {
      /* Nav */
      lang_label: "ខ្មែរ",
      nav_home: "ទំព័រដើម",
      nav_about_us: "អំពីយើង",
      nav_who_is_cha: "CHA ជាអ្វី?",
      nav_leadership: "រចនាសម្ព័ន្ធដឹកនាំ និងក្រុម",
      nav_src: "SRC",
      nav_history: "ប្រវត្តិសាស្រ្ត",
      nav_wfh: "ការងាររបស់យើងជាមួយ WFH និង HFA",
      nav_contact_us: "ទំនាក់ទំនង",
      nav_about_haemophilia: "អំពីជំងឺហ្វូនឌីក",
      nav_about_vwd: "អំពីជំងឺ VWD",
      nav_other_bleeding: "អំពីជំងឺហូរឈាមផ្សេងទៀត",
      nav_treatment_centres: "មជ្ឈមណ្ឌលព្យាបាលជំងឺហ្វូនឌីក",
      nav_csr_program: "កម្មវិធី CSR",
      nav_fundraising: "ប្រមូលថវិកា",
      nav_online_donation: "បរិច្ចាគតាមអ៊ីនធឺណិត",
      nav_corporate_partners: "ដៃគូអាជីវកម្ម",
      nav_news: "ព័ត៌មាន",
      nav_latest_news: "ព័ត៌មានថ្មីៗ",
      nav_upcoming_events: "ព្រឹត្តិការណ៍ខាងមុខ",
      nav_contact: "ទំនាក់ទំនង",
      nav_become_member: "ក្លាយជាសមាជិក",
      nav_donate: "បរិច្ចាគ",
      nav_become_member_aria: "ចូលជាសមាជិក",
      nav_donate_aria: "បើកទម្រង់បរិច្ចាគ",
      lang_switcher_aria: "ប្តូរភាសា",
      /* Hero */
      hero_title_1: "យើងថែទាំគ្នា",
      hero_title_2: "យើងផ្លាស់ប្តូរជីវិត",
      hero_lead: "គាំទ្រ និងផ្តល់សមត្ថភាពដល់អ្នកជំងឺហូរឈាមនៅកម្ពុជា។",
      hero_cta_support: "ទទួលជំនួយ",
      /* Stats */
      stat_provinces: "ខេត្តដែលបានគ្រប់ដណ្តប់",
      stat_patients: "អ្នកជំងឺដែលបានជួយ",
      stat_partners: "ដៃគូថែទាំសុខភាព",
      /* How We Help */
      help_heading: "យើងជួយដូចម្តេច",
      help_sub: "វិស័យសំខាន់ៗចំនួនបួនដែល CHA ធ្វើឱ្យមានការផ្លាស់ប្តូរដល់អ្នកជំងឺ និងគ្រួសារនៅកម្ពុជា។",
      help_patient_support: "ជំនួយអ្នកជំងឺ",
      help_patient_support_desc: "ជំនួយផ្លូវចិត្ត ការណែនាំ និងសហគមន៍សម្រាប់អ្នកជំងឺ និងគ្រួសារ។",
      help_treatment: "មជ្ឈមណ្ឌលព្យាបាល",
      help_treatment_desc: "ស្វែងរកមជ្ឈមណ្ឌលព្យាបាលជំងឺហ្វូនឌីកជិតអ្នក និងទទួលបានការថែទាំដែលអ្នកត្រូវការ។",
      help_become_member: "ក្លាយជាសមាជិក",
      help_become_member_desc: "ចូលរួមជាមួយសហគមន៍របស់យើង និងទទួលបានធនធាន និងកម្មវិធីផ្តាច់មុខ។",
      help_donate: "បរិច្ចាគ",
      help_donate_desc: "ការគាំទ្ររបស់អ្នកជួយយើងផ្តល់ការព្យាបាល ការអប់រំ និងសង្ឃឹម។",
      help_learn_more: "ស្វែងយល់បន្ថែម",
      help_join_now: "ចូលរួមឥឡូវ",
      help_donate_now: "បរិច្ចាគឥឡូវ",
      /* News */
      news_heading: "ព័ត៌មាន និងព្រឹត្តិការណ៍ថ្មីៗ",
      news_sub: "ព័ត៌មានថ្មីៗពីសកម្មភាពសហគមន៍ គោលនាំព្យាបាល និងកម្មវិធីបណ្តុះបណ្តាល។",
      news_view_all: "មើលទាំងអស់",
      news_read_more: "អានបន្ថែម",
      /* CTA Banner */
      cta_heading: "ជួយផ្លាស់ប្តូរជីវិត",
      cta_sub: "បរិច្ចាគរបស់អ្នកជួយយើងផ្តល់ការព្យាបាល ការអប់រំ និងសង្ឃឹមដល់អ្នកជំងឺហូរឈាមនៅកម្ពុជា។",
      cta_donate: "បរិច្ចាគឥឡូវ",
      /* About */
      about_divider: "អំពីយើង",
      about_heading: "CHA ជាអ្វី?",
      about_lead: "សមាគមហ្វូនឌីកកម្ពុជា (CHA) គឺជាអង្គការដឹកនាំដោយអ្នកជំងឺ ដែលឧទ្ទិសដល់ការកែលម្អគុណភាពជីវិតរបស់អ្នកដែលរស់នៅជាមួយជំងឺហូរឈាមនៅទូទាំងប្រទេសកម្ពុជា។",
      about_vision_label: "ចក្ខុវិស័យ",
      about_vision_text: "កម្ពុជាមួយដែលអ្នករាល់គ្នាដែលមានជំងឺហូរឈាមអាចទទួលបានការវិនិច្ឆ័យ ការព្យាបាល និងការគាំទ្រ។",
      about_mission_label: "បេសកកម្ម",
      about_mission_text: "ការអំពាវនាវដល់ការថែទាំដែលមានគុណភាព អប់រំសហគមន៍ គាំទ្រគ្រួសារ និងផ្តល់សមត្ថភាពដល់អ្នកថែទាំ។",
      /* SRC */
      src_eyebrow: "បម្រើសហគមន៍",
      src_heading: "SRC",
      src_sub: "ការប្តេជ្ញាចិត្តរបស់ CHA ចំពោះការងារសហគមន៍ ការចូលរួមស្ម័គ្រចិត្ត និងការយល់ដឹងសាធារណៈនៅកម្ពុជា។",
      src_kicker_reach: "ការឈានដល់",
      src_kicker_people: "មនុស្ស",
      src_kicker_region: "តំបន់",
      src_stat_1: "12+",
      src_stat_label_1: "ខេត្ត",
      src_stat_2: "80+",
      src_stat_label_2: "ស្ម័គ្រចិត្ត",
      src_stat_3: "1",
      src_stat_label_3: "ជំពូក",
      src_card_1_title: "ការងារសហគមន៍",
      src_card_1_desc: "យុទ្ធនាការលើកកម្ពស់ការដឹងគុណ ការអប់រំជាភាសាខ្មែរ និងភាពជាដៃគូជាមួយមណ្ឌលសុខភាពមូលដ្ឋានដែលឈានដល់អ្នកជំងឺ។",
      src_card_2_title: "កម្មវិធីស្ម័គ្រចិត្ត",
      src_card_2_desc: "អ្នកជំងឺ គ្រួសារ និងសិស្សវិទ្យាសាស្រ្តថែទាំដែលដឹកនាំព្រឹត្តិការណ៍ ជួយដល់សហសេវិកដែលទើបរកឃើញជំងឺ និងដំណើរការសកម្មភាពសហគមន៍។",
      src_card_3_title: "ជំពូកសៀមរាប",
      src_card_3_desc: "មជ្ឈមណ្ឌលភាគខាងជើងរបស់យើងសម្របសម្រួលការងារសហគមន៍ ការគាំទ្រអ្នកជំងឺ និងភាពជាដៃគូជាមួយមន្ទីរពេទ្យបង្អែកសៀមរាប។",
      src_link_1: "ស្វែងយល់បន្ថែម",
      src_link_2: "ចូលរួម",
      src_link_3: "ទស្សនាជំពូក",
      src_cta_heading: "ចង់ចូលរួម?",
      src_cta_sub: "ចូលរួមជាមួយ jaringan ស្ម័គ្រចិត្តរបស់យើង និងបង្កើតការផ្លាស់ប្តូរក្នុងសហគមន៍ជំងឺហូរឈាមនៅកម្ពុជា។",
      src_cta_btn_1: "ចូលរួម",
      src_cta_btn_2: "ស្វែងយល់បន្ថែម",
      /* History */
      history_heading: "ប្រវត្តិសាស្រ្ត",
      history_view_timeline: "មើលពេលវេលាពេញ",
      history_intro: "CHA ត្រូវបានបង្កើតឡើងក្នុងឆ្នាំ ២០១១ ដោយអ្នកជំងឺ និងគ្រួសារដែលមានចក្ខុវិស័យរួមគ្នា៖ ធានាថាមិនមានអ្នកណាម្នាក់នៅកម្ពុជាជួបប្រទះជំងឺហូរឈាមម្នាក់ឯង។",
      history_presidents: "ប្រធានកាលពីអតីត",
      history_established: "CHA បង្កើតឡើង",
      history_established_desc: "CHA ត្រូវបានបង្កើតឡើងដោយអ្នកជំងឺ និងគ្រួសារ។",
      history_wfh_member: "សមាជិក WFH",
      history_wfh_member_desc: "ក្លាយជាសមាជិកនៃសហព័ន្ធគាំទ្រជំងឺហ្វូនឌីកពិភពលោក។",
      history_hospital: "ភាពជាដៃគូជាមួយមន្ទីរពេទ្យ",
      history_hospital_desc: "ភាពជាដៃគូជាមួយមន្ទីរពេទ្យដើម្បីកែលម្អការចូលប្រើប្រាស់ការព្យាបាល។",
      history_national: "ការឈានដល់ថ្នាក់ជាតិ",
      history_national_desc: "ពង្រីកការអប់រំ និងការឈានដល់ទូទាំងខេត្ត។",
      history_president: "ប្រធាន",
      /* Leadership */
      leadership_heading: "ក្រុមដឹកនាំ",
      leadership_sub: "អ្នកដែលឧទ្ទិសដល់បេសកកម្មរបស់ CHA នៅទូទាំងប្រទេសកម្ពុជា។",
      leadership_meet: "ជួបក្រុមពេញ",
      leadership_youth_title: "ក្រុមយុវជន",
      leadership_youth_desc: "เครือข่ายអ្នកជំងឺ និងអ្នកគាំទ្រវ័យក្មេងដែលដឹកនាំយុទ្ធនាការលើកកម្ពស់ការដឹងគុណ ការណែនាំស្មើគ្នា និងការតស៊ូមតិដែលដឹកនាំដោយយុវជននៅទូទាំងប្រទេសកម្ពុជា។",
      leadership_women_title: "ក្រុមស្ត្រី",
      leadership_women_desc: "ផ្តល់សមត្ថភាពដល់ស្ត្រីដែលរងផលប៉ះពាល់ពីជំងឺហូរឈាមតាមរយៈវង់គាំទ្រ ការអប់រំអំពីជំងឺ VWD និងបញ្ហាអ្នកផ្ទុក និងព្រឹត្តិការណ៍ស្ថាបនាសហគមន៍។",
      /* WFH */
      wfh_heading: "ការងាររបស់យើងជាមួយ WFH និង HFA",
      wfh_sub: "CHA សូមក្រើនរង្វង់ក្នុងការជាដៃគូជាមួយអង្គការឈានមុខគេក្នុងពិភពលោកដើម្បីពង្រឹងការថែទាំជំងឺហ្វូនឌីកនៅកម្ពុជា។",
      wfh_wfh_name: "សហព័ន្ធគាំទ្រជំងឺហ្វូនឌីកពិភពលោក",
      wfh_wfh_tag: "សមាជិកចាប់តាំងពីឆ្នាំ ២០១៤",
      wfh_wfh_stat_label: "ប្រទេសក្នុងបណ្តាញ",
      wfh_wfh_desc: "សមាជិកសហគមន៍សហព័ន្ធ WFH ។ តាមរយៈភាពជាដៃគូនេះ CHA ទទួលបានគោលនាំព្យាបាលអន្តរជាតិ កម្មវិធីបណ្តុះបណ្តាល និងជំនួយមនុស្សធម៌ដែលផ្ទាល់កែលម្អការថែទាំអ្នកជំងឺ។",
      wfh_wfh_link: "ទស្សនា WFH",
      wfh_hfa_name: "មូលនិធិជំងឺហ្វូនឌីកអូស្ត្រាលី",
      wfh_hfa_tag: "ដៃគូបណ្តុះបណ្តាល",
      wfh_hfa_stat_label: "កម្មវិធីរួម",
      wfh_hfa_desc: "HFA ជាដៃគូជាមួយ CHA ក្នុងការកសាងសមត្ថភាព ការបណ្តុះបណ្តាលពេទ្យ និងការតស៊ូមតិអ្នកជំងឺ។ កម្មវិធីរួមភ្ជាប់អ្នកពេទ្យកម្ពុជាជាមួយជំនាញអូស្ត្រាលី។",
      wfh_hfa_link: "ស្វែងយល់បន្ថែម",
      /* Haemophilia */
      haem_divider: "អំពីជំងឺហ្វូនឌីក",
      haem_heading: "ជំងឺហ្វូនឌីកគឺជាអ្វី?",
      haem_contact: "ទំនាក់ទំនងជំនាញ",
      haem_para_1: "ជំងឺហ្វូនឌីកគឺជាជំងឺហូរឈាមសរីរាង្គកំណើតដ៏កម្រមួយដែលប៉ះពាល់ដល់សមត្ថភាពរបស់អ្នកជំងឺក្នុងការបញ្ឈប់ការហូរឈាម។ អ្នកជំងឺហ្វូនឌីកអាចហូរឈាមយូរជាងអ្នកដទៃបន្ទាប់ពីរបួស ឬសូម្បីតែដោយគ្មានមូលហេតុដែលដឹង។",
      haem_para_2: "ទោះបីជាមិនមានវិធីព្យាបាលក៏ដោយ ក៏ការព្យាបាលទំនើបអនុញ្ញាតឱ្យអ្នកជំងឺហ្វូនឌីករស់នៅពេញលេញ សកម្ម និងមានសុខភាពល្អ។ ការវិនិច្ឆ័យដំបូង ការព្យាបាលត្រឹមត្រូវ និងការគាំទ្រជាបន្តបន្ទាប់គឺជាគន្លឹះក្នុងការការពារផលវិបាក និងការខូចខាតសន្លាក់។",
      /* Types */
      types_heading: "ប្រភេទជំងឺហ្វូនឌីក",
      types_sub: "ប្រភេទសំខាន់ៗចំនួនពីរនៃជំងឺហ្វូនឌីក — ទាំងពីរត្រូវការការវិនិច្ឆ័យត្រឹមត្រូវ និងការគ្រប់គ្រងអាយុជីវិត។",
      types_a_title: "ហ្វូនឌីកប្រភេទ A",
      types_a_desc: "បណ្តាលមកពីការខ្វះខាត factor VIII។ ជាប្រភេទដែលឃើញញឹកញាប់បំផុត។",
      types_b_title: "ហ្វូនឌីកប្រភេទ B",
      types_b_desc: "បណ្តាលមកពីការខ្វះខាត factor IX។ ពេលខ្លះហៅថា ជំងឺ Christmas។",
      /* Symptoms */
      symptoms_heading: "រោគសញ្ញាទូទៅ",
      symptoms_sub: "ការស្គាល់សញ្ញានៃជំងឺហូរឈាមគឺជាជំហានដំបូងឆ្ពោះទៅរកការវិនិច្ឆ័យ និងការថែទាំដែលត្រឹមត្រូវ។",
      symptom_bruising: "ស្នាមជាំងាយស្រួល",
      symptom_bruising_desc: "ស្នាមជាំដែលមិនពន្យល់បានពីការប៉ះទង្គិចតូច។",
      symptom_nosebleeds: "ការហូរឈាមច្រមុជច្រើន",
      symptom_nosebleeds_desc: "ការហូរឈាមច្រមុជដែលកើតឡើងជាបន្តបន្ទាប់។",
      symptom_gums: "អញ្ចាញធ្មេញហូរឈាម",
      symptom_gums_desc: "អញ្ចាញធ្មេញដែលហូរឈាមពេលដុសធ្មេញ ឬញ៉ាំអាហារ។",
      symptom_joint: "ឈឺ ឬហើមសន្លាក់",
      symptom_joint_desc: "សន្លាក់ឈឺ និងហើមបន្ទាប់ពីរបួស ឬសកម្មភាពតូច។",
      symptom_prolonged: "ហូរឈាមយូរ",
      symptom_prolonged_desc: "ការហូរឈាមដែលច្រើនជាងរំពឹងទុកបន្ទាប់ពីរបួស។",
      symptom_cta: "ជួបប្រទះរោគសញ្ញាទាំងនេះទេ? ការវិនិច្ឆ័យដំបូងអាចធ្វើឱ្យមានភាពខុសគ្នាដែលផ្លាស់ប្តូរជីវិត។",
      symptom_find_centre: "ស្វែងរកមជ្ឈមណ្ឌលព្យាបាល",
      symptom_contact_specialist: "ទំនាក់ទំនងជំនាញ",
      /* VWD */
      vwd_heading: "ជំងឺ Von Willebrand (VWD)",
      vwd_para_1: "ជំងឺ Von Willebrand គឺជាជំងឺហូរឈាមកំណើតដែលឃើញញឹកញាប់បំផុត ដែលប៉ះពាល់ដល់ប្រុស និងស្រីស្មើគ្នា។ វាបណ្តាលមកពីការខ្វះខាត ឬមុខងារមិនប្រក្រតីនៃវិទ្យុសាស្រ្ត von Willebrand (VWF) ដែលជាប្រូតេអ៊ីនដែលជួយឈាមកក។",
      vwd_para_2: "មានប្រភេទសំខាន់ៗចំនួនបួននៃជំងឺ VWD — ប្រភេទ ១ (ស្រាល) ប្រភេទ ២ (មធ្យម) និងប្រភេទ ៣ (ធ្ងន់ធ្ងរ)។ មួយនីមួយៗខុសគ្នាលើចំនួន VWF ដែលមាន និងរបៀបដែលវាដំណើរការ។ រោគសញ្ញារួមមានស្នាមជាំងាយស្រួល ការហូរឈាមច្រមុជច្រើន ការហូរឈាមអូវុលច្រើន និងការហូរឈាមយូរបន្ទាប់ពីវះកាត់ ឬរបួស។",
      vwd_find: "ស្វែងរកការព្យាបាល",
      /* Other */
      other_heading: "ជំងឺហូរឈាមផ្សេងទៀត",
      other_rare_title: "ការខ្វះខាតកត្តាដ៏កម្រ",
      other_rare_desc: "ការខ្វះខាតកត្តា I, II, V, VII, X, XI, XII និង XIII។ មួយនីមួយៗត្រូវការការវិនិច្ឆ័យ និងការព្យាបាលជាក់លាក់។",
      other_platelet_title: "ជំងឺមុខងារ platelet",
      other_platelet_desc: "ស្ថានភាពដែល platelet មិនដំណើរការត្រឹមត្រូវ ដែលនាំឱ្យហូរឈាមទោះបីជាចំនួន platelet ធម្មតា។",
      other_more: "សម្រាប់ព័ត៌មានបន្ថែមអំពីជំងឺហូរឈាមណាមួយ សូមទំនាក់ទំនងក្រុមរបស់យើង ឬទស្សនាមជ្ឈមណ្ឌលព្យាបាល។",
      /* Treatment */
      treatment_heading: "មជ្ឈមណ្ឌលព្យាបាល",
      treatment_sub: "ស្វែងរកមជ្ឈមណ្ឌលព្យាបាលជំងឺហ្វូនឌីកនៅទូទាំងប្រទេសកម្ពុជា — ស្វែងតាមខេត្ត។",
      treatment_select: "ជ្រើសរើសខេត្ត",
      treatment_view_map: "មើលនៅលើផែនទី",
      treatment_emergency: "ជំនួយបន្ទាន់",
      treatment_emergency_desc: "ប្រសិនបើអ្នកមានបញ្ហាបន្ទាន់ពីការហូរឈាម សូមទំនាក់ទំនងមជ្ឈមណ្ឌលព្យាបាលជិតអ្នក ឬហៅលេខបន្ទាន់របស់យើង។",
      /* CSR */
      csr_heading: "កម្មវិធី CSR",
      csr_sub: "ការប្រមូលថវិកា ការបរិច្ចាគ និងភាពជាដៃគូអាជីវកម្មដែលជំរុញបេសកកម្មរបស់យើង។",
      csr_fundraising: "ប្រមូលថវិកា",
      csr_fundraising_desc: "ប្រមូលថវិកាតាមរយៈការប្រមូលក្នុងសហគមន៍ ព្រឹត្តិការណ៍ និងយុទ្ធនាការដៃគូដែលរក្សាកម្មវិធីរបស់យើងឱ្យដំណើរការ។",
      csr_view_campaigns: "មើលយុទ្ធនាការ",
      csr_donate_online: "បរិច្ចាគតាមអ៊ីនធឺណិត",
      csr_donate_online_desc: "បរិច្ចាគដោយសុវត្ថិភាពតាមរយៈ PayPal ឬ ABA — រាល់ការរួមចំណែកផ្លាស់ប្តូរជីវិតនៅទូទាំងប្រទេសកម្ពុជា។",
      csr_donate_now: "បរិច្ចាគឥឡូវ",
      csr_partners_title: "ដៃគូអាជីវកម្ម",
      csr_partners_desc: "អង្គការដែលគួរឱ្យទុកចិត្តដែលគាំទ្របេសកកម្មរបស់យើង និងពង្រីកការឈានដល់របស់យើងទូទាំងប្រទេស។",
      csr_become_partner: "ក្លាយជាដៃគូ",
      /* Impact */
      impact_heading: "ផលប៉ះពាល់របស់អ្នក",
      impact_treatment: "ផ្តល់ការចូលប្រើប្រាស់ការព្យាបាលដល់អ្នកជំងឺ",
      impact_education: "គាំទ្រការអប់រំ និងការដឹងគុណ",
      impact_healthcare: "ពង្រឹងសមត្ថភាពថែទាំសុខភាព",
      impact_families: "ផ្តល់សមត្ថភាពដល់គ្រួសារ និងសហគមន៍",
      /* Membership */
      membership_heading: "អត្ថប្រយោជន៍សមាជិកភាព",
      membership_cta: "ត្រៀមខ្លួនចូលរួមជាមួយសហគមន៍របស់យើង?",
      membership_cta_sub: "ចូលរួមជាមួយ CHA និងទទួលបានការគាំទ្រ ធនធាន និងសហគមន៍ដែលយល់។",
      membership_register: "ចុះឈ្មោះឥឡូវ",
      membership_signin: "ជាសមាជិករួចហើយ? ចូល",
      membership_benefit_1_title: "សហគមន៍ និងការគាំទ្រ",
      membership_benefit_1_desc: "ភ្ជាប់ជាមួយអ្នកជំងឺ គ្រួសារ និងអ្នកថែទាំនៅទូទាំងប្រទេសកម្ពុជា។",
      membership_benefit_2_title: "ការចូលប្រើប្រាស់ធនធាន",
      membership_benefit_2_desc: "មគ្គុទេសក៍ផ្តាច់មុខ សម្ភារៈអប់រំ និងព័ត៌មានព្យាបាល។",
      membership_benefit_3_title: "ព្រឹត្តិការណ៍ និងវិេទិនាការ",
      membership_benefit_3_desc: "ចូលរួមក្នុងសិក្ខាសាលាបណ្តុះបណ្តាល ព្រឹត្តិការណ៍លើកកម្ពស់ការដឹងគុណ និង webinar។",
      membership_benefit_4_title: "ការតស៊ូមតិ និងការដឹងគុណ",
      membership_benefit_4_desc: "ជួយលើកកម្ពស់ការដឹងគុណ និងតស៊ូមតិដើម្បីការថែទាំប្រសើរនៅទូទាំងប្រទេស។",
      membership_benefit_5_title: "ព័ត៌មាន និងnewsletter",
      membership_benefit_5_desc: "ទទួលបានព័ត៌មានថ្មីៗ និងសេចក្តីប្រកាសរបស់ CHA។",
      /* Donate */
      donate_heading: "ធ្វើការបរិច្ចាគ",
      /* Contact */
      contact_divider: "ទំនាក់ទំនង",
      contact_heading: "ទំនាក់ទំនង",
      contact_sub: "មានសំណួរ ឬត្រូវការជំនួយ? យើងនៅទីនេះដើម្បីជួយ។",
      contact_subtitle: "យើងនៅទីនេះដើម្បីជួយអ្នកជំងឺ គ្រួសារ និងដៃគូនៅទូទាំងប្រទេសកម្ពុជា។",
      contact_day_monfri: "ចន្លោះថ្ងៃចន្ទ – សុក្រ",
      contact_day_sat: "សៅរ៍",
      contact_day_sun: "អាទិត្យ",
      contact_closed: "បិទ",
      contact_info: "ទាក់ទងយើង",
      contact_address: "អាសយដ្ឋាន",
      contact_phone: "ទូរស័ព្ទ",
      contact_email: "អ៊ីមែល",
      contact_hours: "ម៉ោងធ្វើការ",
      contact_message: "ផ្ញើសារដល់យើង",
      contact_message_sub: "បំពេញទម្រង់ខាងក្រោម ហើយយើងនឹងឆ្លើយតប។",
      contact_name: "ឈ្មោះពេញ",
      contact_email_label: "អ៊ីមែល",
      contact_subject: "ប្រធានបទ",
      contact_message_label: "សារ",
      contact_name_ph: "បញ្ចូលឈ្មោះពេញ",
      contact_email_ph: "បញ្ចូលអ៊ីមែល",
      contact_subject_ph: "នេះអំពីអ្វី?",
      contact_message_ph: "យើងអាចជួយដូចម្តេច?",
      contact_send: "ផ្ញើសារ",
      /* Footer */
      footer_tagline: "គាំទ្រអ្នកជំងឺហូរឈាមនៅកម្ពុជា។",
      footer_quick_links: "តំណភ្ជាប់រហ័ស",
      footer_resources: "ធនធាន",
      footer_contact: "ទំនាក់ទំនង",
      footer_patient_guides: "មគ្គុទេសក៍អ្នកជំងឺ",
      footer_news_events: "ព័ត៌មាន និងព្រឹត្តិការណ៍",
      footer_donation: "បរិច្ចាគ",
      footer_copyright: "© ២០២៦ សមាគមហ្វូនឌីកកម្ពុជា។ រក្សាសិទ្ធិគ្រប់យ៉ាង។",
      footer_privacy: "គោលនយោបាយឯកជន",
      footer_disclaimer: "ការបដិសេធ",
      footer_social: "តំណភ្ជាប់ប្រព័ន្ធផ្សព្វផ្សាយសង្គម",
      footer_find_us: "រកឃើញយើង",
    }
  };

  function applyLang(lang) {
    document.documentElement.lang = lang === 'km' ? 'km' : 'en';
    const dict = i18n[lang];
    if (!dict) return;

    /* Swap text (exclude nav-drop-trigger — handled separately to preserve SVG icons) */
    document.querySelectorAll('[data-i18n]:not(.nav-drop-trigger)').forEach(function(el) {
      var key = el.getAttribute('data-i18n');
      if (dict[key] !== undefined) {
        // Only replace text nodes, preserve child elements (SVGs, links, etc.)
        for (var i = el.childNodes.length - 1; i >= 0; i--) {
          var node = el.childNodes[i];
          if (node.nodeType === Node.TEXT_NODE) el.removeChild(node);
        }
        el.insertAdjacentText('afterbegin', dict[key]);
      }
    });

    /* Swap placeholders */
    document.querySelectorAll('[data-i18n-placeholder]').forEach(function(el) {
      var key = el.getAttribute('data-i18n-placeholder');
      if (dict[key] !== undefined) {
        el.placeholder = dict[key];
      }
    });

    /* Swap aria-labels */
    document.querySelectorAll('[data-i18n-aria]').forEach(function(el) {
      var key = el.getAttribute('data-i18n-aria');
      if (dict[key] !== undefined) {
        el.setAttribute('aria-label', dict[key]);
      }
    });

    /* Update lang label */
    var label = document.querySelector('.lang-label');
    if (label) label.textContent = dict.lang_label;

    /* Swap dropdown trigger text (button inner text before SVG) */
    document.querySelectorAll('.nav-drop-trigger').forEach(function(btn) {
      var key = btn.getAttribute('data-i18n');
      if (key && dict[key] !== undefined) {
        /* Check if text already matches — skip DOM mutation on init to preserve event listeners */
        var currentText = btn.textContent.trim();
        if (currentText === dict[key]) return;
        /* Remove only text nodes, keep child elements (SVG icon, etc.) */
        for (var i = btn.childNodes.length - 1; i >= 0; i--) {
          var node = btn.childNodes[i];
          if (node.nodeType === Node.TEXT_NODE) btn.removeChild(node);
        }
        btn.insertAdjacentText('afterbegin', dict[key]);
      }
    });
  }

  function toggleLang() {
    var current = localStorage.getItem('cha-lang') || 'en';
    var next = current === 'en' ? 'km' : 'en';
    localStorage.setItem('cha-lang', next);
    applyLang(next);
  }

  /* Init */
  var savedLang = localStorage.getItem('cha-lang') || 'en';
  applyLang(savedLang);

  /* Bind toggle buttons */
  document.querySelectorAll('[data-lang-toggle]').forEach(function(btn) {
    btn.addEventListener('click', toggleLang);
  });
})();