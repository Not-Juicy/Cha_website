# CHA Cambodia — Backup & Recovery Plan

> Purpose: guarantee the web + app data (members, donations, photos, posts) can be
> recovered if anything goes wrong — today on Namecheap shared hosting, later on
> Supabase when the project scales globally.

## Checkpoint protocol (do this for every phase)

1. **Before starting any phase:** a checkpoint is already saved (git tag + file copies).
2. **After completing a phase:** tag git with `checkpoint-<phase>-<date>`, record status
   in this table, and confirm the live-site backup state before touching anything.
3. If anything breaks: restore from the newest checkpoint listed below.

## Checkpoint log

| # | Checkpoint | Date | Status | Where |
|---|------------|------|--------|-------|
| 0 | Baseline (pre-change) | 2026-08-13 | DONE | git tag `checkpoint-baseline-2026-08-13` (19f1625) + `_checkpoint_baseline_*.php/.ts/.json` copies |
| A | Backup pipeline guide | 2026-08-13 | DONE | `BACKUP_SETUP_GUIDE.md` written. **ACTION REQUIRED (you):** install UpdraftPlus + connect B2, verify first backup |
| B | Hosting safety net | 2026-08-13 | DONE | Deploy checklist `DEPLOYMENT_CHECKLIST.md` created with pre-deploy backup step. **ACTION REQUIRED (you):** confirm AutoBackup in cPanel |
| C | Git cleanup + push | 2026-08-13 | DONE | Commit `bf26046` + tag `checkpoint-c-git-cleanup-2026-08-13`, pushed to GitHub (app source now tracked, no secrets, new .gitignore) |
| D | Restore runbook + test | pending | | |

## Step 0 — Baseline (DONE 2026-08-13)

- Git tag: `checkpoint-baseline-2026-08-13` → commit `19f1625`
- Baseline copies of live files made as `_checkpoint_baseline_*` alongside each file
  (delete these later once phases are verified).

## Phase A — Backup pipeline (UpdraftPlus → S3-compatible off-site)

- Install **UpdraftPlus** (free) on `chacambodia.org` WP admin.
- Connect destination: **Backblaze B2 (~$6/mo)** — cheapest S3-compatible storage.
  *Later:* same pipeline points at **Supabase Storage (S3)** when boss approves ($25/mo,
  doubles as future global backend). Swap = new keys + endpoint only.
- Schedule: **database daily**, **full backup weekly**; retain 30 daily + 12 weekly.
- Verify first scheduled run completes (check UpdraftPlus "Existing backups").

## Phase B — Hosting safety net

- Confirm **cPanel AutoBackup** is enabled on Stellar Business.
- Codify: full cPanel backup **before every deploy/update** (add to deployment checklist).

## Phase C — Code backups (version control)

- Tidy `.gitignore` (exclude `Copyyyy for Backup/`, `backups/`, `junk/`, `cha-cambodia-themee/`,
  `themeee/`, `web - Copy*`, `test-site/`, etc.).
- Commit current working tree (theme + app), push to GitHub `Not-Juicy/Cha_website`.
- Verify no `wp-config.php` / API keys / secrets in the repo.

## Phase D — Restore runbook + real test

- Write `BACKUP_AND_RESTORE.md` (restore DB via phpMyAdmin, files via cPanel, app via EAS).
- Perform one actual restore test; if blocked on credentials, mark "verify next session".

## Future (when scaling globally)

- Swap UpdraftPlus destination → Supabase Storage; enable Supabase 7-day daily backups.
- Migrate backend to Supabase Postgres + Auth + Storage (global CDN, 285+ cities).

## Cheap wins folded in

- Secure public debug log `chacambodia.org/wp-content/cha-smtp-debug.log`
- Rate-limit `/login`, `/register`, `/forgot-password` per IP
