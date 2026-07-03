<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Koulen:wght@400;700&family=Siemreap:wght@400&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Mobile Drawer -->
<div class="mobile-drawer" id="mobile-drawer" aria-hidden="true">
    <div class="backdrop"></div>
    <div class="panel" role="dialog" aria-modal="true" aria-label="Site menu">
        <div class="panel-head">
            <a class="brand" href="<?php echo home_url(); ?>">
                <img class="brand-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/cha-logo-small.png" alt="Cambodian Haemophilia Association">
            </a>
            <button class="close" type="button" aria-label="Close menu">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6" y1="6" x2="18" y2="18"/>
                </svg>
            </button>
        </div>
        <nav class="panel-nav" aria-label="Main navigation (mobile)">
            <ul>
                <li><a class="primary" href="<?php echo home_url(); ?>">Home</a></li>
                <li><a class="primary" href="#about">About CHA</a></li>
                <li><a class="primary" href="#programs">Programs & Care</a></li>
                <li><a class="primary" href="#news">News & Events</a></li>
                <li><a class="primary" href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="panel-cta">
            <a class="btn btn-secondary" href="#donate">Donate</a>
            <a class="btn btn-primary" href="#member">My Account</a>
        </div>
    </div>
</div>

<!-- Header -->
<header class="site-header" id="header">
    <div class="container">
        <a class="brand" href="<?php echo home_url(); ?>" aria-label="Cambodian Haemophilia Association - Home">
            <img class="brand-logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/cha-logo-small.png" alt="CHA Logo">
            <div class="brand-text">
                <div class="brand-title khmer-heading">សមាគមជំងឺប្រូមូសកម្ពុជា</div>
                <div class="brand-subtitle">Cambodian Haemophilia Association</div>
            </div>
        </a>
        <nav class="site-nav" aria-label="Main navigation">
            <ul>
                <li><a class="primary" href="<?php echo home_url(); ?>">Home</a></li>
                <li><a class="primary" href="#about">About CHA</a></li>
                <li><a class="primary" href="#programs">Programs & Care</a></li>
                <li><a class="primary" href="#news">News & Events</a></li>
                <li><a class="primary" href="#contact">Contact</a></li>
            </ul>
        </nav>
        <div class="nav-actions">
            <a class="btn btn-secondary" href="#donate">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
                </svg>
                Donate
            </a>
            <a class="btn btn-primary" href="#member">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                    <circle cx="12" cy="7" r="4"/>
                </svg>
                My Account
            </a>
            <button class="btn btn-icon" id="open-drawer" aria-label="Open menu" aria-controls="mobile-drawer" aria-expanded="false">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
            </button>
        </div>
    </div>
</header>

<main id="main">
