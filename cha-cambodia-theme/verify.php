<?php
/**
 * Email verification page
 * Loaded via template_redirect — WordPress is already available.
 */

$token  = sanitize_text_field($_GET['token'] ?? '');
$site   = get_bloginfo('name') ?: 'CHA Cambodia';
$status = 'error';
$message = '';

if (empty($token)) {
    $message = 'No verification token provided.';
} else {
    global $wpdb;
    $table = $wpdb->prefix . 'cha_members';
    $row = $wpdb->get_row($wpdb->prepare("SELECT * FROM $table WHERE verification_token = %s", $token));
    if (!$row) {
        $message = 'This verification link is invalid or has already been used.';
    } else {
        $wpdb->update($table, array('status' => 'active', 'verification_token' => null), array('id' => $row->id));
        $status  = 'success';
        $message = 'Your email has been verified. You can now log in and access your member profile.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo esc_html($status === 'success' ? 'Email Verified' : 'Verification Failed'); ?> — <?php echo esc_html($site); ?></title>
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
        .header-text {
            color: #fff;
        }
        .header-text h1 {
            font-size: 1.1rem;
            font-weight: 700;
            letter-spacing: -0.01em;
        }
        .header-text p {
            font-size: 0.8rem;
            opacity: 0.7;
            margin-top: 2px;
        }
        .main {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px 20px;
        }
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
        .icon-wrap svg {
            width: 36px;
            height: 36px;
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-linejoin: round;
            fill: none;
        }
        .icon-wrap.success svg { stroke: #16A34A; }
        .icon-wrap.error svg   { stroke: #DC2626; }
        .card h2 {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 10px;
            letter-spacing: -0.02em;
        }
        .card.success h2 { color: #16A34A; }
        .card.error h2   { color: #DC2626; }
        .card p {
            font-size: 0.95rem;
            color: #6B6B7E;
            line-height: 1.6;
            margin-bottom: 28px;
        }
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
        }
        .btn-primary {
            background: #0B3D6B;
            color: #fff;
        }
        .btn-primary:hover {
            background: #082A4A;
            box-shadow: 0 4px 12px rgba(11,61,107,0.3);
        }
        .btn-outline {
            background: transparent;
            color: #0B3D6B;
            border: 1.5px solid #D0C8BE;
            margin-left: 12px;
        }
        .btn-outline:hover {
            border-color: #0B3D6B;
            background: #F5F2F0;
        }
        .footer {
            text-align: center;
            padding: 16px 20px;
            font-size: 0.75rem;
            color: #6B6B7E;
        }
        @media (max-width: 480px) {
            .card { padding: 36px 24px; }
            .btn { display: block; width: 100%; margin: 0 0 10px 0; text-align: center; }
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
                <h2>Email Verified!</h2>
                <p><?php echo esc_html($message); ?></p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
            </div>
        <?php else: ?>
            <div class="card error">
                <div class="icon-wrap error">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="15" y1="9" x2="9" y2="15"/>
                        <line x1="9" y1="9" x2="15" y2="15"/>
                    </svg>
                </div>
                <h2>Verification Failed</h2>
                <p><?php echo esc_html($message); ?></p>
                <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary">Go to Homepage</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> <?php echo esc_html($site); ?>. All rights reserved.
    </div>
</body>
</html>
