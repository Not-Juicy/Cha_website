
import os
import re

theme_dir = "cha-cambodia-theme"
files_to_update = [
    'header.php', 'footer.php', 'front-page.php',
    'page-patient-card.php',
    'page-privacy.php', 'page-disclaimer.php'
]

for file_name in files_to_update:
    file_path = os.path.join(theme_dir, file_name)
    if not os.path.exists(file_path):
        continue
        
    with open(file_path, 'r', encoding='utf-8') as f:
        content = f.read()
        
    # Replace web/images/... → get_template_directory_uri() . '/assets/images/...'
    content = re.sub(r'src="web/images/([^"]+)"', r'src="&lt;?php echo get_template_directory_uri(); ?&gt;/assets/images/\1"', content)
    # Replace images/... → get_template_directory_uri() . '/assets/images/...'
    content = re.sub(r'src="images/([^"]+)"', r'src="&lt;?php echo get_template_directory_uri(); ?&gt;/assets/images/\1"', content)
    # Also replace that old chacambodia.nexusfinance.asia URLs if present
    content = re.sub(r'src="http://chacambodia\.nexusfinance\.asia/wp-content/uploads/[^"]+/([^"]+)"', r'src="&lt;?php echo get_template_directory_uri(); ?&gt;/assets/images/\1"', content)
    
    with open(file_path, 'w', encoding='utf-8') as f:
        f.write(content)
        
    print(f"Updated image URLs in:", file_name)

print("Done updating image URLs!")
