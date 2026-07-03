
def extract_assets():
    with open('index.html', 'r', encoding='utf-8') as f:
        content = f.read()

    # Extract CSS between first <style> and </style>
    css_start = content.find('<style>')
    css_end = content.find('</style>', css_start)
    if css_start != -1 and css_end != -1:
        css_content = content[css_start + 7 : css_end].strip()
        with open('wordpress-assets/style-cha.css', 'w', encoding='utf-8') as f:
            f.write(css_content)
        print("Extracted CSS successfully!")

    # Extract all JS between <script> tags (excluding any src attributes)
    # Find all script blocks without src attribute
    import re
    script_blocks = re.findall(r'<script[^>]*>([\s\S]*?)</script>', content)
    full_js = '\n'.join(block.strip() for block in script_blocks if block.strip())
    if full_js:
        with open('wordpress-assets/script-cha.js', 'w', encoding='utf-8') as f:
            f.write(full_js)
        print("Extracted JS successfully!")

if __name__ == '__main__':
    extract_assets()

