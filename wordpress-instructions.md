# CHA WordPress Integration Guide (Option 2: Custom Page Templates)

## Step 1: Upload Assets
- Upload all images from `images/` and `web/images/` to your WordPress Media Library
- Upload `wordpress-assets/style-cha.css` and `wordpress-assets/script-cha.js` to your WordPress theme directory

## Step 2: Add Custom Page Templates
- Copy the template files from `wordpress-templates/` to your WordPress theme directory
- Create new pages in WordPress and select the appropriate template from the "Page Attributes" → "Template" dropdown

## Step 3: Enqueue Assets in Functions.php
Add this to your theme's `functions.php` file:

```php
function cha_enqueue_assets() {
    // Enqueue CSS
    wp_enqueue_style( 'cha-style', get_template_directory_uri() . '/style-cha.css' );
    
    // Enqueue JS
    wp_enqueue_script( 'cha-script', get_template_directory_uri() . '/script-cha.js', array(), '1.0.0', true );
    
    // Add Google Fonts
    wp_enqueue_style( 'cha-google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Koulen:wght@400;700&family=Siemreap:wght@400&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'cha_enqueue_assets' );
```

## Step 4: Update Image URLs
- In your WordPress page templates, update all image `src` attributes to use the URLs from your Media Library

## Step 5: Test Your Pages
- Visit your new WordPress pages to make sure everything looks and works correctly!
