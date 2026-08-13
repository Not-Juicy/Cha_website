# CHA Cambodia — Project Handoff (Web + App)

Read this first. It captures the full system state, what's done, what's in-flight, and
exactly how to continue without breaking the previous work.

---

## 1. Project overview

**CHA Cambodia** (Cambodian Haemophilia Association) — a patient-led health NGO app + website:
- **Web**: WordPress site `chacambodia.org` serving the public site AND the backend REST API.
- **App**: Expo / React Native app (Android + iOS), talks to the WordPress REST API.
- **Shared database**: one WordPress MySQL DB (`wp_cha_members`, `wp_cha_donations`, etc.) —
  both web and app use it. No separate second DB.
- **Hosting**: Namecheap **Stellar Business** (LiteSpeed, cPanel, CloudLinux). Shared plan —
  resource limits are per-account (100% CPU, 2 GB RAM, 40 entry processes) across ALL sites.
- **Goal**: Play Store + App Store launch; then global scaling (boss considering Supabase).

**Brand colors**: CHA Blue `#0B1D6D`, Red `#E31E24`, Purple `#6A2C91`. Font: Poppins.

---

## 2. Repo layout

```
Cha/
├── app/                    → React Native (Expo SDK 54, RN 0.81) — the mobile app
│   ├── App.tsx             → stack navigator + all screens
│   ├── app.json            → version 1.0.1, bundle com.chacambodia.app, versionCode 2
│   ├── package.json        → version 1.0.1
│   ├── eas.json            → build profiles (preview APK, production AAB/IPA)
│   └── src/
│       ├── api/client.ts   → axios client, ALL API calls (login/register/verify/profile/donate)
│       ├── i18n/en.json + km.json → bilingual strings
│       ├── screens/        → 15 screens (list below)
│       └── store/          → token storage
├── cha-cambodia-theme/     → WordPress theme = the BACKEND (PHP)
│   ├── functions.php       → ALL REST endpoints + SMTP + PayWay + rate logic
│   ├── reset-password.php  → web password-reset page (POST form, token validation)
│   ├── verify.php          → email-verification web page
│   ├── header/footer/front-page + page-*.php → templates
│   ├── customizer.php, script-cha.js, style-cha.css
│   └── index.php, style.css
├── BACKUP_AND_RECOVERY_PLAN.md   → master backup plan + checkpoint log (LIVE)
├── BACKUP_SETUP_GUIDE.md          → UpdraftPlus → Google Drive setup steps
├── BACKUP_AND_RESTORE.md          → emergency recovery runbook
├── DEPLOYMENT_CHECKLIST.md        → pre-deploy backup gate + deploy steps
└── README.md
```

**Deployment flow**: edit files here → build `cha-cambodia-theme.zip` → upload to WP
Theme → **purge LiteSpeed Cache** (stale cache has caused stale pages before).

---

## 3. App — screens (15)

| Screen | Path |
|---|---|
| Home | `screens/Home/HomeScreen.tsx` |
| News | `screens/News/NewsScreen.tsx` |
| Programs | `screens/Programs/ProgramsScreen.tsx` |
| Haemophilia | `screens/Haemophilia/HaemophiliaScreen.tsx` |
| About | `screens/About/AboutScreen.tsx` |
| Donate (PayWay WebView) | `screens/Donate/DonateScreen.tsx` |
| Dashboard (Account) | `screens/Dashboard/DashboardScreen.tsx` |
| MembershipCard | `screens/Dashboard/MembershipCardScreen.tsx` |
| EditProfile | `screens/Profile/EditProfileScreen.tsx` (has Delete Account) |
| ChangePassword | `screens/Profile/ChangePasswordScreen.tsx` |
| Settings | `screens/Settings/SettingsScreen.tsx` (Terms link, real version via expo-constants) |
| Help | `screens/Help/HelpScreen.tsx` |
| Auth (login/register/verify) | `screens/Auth/AuthScreen.tsx` |
| ForgotPassword | `screens/Auth/ForgotPasswordScreen.tsx` (NEW) |

Role: member / patient. Auth = own email+password (no Sign-in-with-Apple required).

---

## 4. Backend — REST API (`cha/v1`)

All in `cha-cambodia-theme/functions.php`. Public routes (no nonce needed; cookie check
bypassed via `cha_bypass_rest_cookie_check`).

| Method | Route | Notes |
|---|---|---|
| POST | `/register` | creates member, sends verify email via Brevo SMTP |
| POST | `/login` | returns token; `not_verified` 403 if unverified |
| POST | `/verify?token=` | email verification |
| POST | `/resend-verification` | |
| POST | `/forgot-password` | NEW — always same success msg (no email enum), 10-min throttle |
| POST | `/reset-password` | NEW — token + expiry validation, resets password |
| GET/PUT | `/member/profile` | token auth via `X-CHA-Token` |
| POST | `/member/photo`, `/member/photo/delete` | uploads to `/wp-content/uploads/cha-photos/` |
| POST | `/member/change-password`, `/logout`, `/delete` | |
| POST | `/payway/purchase`, `/payway/check` | donation; callback saves `apv` |
| GET | `/members`, `/members/:id` | admin only |

Auth: token stored server-side as `app_token_hash` (HMAC-sha512). Client sends
`X-CHA-Token` header. App `client.ts` interceptor unwraps + formats errors (recently
improvised to show real cause: timeout/DNS/HTTP-status/not-JSON).

**DB tables**: `wp_cha_members` (has `reset_token`, `reset_token_expiry` cols — added in this
session, applied via `cha_upgrade_members_table` migration on theme deploy),
`wp_cha_donations`. Photos capped 5 MB (JPG/PNG/GIF/WebP).

---

## 5. Payments — PayWay (ABA)

- **Sandbox only.** Production credentials NOT granted yet (needs merchant production
  merchant_id + API key + domain whitelist). Checkout works via WebView hosted form.
- Sandbox merchant_id `ec476057`, api key in WP options (not in code).
- Dashboard: `https://sandbox.payway.com.kh`. API-created txns don't show in sandbox
  portal UI (normal). APV = payment approval code from callback.

---

## 6. Email — Brevo SMTP

- From `noreply@chacambodia.org`, PHP `mail()`-free custom SMTP in functions.php.
- **Free tier = 300 emails/day** cap (biggest practical limit).
- Debug log at `wp-content/cha-smtp-debug.log` — currently publicly accessible,
  **needs securing** (pending task).
- SPF record still `v=spf1 include:spf.efwd.registrar-servers.com ~all` — **needs
  `include:sendinblue.com` added** (pending, boss/Nginx owner action).

---

## 7. Backup & recovery (Phase A–D) — CURRENT STATE

**DONE**
- Git save points pushed (tags below). App source now version-controlled (was never tracked).
- UpdraftPlus → Google Drive connected (account `Nexus Digital Support`, ~5 TB free).
- Schedules CONFIRMED: Files **Weekly** (Thu Aug 20), Database **Daily** (Fri Aug 14).
- Retention CONFIRMED: **files 4 / database 14** (DB should be raised to ≥14 done; ok now).
- Docs created: plan, setup guide, deployment checklist, restore runbook.

**OPEN — needs site owner action (agent cannot click WP admin/cPanel)**
- [ ] One manual **Backup Now** → confirm green tick (files + DB upload to Google Drive).
- [ ] Confirm cPanel **AutoBackup** is enabled (Phase B) — **deferred, no cPanel access yet**.
- [ ] Phase D **restore test** — runbook written but untested; needs cPanel/phpMyAdmin
      access (deferred). Golden rule: never restore from an untested backup.

**Doc order to follow**: `BACKUP_AND_RECOVERY_PLAN.md` (master) → `BACKUP_SETUP_GUIDE.md`
→ `BACKUP_AND_RESTORE.md` → `DEPLOYMENT_CHECKLIST.md`.

---

## 8. Checkpoint / rollback protocol

Every completed phase = git tag `checkpoint-<name>-YYYY-MM-DD`, pushed to GitHub.

| Tag | Commit |
|---|---|
| `checkpoint-baseline-2026-08-13` | `19f1625` |
| `checkpoint-docs-2026-08-13` | `99d5ad9` |
| `checkpoint-c-git-cleanup-2026-08-13` | `bf26046` |
| `checkpoint-d-runbook-2026-08-13` | `7a25427` |
| `checkpoint-a-googledrive-2026-08-13` | `fdb62f8` |

Rollback: `git checkout <tag> -- cha-cambodia-theme app`. All on GitHub
`Not-Juicy/Cha_website` (branch `main`). `.gitignore` excludes junk/copy/backup folders,
`node_modules`, `.expo`, `.vercel`, secrets.

**Rule set by user**: after every phase done → save checkpoint tag + remind user in chat.

---

## 9. IN-FLIGHT / NEXT WORK (priority order)

1. **Expo Go login "network error" (UNRESOLVED — resume this)**
   - Server verified healthy (login returns proper JSON; 403 = `not_verified` only).
   - TLS chain complete, no WAF block found.
   - `client.ts` already updated to surface the real cause (timeout/DNS/status/not-JSON).
   - Remaining: reload Expo Go, retry, ask user for the exact NEW message + the registered
     email to check `wp_cha_members.status` for that email. Diagnose if it's `not_verified`,
     `invalid_credentials`, or transport.
2. **Forgot-password end-to-end test**: app → Send Reset Link → Brevo email → `reset-password.php`
   → set new password → login. Theme zip must be redeployed first (see §7 open items).
3. **Hardening (low priority)**: secure public `cha-smtp-debug.log`; rate-limit
   `/login`, `/register`, `/forgot-password` per IP.
4. **Store compliance (playbook: demo reviewer account, privacy/disclaimer content, health-apps
   declaration, Data Safety form, closed test 12 testers × 14 days, listing copy EN/KM)**.
   See `CHA_Cambodia_Client_Requirements_Checklist.docx.txt`.

---

## 10. Verify commands (run before finishing any task)

```bash
# App typecheck
cd app && npx tsc --noEmit
# PHP syntax on any edited theme file
php -l cha-cambodia-theme/functions.php
# Builds
cd app && npx eas build -p android --profile preview   # dev APK
cd app && npx eas build -p android --profile production  # + -p ios for IPA
# After any theme change: upload zip → WP → purge LiteSpeed Cache
```

---

## 11. Secrets & staff

- **NEVER put credentials in code or commits.** SMTP/PayWay settings live in WP options
  (DB), configured in WP admin. GitHub repo is public-ish (`Not-Juicy/Cha_website`).
- Test account used for API probes: `probe_test_2026@example.com` (unverified → login 403).
- Local scratch folders (`Copyyyy for Backup/`, `backups/`, `Copy for APP/`, etc.) are
  ignored from git — don't rely on them for repo state.