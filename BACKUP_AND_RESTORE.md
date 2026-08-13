# CHA Cambodia — Backup & Restore Runbook

> Step-by-step recovery when something goes wrong. Follow in order; do NOT skip the
> pre-flight checks. If any step fails, stop and get help rather than making it worse.

## Quick orientation

| What broke | Restore from | Time |
|---|---|---|
| A file/theme change broke the site | Git checkout of previous commit (below) | 5 min |
| Database corrupted / users lost | UpdraftPlus backup (daily) | 15 min |
| Whole site gone / hosting disk failed | UpdraftPlus off-site copy (B2) | 30–60 min |
| App won't build | Rebuild from `app/` source (tracked in git) | via EAS |

---

## 1. RESTORE FILE/CODE from git (theme or app source)

```bash
cd "C:\Users\Asus\Desktop\Cha"
git log --oneline -10                  # find the last GOOD commit
git stash                              # optional: save current broken work
git checkout <good-commit> -- cha-cambodia-theme app   # restore those folders
```

- Checkpoint tags to jump back to: `checkpoint-baseline-2026-08-13`,
  `checkpoint-docs-2026-08-13`, `checkpoint-c-git-cleanup-2026-08-13`.
- All commits are also on GitHub (`Not-Juicy/Cha_website`) — clone/fetch if local is gone.

## 2. RESTORE DATABASE via UpdraftPlus (fastest)

1. WP Admin → **UpdraftPlus → Existing backups**
2. Pick the newest backup with a green tick (uploaded to B2)
3. Select **"Database"** only (or "Everything" if full restore)
4. Click **Restore**, confirm, wait
5. Verify: members table has rows; try a login

## 3. RESTORE WHOLE SITE (files + DB)

1. WP Admin → **UpdraftPlus → Restore** → choose newest full backup
2. Restore **Everything** (files + database + plugins + themes + uploads)
3. Wait for completion, then **purge LiteSpeed Cache**
4. Verify homepage + `/wp-json/cha/v1/...` respond

## 4. MANUAL RESTORE via cPanel (if UpdraftPlus is also gone)

1. cPanel → **Backup** → download a full backup (or use the last downloaded one)
2. Files: cPanel → **File Manager** → upload extracted files to `public_html`
3. Database: cPanel → **MySQL Databases** → import the `.sql` via **phpMyAdmin**
   (or cPanel Backup → Restore a MySQL Database backup)
4. If restoring to a new host, update `wp-config.php` DB name/user/password + site URL
   in `wp_options` (`siteurl`, `home`).
5. Purge cache, verify.

## 5. RESTORE APP BUILD

- All app source is in `app/` (tracked in git).
- Rebuild: `cd app` → `npx eas build -p android --profile production` (+ `-p ios`)
- Older published builds remain available on Expo → **Builds** (downloadable APK/IPA).

## 6. RESTORE MEMBER PHOTOS (in uploads)

- Photos live in `/wp-content/uploads/cha-photos/` — included in UpdraftPlus file backups.
- Restore them with the file portion of any backup (step 2 or 3).

---

## Post-restore checklist

- [ ] Login works (web + app)
- [ ] Donation flow reachable (PayWay checkout page loads)
- [ ] News/programs content present
- [ ] Member photos visible
- [ ] LiteSpeed cache purged; hard-refresh browser
- [ ] Brevo verification emails still sending
- [ ] New checkpoint recorded in `BACKUP_AND_RECOVERY_PLAN.md`

## Golden rule

**Never restore without a verified backup.** If a backup shows no green tick / isn't on
B2, it isn't a backup — run a fresh one first.
