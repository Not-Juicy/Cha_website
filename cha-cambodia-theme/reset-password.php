<?php
/**
 * Password reset page
 * Loaded via template_redirect — WordPress is already available.
 */

$site    = get_bloginfo('name') ?: 'CHA Cambodia';
$token   = sanitize_text_field($_GET['token'] ?? ($_POST['token'] ?? ''));
$status  = 'idle';
$message = '';
$error   = '';

global $wpdb;
$table = $wpdb->prefix . 'cha_members';

if (!empty($_POST)) {
    $new_password = $_POST['new_password'] ?? '';
    $confirm      = $_POST['confirm_password'] ?? '';

    if (empty($token)) {
        $error = 'Missing reset token. Please request a new reset link.';
    } elseif (strlen($new_password) < 6) {
        $error = 'New password must be at least 6 characters.';
    } elseif ($new_password !== $confirm) {
        $error = 'Passwords do not match.';
    } else {
        $row = $wpdb->get_row($wpdb->prepare(
            "SELECT * FROM $table WHERE reset_token = %s AND reset_token_expiry > %s",
            $token,
            date('Y-m-d H:i:s', current_time('timestamp'))
        ));
        if (!$row) {
            $error = 'This reset link is invalid or has expired. Please request a new one.';
        } else {
            $wpdb->update($table, array(
                'password'           => wp_hash_password($new_password),
                'reset_token'        => null,
                'reset_token_expiry' => null,
                'status'             => 'active',
            ), array('id' => $row->id));
            $status  = 'success';
            $message = 'Your password has been reset. You can now log in with your new password.';
        }
    }
} else {
    // Pre-validate the token on GET so users see an expired-link message early.
    if (empty($token)) {
        $error = 'No reset token provided. Please request a new reset link.';
    } else {
        $valid = $wpdb->get_var($wpdb->prepare(
            "SELECT id FROM $table WHERE reset_token = %s AND reset_token_expiry > %s",
            $token,
            date('Y-m-d H:i:s', current_time('timestamp'))
        ));
        if (!$valid) {
            $error = 'This reset link is invalid or has expired. Please request a new one.';
        }
    }
}

if (empty($token)) {
    $error = 'No reset token provided. Please request a new reset link.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html($status === 'success' ? 'Password Reset' : 'Reset Password'); ?> — <?php echo esc_html($site); ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: #F5F2F0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #1E1E2E;
        }
        .header {
            background: #0B3D6B;
            padding: 20px 24px;
            display: flex;
            align-items: center;
            gap: 14px;
        }
        .header svg {
            width: 36px;
            height: 36px;
            fill: none;
            stroke: #fff;
            stroke-width: 2;
            stroke-linecap: round;
            stroke-linejoin: round;
            flex-shrink: 0;
        }
        .header-text { color: #fff; }
        .header-text h1 { font-size: 1.1rem; font-weight: 700; letter-spacing: -0.01em; }
        .header-text p { font-size: 0.8rem; opacity: 0.7; margin-top: 2px; }
        .main { flex: 1; display: flex; align-items: center; justify-content: center; padding: 32px 20px; }
        .card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            padding: 48px 40px;
            max-width: 440px;
            width: 100%;
            text-align: center;
        }
        .icon-wrap {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }
        .icon-wrap.success { background: #ECFDF5; }
        .icon-wrap.error   { background: #FEF2F2; }
        .icon-wrap svg { width: 36px; height: 36px; stroke-width: 2.5; stroke-linecap: round; stroke-linejoin: round; fill: none; }
        .icon-wrap.success svg { stroke: #16A34A; }
        .icon-wrap.error svg   { stroke: #DC2626; }
        .card h2 { font-size: 1.35rem; font-weight: 700; margin-bottom: 10px; letter-spacing: -0.02em; }
        .card.success h2 { color: #16A34A; }
        .card.error h2   { color: #DC2626; }
        .card p { font-size: 0.95rem; color: #6B6B7E; line-height: 1.6; margin-bottom: 28px; }
        .alert {
            background: #FEF2F2;
            color: #B91C1C;
            border: 1px solid #FECACA;
            border-radius: 8px;
            padding: 12px 16px;
            font-size: 0.85rem;
            margin-bottom: 20px;
            text-align: left;
        }
        .field { text-align: left; margin-bottom: 16px; }
        .field label { display: block; font-size: 0.85rem; font-weight: 600; color: #374151; margin-bottom: 6px; }
        .field input {
            width: 100%;
            padding: 12px 14px;
            border: 1.5px solid #D1D5DB;
            border-radius: 10px;
            font-size: 0.95rem;
            outline: none;
            transition: border-color 0.2s ease;
        }
        .field input:focus { border-color: #0B3D6B; }
        .btn {
            display: inline-block;
            padding: 12px 32px;
            border-radius: 10px;
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
            cursor: pointer;
            border: none;
            width: 100%;
        }
        .btn-primary { background: #0B3D6B; color: #fff; margin-top: 6px; }
        .btn-primary:hover { background: #082A4A; box-shadow: 0 4px 12px rgba(11,61,107,0.3); }
        .btn-primary:disabled { opacity: 0.6; cursor: not-allowed; }
        .btn-outline {
            background: transparent;
            color: #0B3D6B;
            border: 1.5px solid #D0C8BE;
            margin-top: 12px;
        }
        .btn-outline:hover { border-color: #0B3D6B; background: #F5F2F0; }
        .footer { text-align: center; padding: 16px 20px; font-size: 0.75rem; color: #6B6B7E; }
        @media (max-width: 480px) {
            .card { padding: 36px 24px; }
        }
    </style>
</head>
<body>
    <div class="header">
        <svg viewBox="0 0 24 24">
            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
        </svg>
        <div class="header-text">
            <h1>CHA Cambodia</h1>
            <p>Cambodian Haemophilia Association</p>
        </div>
    </div>

    <div class="main">
        <?php if ($status === 'success'): ?>
            <div class="card success">
                <div class="icon-wrap success">
                    <svg viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                        <polyline points="22 4 12 14.01 9 11.01"/>
                    </svg>
                </div>
                <h2>Password Reset</h2>
                <p><?php echo esc_html($message); ?></p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
            </div>
        <?php else: ?>
            <div class="card">
                <?php if (!empty($error)): ?>
                    <div class="alert"><?php echo esc_html($error); ?></div>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
                <?php else: ?>
                    <h2>Set a New Password</h2>
                    <p>Choose a new password for your <?php echo esc_html($site); ?> account.</p>
                    <form method="POST" action="<?php echo esc_url(home_url('/reset-password')); ?>">
                        <input type="hidden" name="token" value="<?php echo esc_attr($token); ?>">
                        <div class="field">
                            <label for="new_password">New Password</label>
                            <input type="password" id="new_password" name="new_password" placeholder="Min. 6 characters" minlength="6" required>
                        </div>
                        <div class="field">
                            <label for="confirm_password">Confirm New Password</label>
                            <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter new password" minlength="6" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-outline">Back to Home</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> <?php echo esc_html($site); ?>. All rights reserved.
    </div>
</body>
</html>
