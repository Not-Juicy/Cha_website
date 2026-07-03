
def create_template():
    import os
    
    # Read main index.html
    with open('index.html', 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Extract body content
    body_start = content.find('<body')
    body_start = content.find('>', body_start) + 1
    body_end = content.find('</body>')
    body_content = content[body_start : body_end].strip()
    
    # Create the WordPress page template header
    template_header = '''<?php
/*
Template Name: CHA Home Page
Description: Custom home page template for CHA website
*/

get_header();
?>

'''
    # Create the WordPress page template footer
    template_footer = '''

<?php
get_footer();
?>
'''
    
    # Now, we need to update all image paths!
    # Original paths are like "images/about-team.jpg" or "web/images/...", we'll need to make them easy to replace
    # We'll use a placeholder that tells the user to replace with their WordPress upload URLs
    # OR, for now, keep them as relative paths that can be updated later
    final_content = template_header + body_content + template_footer
    
    with open('wordpress-templates/page-cha-home.php', 'w', encoding='utf-8') as f:
        f.write(final_content)
    
    print("Created page-cha-home.php successfully!")
    
    # Now let's also create templates for other pages: patient-card, privacy, disclaimer
    for page_name in ['patient-card', 'privacy', 'disclaimer']:
        html_path = f'web/{page_name}.html'
        if os.path.exists(html_path):
            with open(html_path, 'r', encoding='utf-8') as f:
                page_content = f.read()
            b_start = page_content.find('<body')
            b_start = page_content.find('>', b_start) + 1
            b_end = page_content.find('</body>')
            page_body = page_content[b_start : b_end].strip()
            page_header = f'''<?php
/*
Template Name: CHA {page_name.replace("-", " ").title()} Page
Description: Custom {page_name.replace("-", " ")} page template
*/

get_header();
?>

'''
            page_final = page_header + page_body + template_footer
            output_path = f'wordpress-templates/page-cha-{page_name}.php'
            with open(output_path, 'w', encoding='utf-8') as f:
                f.write(page_final)
            print(f"Created {output_path}")
            
    # Now create instructions
    instructions = '''# CHA WordPress Integration Guide (Option 2: Custom Page Templates)

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
'''
    with open('wordpress-instructions.md', 'w', encoding='utf-8') as f:
        f.write(instructions)
    print("Created wordpress-instructions.md!")
    
if __name__ == '__main__':
    create_template()

