<?php
/*
Template Name: CHA Patient Card Page
Description: Custom patient card page template
*/

get_header();
?>

<div class="topbar"><div class="container topbar-inner">
  <a href="index.html" class="brand"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> CHA — Cambodian Haemophilia Association</a>
  <a href="index.html" class="back-link">← Back to home</a>
</div></div>

<div class="login-required" id="login-screen"><div class="container"><div class="login-card">
  <div class="login-icon"><svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg></div>
  <h1>Your CHA Member Card</h1>
  <p>Sign in or register to view your digital membership card and profile information.</p>
  <a href="index.html" class="btn-login"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg> Go to CHA Website to Sign In</a>
</div></div></div>

<div class="card-page" id="card-page"><div class="container">

<!-- ===== LEFT COLUMN: MEMBER CARD (sticky) ===== -->
<div class="card-left">
  <div class="member-card" id="member-card">
    <div class="card-header">
      <div class="card-logo-block">
        <div class="card-logo">CHA</div>
        <div class="card-org">Cambodian Haemophilia Association</div>
      </div>
      <span class="card-role-badge" id="card-badge"></span>
    </div>
    <div class="card-name" id="card-name">—</div>
    <div class="card-details" id="card-details"></div>
    <div class="card-footer">
      <div class="card-id-block">
        <div class="card-id-label">Member ID</div>
        <div class="card-id" id="card-id">—</div>
      </div>
      <div id="card-extra-badge"></div>
    </div>
  </div>
  <div class="card-action-btns">
    <button class="btn-print" onclick="window.print()">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="width:18px;height:18px"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
      Print Card
    </button>
    <button class="btn-signout" onclick="localStorage.removeItem('cha_current_user');window.location.reload()">Sign Out</button>
  </div>
</div>

<!-- ===== RIGHT COLUMN: ROLE-SPECIFIC SECTIONS ===== -->
<div class="profile-section">
  <div class="profile-header">
    <div class="avatar" id="avatar-initials">—</div>
    <div class="profile-info">
      <p class="profile-name" id="profile-name">—</p>
      <p class="profile-email" id="profile-email">—</p>
    </div>
    <span class="profile-role" id="profile-role-badge"><span class="dot"></span> <span id="profile-role-text">—</span></span>
  </div>

  <!-- PATIENT -->
  <div id="sections-patient" style="display:none">
    <div class="info-card blue"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Patient Information</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Blood Type</div><div class="value" id="i-blood">—</div></div>
      <div class="info-item"><div class="label">Condition</div><div class="value" id="i-condition">—</div></div>
      <div class="info-item"><div class="label">Date of Birth</div><div class="value" id="i-dob">—</div></div>
      <div class="info-item"><div class="label">Member Since</div><div class="value" id="i-since">—</div></div>
    </div></div>
    <div class="info-card purple"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg> Treatment Centre</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Centre</div><div class="value" id="i-centre">—</div></div>
      <div class="info-item"><div class="label">Phone</div><div class="value" id="i-centre-phone">—</div></div>
    </div></div>
    <div class="info-card red"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> Emergency Contact</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Name</div><div class="value" id="i-emergency">—</div></div>
      <div class="info-item"><div class="label">Phone</div><div class="value" id="i-emergency-phone">—</div></div>
    </div></div>
    <div class="edit-card"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit Profile</h4>
    <form id="edit-patient"><div class="form-row">
      <div class="form-group"><label>Blood Type</label><input id="e-blood" placeholder="e.g. A+, B+, O-"></div>
      <div class="form-group"><label>Condition</label><input id="e-condition" placeholder="e.g. Haemophilia A"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Date of Birth</label><input id="e-dob" placeholder="e.g. 15 March 1992"></div>
      <div class="form-group"><label>Province</label><input id="e-province" placeholder="e.g. Phnom Penh"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Treatment Centre</label><input id="e-centre" placeholder="e.g. National Paediatric Hospital"></div>
      <div class="form-group"><label>Treatment Phone</label><input id="e-centre-phone" placeholder="e.g. 023 721 833"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Emergency Contact</label><input id="e-emergency" placeholder="e.g. Sok Dara"></div>
      <div class="form-group"><label>Emergency Phone</label><input id="e-emergency-phone" placeholder="e.g. 012 345 678"></div>
    </div><button type="submit" class="btn-save">Save Changes</button></form></div>
  </div>

  <!-- CAREGIVER -->
  <div id="sections-caregiver" style="display:none">
    <div class="info-card blue"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> Caregiver Details</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Linked Patient</div><div class="value" id="cg-patient">—</div></div>
      <div class="info-item"><div class="label">Relationship</div><div class="value" id="cg-relation">—</div></div>
      <div class="info-item"><div class="label">Province</div><div class="value" id="cg-province">—</div></div>
      <div class="info-item"><div class="label">Member Since</div><div class="value" id="cg-since">—</div></div>
    </div></div>
    <div class="info-card red"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> Emergency Contact</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Name</div><div class="value" id="cg-emergency">—</div></div>
      <div class="info-item"><div class="label">Phone</div><div class="value" id="cg-emergency-phone">—</div></div>
    </div></div>
    <div class="info-card purple"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/></svg> Patient Card Access</h4>
    <div class="na-note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg><p style="margin:0">Your linked patient can access their medical card by signing in with their own account.</p></div></div>
    <div class="edit-card"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit Profile</h4>
    <form id="edit-caregiver"><div class="form-row">
      <div class="form-group"><label>Linked Patient Name</label><input id="cg-e-patient" placeholder="e.g. Srey Mao"></div>
      <div class="form-group"><label>Relationship</label><input id="cg-e-relation" placeholder="e.g. Parent"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Province</label><input id="cg-e-province" placeholder="e.g. Phnom Penh"></div>
      <div class="form-group"><label>Emergency Contact</label><input id="cg-e-emergency" placeholder="e.g. Sok Dara"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Emergency Phone</label><input id="cg-e-emergency-phone" placeholder="e.g. 012 345 678"></div>
    </div><button type="submit" class="btn-save">Save Changes</button></form></div>
  </div>

  <!-- PROFESSIONAL -->
  <div id="sections-professional" style="display:none">
    <div class="info-card blue"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg> Professional Details</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Affiliation</div><div class="value" id="pr-affiliation">—</div></div>
      <div class="info-item"><div class="label">Specialty</div><div class="value" id="pr-specialty">—</div></div>
      <div class="info-item"><div class="label">License #</div><div class="value" id="pr-license">—</div></div>
      <div class="info-item"><div class="label">Province</div><div class="value" id="pr-province">—</div></div>
    </div></div>
    <div class="info-card red"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg> Contact</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Phone</div><div class="value" id="pr-emergency-phone">—</div></div>
    </div></div>
    <div class="edit-card"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit Profile</h4>
    <form id="edit-professional"><div class="form-row">
      <div class="form-group"><label>Affiliation / Organisation</label><input id="pr-e-affiliation" placeholder="e.g. Calmette Hospital"></div>
      <div class="form-group"><label>Specialty</label><input id="pr-e-specialty" placeholder="e.g. Haematology"></div>
    </div><div class="form-row">
      <div class="form-group"><label>License Number</label><input id="pr-e-license" placeholder="e.g. KHM-12345"></div>
      <div class="form-group"><label>Province</label><input id="pr-e-province" placeholder="e.g. Phnom Penh"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Phone Number</label><input id="pr-e-phone" placeholder="e.g. 012 345 678"></div>
    </div><button type="submit" class="btn-save">Save Changes</button></form></div>
  </div>

  <!-- SUPPORTER -->
  <div id="sections-supporter" style="display:none">
    <div class="info-card blue"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> Membership Profile</h4>
    <div class="info-grid">
      <div class="info-item"><div class="label">Full Name</div><div class="value" id="sp-name">—</div></div>
      <div class="info-item"><div class="label">Email</div><div class="value" id="sp-email">—</div></div>
      <div class="info-item"><div class="label">Province</div><div class="value" id="sp-province">—</div></div>
      <div class="info-item"><div class="label">Member Since</div><div class="value" id="sp-since">—</div></div>
    </div></div>
    <div class="info-card purple"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg> Ways to Help</h4>
    <div class="na-note"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg><p style="margin:0">Thank you for supporting CHA! Your membership helps us provide treatment, education, and hope to people with bleeding disorders across Cambodia.</p></div></div>
    <div class="edit-card"><h4><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg> Edit Profile</h4>
    <form id="edit-supporter"><div class="form-row">
      <div class="form-group"><label>Full Name</label><input id="sp-e-name" placeholder="e.g. Your Name"></div>
      <div class="form-group"><label>Province</label><input id="sp-e-province" placeholder="e.g. Phnom Penh"></div>
    </div><div class="form-row">
      <div class="form-group"><label>Phone Number</label><input id="sp-e-phone" placeholder="e.g. 012 345 678"></div>
    </div><button type="submit" class="btn-save">Save Changes</button></form></div>
  </div>
</div>

</div></div>

<footer><div class="container">© 2026 Cambodian Haemophilia Association · <a href="index.html">Home</a> · <a href="privacy.html">Privacy Policy</a> · <a href="disclaimer.html">Disclaimer</a></div></footer>

<script>
(function() {
  var user = JSON.parse(localStorage.getItem('cha_current_user') || 'null');
  var loginScreen = document.getElementById('login-screen');
  var cardPage = document.getElementById('card-page');
  if (!user) { loginScreen.style.display = 'block'; cardPage.style.display = 'none'; return; }
  loginScreen.style.display = 'none'; cardPage.style.display = 'block';

  var role = user.role || 'Patient';
  var el = function(id) { return document.getElementById(id); };
  var set = function(id, val) { var e = el(id); if (e) e.textContent = val || '—'; };

  // Show role-specific sections
  document.querySelectorAll('[id^="sections-"]').forEach(function(s) { s.style.display = 'none'; });
  var sectionMap = { Patient: 'patient', 'Family member / Caregiver': 'caregiver', 'Healthcare professional': 'professional', Supporter: 'supporter' };
  var sectionId = sectionMap[role] || 'supporter';
  var sectionDiv = document.getElementById('sections-' + sectionId);
  if (sectionDiv) sectionDiv.style.display = '';

  // Avatar initials
  var initials = (user.name || '?').split(' ').map(function(w) { return w[0]; }).join('').substring(0, 2).toUpperCase();
  el('avatar-initials').textContent = initials;
  el('profile-name').textContent = user.name || '—';
  el('profile-email').textContent = user.email || '—';

  // Role badge
  var roleTextMap = { Patient: 'Patient', 'Family member / Caregiver': 'Caregiver', 'Healthcare professional': 'Healthcare Pro', Supporter: 'Supporter' };
  el('profile-role-text').textContent = roleTextMap[role] || 'Member';
  var badge = el('profile-role-badge');
  badge.className = 'profile-role ' + sectionId;

  // Shared card data
  el('card-name').textContent = user.name || '—';
  el('card-id').textContent = user.memberId || '—';
  el('card-badge').innerHTML = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg> ' + roleTextMap[role];

  // Role-specific card details
  var detailsDiv = el('card-details');
  var extraBadge = el('card-extra-badge');
  if (role === 'Patient') {
    detailsDiv.innerHTML = '<div><div class="card-label">Blood Type</div><div class="card-value">'+(user.bloodType||'—')+'</div></div><div><div class="card-label">Condition</div><div class="card-value">'+(user.condition||'—')+'</div></div><div><div class="card-label">Date of Birth</div><div class="card-value">'+(user.dob||'—')+'</div></div><div><div class="card-label">Member Since</div><div class="card-value">'+(user.memberSince||'—')+'</div></div>';
    extraBadge.innerHTML = '<div style="background:var(--c-red);border-radius:var(--r-full);padding:4px 14px;font-size:0.75rem;font-weight:800;letter-spacing:0.05em;box-shadow:0 4px 12px rgba(227,30,36,0.4)">'+(user.bloodType||'—')+'</div>';
    set('i-blood', user.bloodType); set('i-condition', user.condition); set('i-dob', user.dob); set('i-since', user.memberSince);
    set('i-centre', user.treatmentCentre); set('i-centre-phone', user.treatmentPhone);
    set('i-emergency', user.emergencyContact); set('i-emergency-phone', user.emergencyPhone);
    el('e-blood').value = user.bloodType||''; el('e-condition').value = user.condition||''; el('e-dob').value = user.dob||'';
    el('e-province').value = user.province||''; el('e-centre').value = user.treatmentCentre||''; el('e-centre-phone').value = user.treatmentPhone||'';
    el('e-emergency').value = user.emergencyContact||''; el('e-emergency-phone').value = user.emergencyPhone||'';
  } else if (role === 'Family member / Caregiver') {
    detailsDiv.innerHTML = '<div><div class="card-label">Linked Patient</div><div class="card-value">'+(user.linkedPatient||'—')+'</div></div><div><div class="card-label">Relationship</div><div class="card-value">'+(user.relationship||'—')+'</div></div><div><div class="card-label">Province</div><div class="card-value">'+(user.province||'—')+'</div></div><div><div class="card-label">Member Since</div><div class="card-value">'+(user.memberSince||'—')+'</div></div>';
    extraBadge.innerHTML = '';
    set('cg-patient', user.linkedPatient); set('cg-relation', user.relationship); set('cg-province', user.province); set('cg-since', user.memberSince);
    set('cg-emergency', user.emergencyContact); set('cg-emergency-phone', user.emergencyPhone);
    el('cg-e-patient').value = user.linkedPatient||''; el('cg-e-relation').value = user.relationship||''; el('cg-e-province').value = user.province||'';
    el('cg-e-emergency').value = user.emergencyContact||''; el('cg-e-emergency-phone').value = user.emergencyPhone||'';
  } else if (role === 'Healthcare professional') {
    detailsDiv.innerHTML = '<div><div class="card-label">Affiliation</div><div class="card-value">'+(user.affiliation||'—')+'</div></div><div><div class="card-label">Specialty</div><div class="card-value">'+(user.specialty||'—')+'</div></div><div><div class="card-label">License</div><div class="card-value">'+(user.licenseNumber||'—')+'</div></div><div><div class="card-label">Province</div><div class="card-value">'+(user.province||'—')+'</div></div>';
    extraBadge.innerHTML = '';
    set('pr-affiliation', user.affiliation); set('pr-specialty', user.specialty); set('pr-license', user.licenseNumber); set('pr-province', user.province);
    set('pr-emergency-phone', user.emergencyPhone);
    el('pr-e-affiliation').value = user.affiliation||''; el('pr-e-specialty').value = user.specialty||''; el('pr-e-license').value = user.licenseNumber||'';
    el('pr-e-province').value = user.province||''; el('pr-e-phone').value = user.emergencyPhone||'';
  } else {
    // Supporter
    detailsDiv.innerHTML = '<div><div class="card-label">Role</div><div class="card-value">Supporter</div></div><div><div class="card-label">Email</div><div class="card-value">'+(user.email||'—')+'</div></div><div><div class="card-label">Province</div><div class="card-value">'+(user.province||'—')+'</div></div><div><div class="card-label">Member Since</div><div class="card-value">'+(user.memberSince||'—')+'</div></div>';
    extraBadge.innerHTML = '';
    set('sp-name', user.name); set('sp-email', user.email); set('sp-province', user.province); set('sp-since', user.memberSince);
    el('sp-e-name').value = user.name||''; el('sp-e-province').value = user.province||''; el('sp-e-phone').value = user.emergencyPhone||'';
  }

  // Generic save helper
  function saveForm(formId, newFields) {
    var form = document.getElementById(formId);
    if (!form) return;
    form.addEventListener('submit', function(e) {
      e.preventDefault();
      var updated = Object.assign({}, user, newFields());
      localStorage.setItem('cha_current_user', JSON.stringify(updated));
      var users = JSON.parse(localStorage.getItem('cha_users') || '[]');
      var idx = users.findIndex(function(u) { return u.email === updated.email; });
      if (idx !== -1) users[idx] = updated;
      localStorage.setItem('cha_users', JSON.stringify(users));
      alert('Profile saved! Reloading...');
      window.location.reload();
    });
  }

  saveForm('edit-patient', function() { return {
    bloodType: el('e-blood').value.trim(), condition: el('e-condition').value.trim(), dob: el('e-dob').value.trim(),
    province: el('e-province').value.trim(), treatmentCentre: el('e-centre').value.trim(), treatmentPhone: el('e-centre-phone').value.trim(),
    emergencyContact: el('e-emergency').value.trim(), emergencyPhone: el('e-emergency-phone').value.trim()
  }; });
  saveForm('edit-caregiver', function() { return {
    linkedPatient: el('cg-e-patient').value.trim(), relationship: el('cg-e-relation').value.trim(), province: el('cg-e-province').value.trim(),
    emergencyContact: el('cg-e-emergency').value.trim(), emergencyPhone: el('cg-e-emergency-phone').value.trim()
  }; });
  saveForm('edit-professional', function() { return {
    affiliation: el('pr-e-affiliation').value.trim(), specialty: el('pr-e-specialty').value.trim(), licenseNumber: el('pr-e-license').value.trim(),
    province: el('pr-e-province').value.trim(), emergencyPhone: el('pr-e-phone').value.trim()
  }; });
  saveForm('edit-supporter', function() { return {
    name: el('sp-e-name').value.trim(), province: el('sp-e-province').value.trim(), emergencyPhone: el('sp-e-phone').value.trim()
  }; });
})();
</script>

<?php
get_footer();
?>
