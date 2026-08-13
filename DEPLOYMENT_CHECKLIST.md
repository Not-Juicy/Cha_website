# CHA Deployment Checklist

Run this for EVERY deploy/update of the live site (`chacambodia.org`) and every app build.

## Before ANY change (gate — do not skip)

1. **Full backup** — WP Admin → UpdraftPlus → *Backup Now* (files + database), wait for green tick.
   - Skip only if UpdraftPlus already made a backup in the last 24h AND you're sure nothing changed.
2. **cPanel backup** (optional but recommended before theme swaps) — cPanel → Backup → *Download a Full Backup*.
3. **Record current state** — open `BACKUP_AND_RECOVERY_PLAN.md`, confirm last checkpoint tag.
4. Confirm the change is reversible (git tag / file copy exists).

## Deploying theme / functions.php changes

1. Edit files in `cha-cambodia-theme/`.
2. Validate: `php -l functions.php` and every edited `.php` (no syntax errors).
3. Zip the theme folder → `cha-cambodia-theme.zip` (replace old).
4. Upload zip in WordPress Admin → Appearance → Themes → Upload → **Replace active theme**.
5. **Purge LiteSpeed Cache** (WP toolbar or LiteSpeed Cache plugin → Purge All) — stale cache has caused stale pages before.
6. Visit site + `wp-json/cha/v1/...` endpoints to confirm working.
7. git commit + tag `checkpoint-<desc>-<date>` (see Phase C protocol).

## Deploying app (Expo) changes

1. `cd app`
2. `npx tsc --noEmit` — must be clean.
3. Run/tests locally or in Expo Go first.
4. Build:
   - Preview APK: `npx eas build -p android --profile preview`
   - Production: `npx eas build -p android --profile production` (+ `-p ios` for iOS)
5. Install preview build on phone, test auth + donation flows.

## After deploy

1. purge cache, hard-refresh.
2. Confirm SMS/email (Brevo) still sending.
3. Update `BACKUP_AND_RECOVERY_PLAN.md` checkpoint table.

## Going global (future hold)

- When moving off shared hosting → migrate backend to Supabase (see plan). Keep these deploy habits.