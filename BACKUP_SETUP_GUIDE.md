# Phase A — Backup Pipeline Setup Guide

Goal: off-site, automated, restorable backups of the `chacambodia.org` database and files.
The site owner follows this in the WordPress admin (browser) — it cannot be done from code.

Destination chosen: **Google Drive** — free (15 GB), one-click setup, reliable. Plenty of
headroom at CHA's scale for years.

## 1. Install UpdraftPlus (2 min)

1. WP Admin → **Plugins → Add New**
2. Search `UpdraftPlus` (developer: UpdraftPlus.Com) → **Install Now** → **Activate**
3. *(Already installed? Skip this step.)*

## 2. Connect it to Google Drive (2 min)

1. WP Admin → **Settings → UpdraftPlus Backups**
2. Click the **Settings** tab.
3. Remote storage: tick **Google Drive** (free tier — it is NOT under "Get Premium").
4. Click **Test** / Settings → **Connect Google Drive** → a Google sign-in window opens.
5. Sign in with the account you want to hold backups, allow access.
6. Back on the WP page, click **Test** → expect **success**.

## 3. Schedule + retention (3 min, same page)

- **Schedule:**
  - Files (full server files): **Weekly**
  - Database: **Daily**
- **Retention (keep this many):**
  - Full backups: keep **12** (≈ 3 months)
  - Databases: keep **30** (≈ 1 month)
  - Delete local copies: **Yes** after sending to remote (keeps WP clean)
- **Email:** leave off or send to a real monitored inbox.
- Click **Save Changes**.

## 4. Verify it actually runs (always do this)

1. Settings → UpdraftPlus → **Backup Now** (manual first run).
2. Tick "Include database + all files", run it.
3. Watch it complete, then open **Existing Backups** tab:
   - You must see a **green tick** (uploaded to Drive) on both DB and files.
4. Open Drive → the **UpdraftPlus** folder — confirm the backup files are there.

## 5. Swapping destination to Supabase later (when boss approves)

Same page, change only the remote storage to **S3-compatible (generic)**:
- Endpoint: Supabase Storage S3 endpoint (`https://<project>.supabase.co/storage/v1/s3`)
- Access key / secret: Supabase S3 credentials (Project Settings → Storage → S3)
- Region: Supabase region value

Schedules don't need re-configuring. That's the whole swap.

## What "good" looks like after this phase

- A backup exists on Google Drive (green tick) at least once a week, DB at least daily.
- You can open UpdraftPlus → **Existing backups** → **Restore** any time.
- Site keeps working while backups run (retention + local-copy-delete keep it light).