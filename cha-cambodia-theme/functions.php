
<?php
if (!defined('ABSPATH')) {
    exit;
}

function cha_enqueue_assets() {
    // Enqueue main theme stylesheet (style.css)
    wp_enqueue_style('cha-style', get_stylesheet_uri());
    
    // Enqueue CHA custom CSS
    wp_enqueue_style('cha-custom-css', get_template_directory_uri() . '/assets/css/style-cha.css');
    
    // Enqueue Google Fonts
    wp_enqueue_style('cha-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Koulen:wght@400;700&family=Siemreap:wght@400&display=swap');
    
    // Enqueue CHA custom JS
    wp_enqueue_script('cha-custom-js', get_template_directory_uri() . '/assets/js/script-cha.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'cha_enqueue_assets');

// Register navigation menus
function cha_register_menus() {
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'cha-cambodia'),
    ));
}
add_action('init', 'cha_register_menus');

