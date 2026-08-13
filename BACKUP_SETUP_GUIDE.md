# Phase A — Backup Pipeline Setup Guide

Goal: off-site, automated, restorable backups of the `chacambodia.org` database and files.
The site owner follows this in the WordPress admin (browser) — it cannot be done from code.

## 1. Create the Backblaze B2 bucket (5 min, done outside WP)

1. Go to https://www.backblaze.com/b2/ and sign up (free to start; storage ~$6/TB/mo, billed
   only for what you store).
2. In the dashboard create a **Bucket**:
   - Name: `cha-backups`
   - Files in bucket are: **Private** (important — do NOT make public)
   - Region: nearest to you (US/Europe/Asia)
3. Create an **Application Key**:
   - Bucket: select `cha-backups`
   - Copy the **Key ID** and **Application Key** now (shown once only).
   - Keep them in a password manager, NOT in a file on the server or in git.

## 2. Install UpdraftPlus (2 min)

1. WP Admin → **Plugins → Add New**
2. Search `UpdraftPlus` (developer: UpdraftPlus.Com) → **Install Now** → **Activate**

## 3. Connect it to Backblaze B2 (3 min)

1. WP Admin → **Settings → UpdraftPlus Backups**
2. Click the **Settings** tab.
3. Remote storage: choose **S3-compatible (generic)** (B2 speaks the S3 protocol).
   - If your UpdraftPlus version lists **Backblaze B2** directly, choose that instead.
4. Endpoint / URL: `https://s3.us-west-004.backblazeb2.com` — **must match the region**
   of your bucket. Find your exact region endpoint on the bucket's page:
   - Bucket → "Endpoint value" shown in Backblaze for that bucket.
5. Bucket: `cha-backups`
6. Access key = B2 **Key ID**, Secret key = B2 **Application Key**
7. **Test** (button) → expect success.

## 4. Schedule + retention (3 min, same page)

- **Schedule:**
  - Files (full server files): **Weekly**
  - Database: **Daily**
- **Retention (keep this many):**
  - Full backups: keep **12** (≈ 3 months)
  - Databases: keep **30** (≈ 1 month)
  - Delete local copies: **Yes** after sending to remote (keeps WP clean)
- **Email:** leave off or send to a real monitored inbox.
- Click **Save Changes**.

## 5. Verify it actually runs (always do this)

1. Settings → UpdraftPlus → **Backup Now** (manual first run).
2. Tick "Include database + all files", run it.
3. Watch it complete, then open **Existing Backups** tab:
   - You must see a **green tick** (uploaded to B2) on both DB and files.
4. Confirm in the Backblaze dashboard that `cha-backups` now has files.

## 6. Swapping destination to Supabase later (when boss approves)

Same page, change only:
- Remote storage: **S3-compatible (generic)**
- Endpoint: Supabase Storage S3 endpoint (`https://<project>.supabase.co/storage/v1/s3`)
- Access key / secret: Supabase S3 credentials (Project Settings → Storage → S3)
- Region: Supabase region value

No re-config of schedules needed. That's the whole swap.

## Success criteria for this phase

- [ ] First automated backup completed and green in "Existing backups"
- [ ] Files present in Backblaze `cha-backups` bucket
- [ ] `BACKUP_AND_RECOVERY_PLAN.md` checkpoint A marked DONE