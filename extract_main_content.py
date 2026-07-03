
import re

with open('index.html', 'r', encoding='utf-8') as f:
    content = f.read()

# Find the main content area - let's look for opening <main tag
main_start_match = re.search(r'<main[^>]*>', content)
if main_start_match:
    main_start = main_start_match.end()
else:
    main_start = content.find('<!-- Hero Section -->')

footer_start = content.find('<footer class="site-footer"')

# Extract everything between main and footer
main_content = content[main_start : footer_start]

# Now update all image paths
# Replace web/images/ and images/ with our WordPress path
main_content = re.sub(
    r'src="(?:web/)?images/([^"]+)"',
    r'src="<?php echo get_template_directory_uri(); ?>/assets/images/\1"',
    main_content
)

# Also replace any hard coded URLs
main_content = re.sub(
    r'src="https?://[^/]+/[^"]*/([^"]+\.(?:jpg|jpeg|png|gif|svg))"',
    r'src="<?php echo get_template_directory_uri(); ?>/assets/images/\1"',
    main_content
)

# Create front-page.php
front_page_content = '''<?php get_header(); ?>
''' + main_content + '''
<?php get_footer(); ?>'''

with open('cha-cambodia-theme/front-page.php', 'w', encoding='utf-8') as f:
    f.write(front_page_content)

print("front-page.php created successfully!")
