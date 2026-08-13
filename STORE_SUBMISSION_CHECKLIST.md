# CHA Cambodia — Store Submission Checklist

> Companion to `CHA_Cambodia_Client_Requirements_Checklist.docx.txt`. This file captures
> everything needed to submit the app to Google Play + Apple App Store, mapped to the actual
> forms (Data Safety, Health-apps declaration, Privacy Nutrition Labels) with the exact answers
> you can copy in. Legal pages are now live at `/privacy`, `/disclaimer`, `/terms`.

---

## 0. Blocker gate — must exist before you can submit

| # | Item | Who | Status |
|---|------|-----|--------|
| 1 | **WP pages published**: Privacy → template "CHA Privacy Page" (slug `privacy`), Disclaimer → "CHA Disclaimer Page" (slug `disclaimer`), Terms → "CHA Terms Page" (slug `terms`). Verify all three load after upload + LiteSpeed purge. | You (WP admin) | [ ] |
| 2 | Google Play dev account ($25) + phone/ID verification | Boss | [ ] |
| 3 | Apple Developer Program ($99/yr) — Individual (no D-U-N-S) or Organization (needs D-U-N-S, ~28 days) | Boss | [ ] |
| 4 | PayWay **production** credentials (merchant_id + API key + domain whitelist) — sandbox-only today | Boss/ABA | [ ] |
| 5 | App icon 1024×1024 PNG, no text, CHA logo | Boss/design | [ ] |
| 6 | Store screenshots (6.9" + 5.5" Android, 6.7" + 6.5" iOS) | Dev (this project) | [ ] |

---

## 1. URLs to use in the consoles (already point at the app's own links)

| Function | URL |
|---|---|
| Privacy Policy | `https://chacambodia.org/privacy` |
| Terms of Service | `https://chacambodia.org/terms` |
| Disclaimer | `https://chacambodia.org/disclaimer` |
| Support / contact email | `info@chacambodia.org` |
| Website | `https://chacambodia.org` |

---

## 2. Google Play — Data Safety form (copy-paste answers)

Categories are declared as **collected**, **shared**, or **not collected**. The app stores the
server-side and never shares to third parties except the PayWay payment flow (which runs in its
own WebView) and email verification (Brevo).

| Data type | Category | Processed? | Encrypted (in transit)? | Other purposes |
|---|---|---|---|---|
| Email address | Contact info | Collected + shared | Yes (HTTPS) | App functionality, account management |
| Name | Personal info | Collected + shared | Yes | App functionality, account management |
| Phone number (optional) | Personal info | Collected | Yes | App functionality, support |
| Postal / physical address (optional) | Personal info | Collected | Yes | App functionality |
| Date of birth (patients) | Personal info | Collected | Yes | App functionality (membership card) |
| Health data — bleeding-disorder type, blood type (patients) | Health & fitness | Collected + shared | Yes (HTTPS; never shared | App functionality, personalisation (member card). Only "shared" to the device/member's own card view; not sold or used for advertising |
| Treatment centre (patients) | Personal info | Collected | Yes | App functionality |
| Emergency contact phone (patients) | Personal info | Collected | Yes | App functionality, emergency support |
| Photos (profile photo, optional) | Photos & videos | Collected | Yes | App functionality (member card) |
| Payment info (donations) | Financial info | **Not collected by CHA** | — | PayWay (ABA) handles payment in its own sandbox → production checkout; CHA stores only the approval code + amount |
| Login/token | App activity (auth) | Collected | Yes | App functionality |

Notes per the form:
- **Data is NOT sold.** Declare "No" for selling user data.
- **Data is NOT used for advertising** — declare "No" for advertising/marketing.
- **Deleted on request?** YES — the app has a **Delete Account** flow (`EditProfileScreen` →
  Delete Account). Google marks this as "Data can be deleted on request".
- **Data shared for security/compliance?** Only with authorities if required by law (declare
  "Yes, for legal compliance" if the form asks).

---

## 3. Google Play — Health apps declaration (Play Console → "Declaring Your App's Health App Data")

- **Data declared**: health data is collected (blood type, bleeding-disorder type, DOB) for
  membership-card purposes, **not** clinical decision-making.
- To the two questions:
  1. "Does your app collect or access health data?" → **Yes**
  2. "Is any of this health data … used for clinical purpose / is it a medical device?" →
     **No** — provide a link to the Disclaimer (`/disclaimer`) stating CHA content is
     educational, not medical advice, and always consult a healthcare provider.
- Requirement that follows: health data must be encrypted in transit + at rest (we use HTTPS)
  and deleted on request (Delete Account). Declared honestly in the Data Safety form above.
- If Google asks for a healthcare-provider sign-off, it is **not** needed because the app is
  not a medical device; the disclaimer + data safety answers cover it.

---

## 4. Apple App Store — Privacy Nutrition Labels

Map onto the label categories (mirror the Data Safety table):

| Data | Apple category |
|---|---|
| Email, name, phone, address, DOB | **Contact Info** — used for App Functionality |
| Bleeding-disorder type, blood type, treatment centre | **Health & Fitness** — App Functionality |
| Photo | **Identifiers → User ID** is "used for App Functionality"; photo is **Photos** if the form groups it there |
| Payment | Donation goes through PayWay **outside** the app (WebView) → **not collected** |
| Auth | Linked to email identity for App Functionality |

Select "No" for "Data used to track you" (no IDFA/analytics tracking).
Select "No" for targeting/advertising.

---

## 5. Demo reviewer account (required by BOTH stores)

> Must look real — reviewers reject `test@test.com`-style accounts.

1. Register a member on the web (`chacambodia.org` → Become a Member) using a real-looking name
   and a **reachable inbox** you control (e.g. `cha.reviewer.<yourname>@gmail.com`). Use role
   **Patient** so the membership card + health fields show.
2. Click the **verification email** link and confirm the account is active.
3. Save these values and paste them into the store review notes:
   - Demo email: `cha.reviewer.<yourname>@gmail.com`
   - Demo password: (real password you set)
   - Role: Patient (fill DOB, blood type, condition, treatment centre so the card is populated)
4. In each store's "App review information" field, include the URL of the app's **login screen**
   plus these credentials.
5. Use the **same account in both** Play and App Store review notes.

> Note: this account will be visible to reviewers and stored in `wp_cha_members`. It is a
> normal member. You can delete it later via the Delete Account flow.

---

## 6. Listing copy — English

- **App name**: `CHA Cambodia`
- **Subtitle** (Play, ≤80): `Patient ID card, news & support for haemophilia`
- **Short description** (App Store, ≤30): `Patient cards, news & support`
- **Keywords** (App Store, ≤100): `hemophilia, cambodia, patient, ID card, health, bleeding disorder, CHA`
- **Category**: Medical / Health & Fitness

**Full description (EN)** — paste into both stores:

> CHA Cambodia is the official app of the Cambodian Haemophilia Association (CHA), a patient-led
> non-profit supporting people living with bleeding disorders across Cambodia.
>
> MEMBERSHIP CARD
> • Digital patient card with member ID, blood type, bleeding-disorder type, and treatment
>   centre — always in your pocket for clinic visits and emergencies.
> • Update your photo and details any time.
>
> LEARN & STAY INFORMED
> • Latest news, events, and programs from CHA.
> • Clear, Khmer- and English-language education about haemophilia and other bleeding disorders.
>
> SUPPORT THE MISSION
> • Donate securely through PayWay (ABA Bank) to fund treatment, education, and hope.
>
> ACCOUNT & PRIVACY
> • Free membership, email + password login, and full control of your data.
> • Delete your account and data at any time from the app.
>
> CHA content is educational and not a substitute for professional medical advice. Always consult
> a qualified healthcare provider. See our Disclaimer in the app.

---

## 7. Listing copy — Khmer (ភាសាខ្មែរ)

- **App name (Khmer, optional)**: `CHA កម្ពុជា`
- **Subtitle (Play)**: `កាតសមាជិកអ្នកជំងឺ ព័ត៌មាន និងការគាំទ្រ`

**Full description (KM)**:

> កម្មវិធី CHA កម្ពុជា គឺជាកម្មវិធីផ្លូវការរបស់សមាគមគាំទ្រជំងឺហេម៉ូហ្វីលាកម្ពុជា (CHA) ដែលជាអង្គការមិនរកប្រាក់ចំណេញដឹកនាំដោយអ្នកជំងឺ គាំទ្រអ្នករស់នៅជាមួយជំងឺដំណក់ឈាមទូទាំងប្រទេសកម្ពុជា។
>
> កាតសមាជិកឌីជីថល
> • កាតសមាជិកអ្នកជំងឺជាមួយលេខសមាជិក ប្រភេទឈាម ប្រភេទជំងឺដំណក់ឈាម និងកន្លែងព្យាបាល — សម្រាប់ការទៅព្យាបាល និងស្ថានភាពបន្ទាន់។
> • អាប់ដេតរូបថត និងព័ត៌មានរបស់អ្នកគ្រប់ពេល។
>
> រៀន និងទទួលព័ត៌មាន
> • ព័ត៌មាន ព្រឹត្តិការណ៍ និងកម្មវិធីថ្មីៗពី CHA។
> • ការអប់រំជាភាសាខ្មែរ និងអង់គ្លេស អំពីជំងឺហេម៉ូហ្វីលា និងជំងឺដំណក់ឈាមដទៃទៀត។
>
> គាំទ្របេសកកម្ម
> • បរិច្ចាគដោយសុវត្ថិភាពតាមរយៈ PayWay (ធនាគារ ABA) ដើម្បីគាំទ្រការព្យាបាល ការអប់រំ និងក្តីសង្ឃឹម។
>
> គណនី និងឯកជនភាព
> • សមាជិកភាពឥតគិតថ្លៃ ចូលជាមួយអ៊ីមែល និងពាក្យសម្ងាត់ និងគ្រប់គ្រងទិន្នន័យរបស់អ្នកបានពេញលេញ។
> • អាចលុបគណនី និងទិន្នន័យរបស់អ្នកបានគ្រប់ពេល។
>
> ខ្លឹមសារ CHA គឺសម្រាប់អប់រំ ហើយមិនមែនជាការជំនួសការប្រឹក្សាវេជ្ជសាស្ត្រជំនាញទេ។ សូមពិគ្រោះជាមួយអ្នកផ្តល់សេវាសុខភាពដែលមានសមត្ថភាពជានិច្ច។

---

## 8. Google closed test / production

| Item | Value / rule |
|---|---|
| Closed testers | **Minimum 12** (Google rule for new personal accounts after Nov 13, 2023) |
| Closed test duration | **14 continuous days** with rolling activity |
| What this means | You cannot release to production until the 14-day closed test completes |
| Suggested role | Add the demo reviewer account as a tester so review has a working credential |

## 9. Apple requirements (double-check at review)

- Health app menu → app claims **HealthKit**? **No** — we don't use HealthKit (data is entered
  by the user into our own DB). Do NOT tick HealthKit.
- Login: email + password only → **no Sign in with Apple required** (app has no third-party
  login).
- Account deletion: Delete Account is present in-app → meets Apple requirement 4.8 for apps with
  account creation.

---

## 10. Pre-submit checklist (run in this order)

1. [ ] Theme deployed with legal pages published (gate #1 above) + LiteSpeed purged.
2. [ ] `npx tsc --noEmit` clean in `app/`.
3. [ ] Production build: `cd app && npx eas build -p android --profile production` (+ `-p ios`).
4. [ ] Internal testing round on both platforms with the real demo account.
5. [ ] Start Google **closed test with ≥12 testers** (14 days) immediately — it's the long pole.
6. [ ] Fill Data Safety (section 2) + Health declaration (section 3) + listing copy (sections 6–7).
7. [ ] Apple: upload via App Store Connect, fill labels (section 4) + review info (section 5).
8. [ ] Screenshots + icon confirmed; promo/trailer optional.

---

## 11. Blockers that need other people

| Blocker | Owner | Unblocks |
|---|---|---|
| Publish the 3 legal WP pages | You (WP admin) | Play store link check + Apple review |
| PayWay production merchant credentials | Boss + ABA | Real donations; sandbox-only is fine for review but flag it |
| Google $25 + Apple $99 accounts | Boss | Submission itself |
| 12 real testers + 14-day closed test | Boss/team | Production release on Play |
| Privacy/disclaimer reviewed by CHA counsel (optional but recommended before launch) | CHA board | Final sign-off |