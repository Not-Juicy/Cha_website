
def extract_header_footer_main():
    with open('index.html', 'r', encoding='utf-8') as f:
        content = f.read()
        
    # Extract header content
    header_start = content.find('&lt;header class="site-header"')
    header_end = content.find('&lt;/header&gt;', header_start) + len('&lt;/header&gt;')
    header_content = content[header_start:header_end]
    # Also include mobile drawer since it's part of header functionality
    mobile_drawer_start = content.find('&lt;div class="mobile-drawer"')
    mobile_drawer_end = content.find('&lt;/div&gt;', content.find('&lt;/div&gt;', mobile_drawer_start)+6) + 6
    mobile_drawer = content[mobile_drawer_start:mobile_drawer_end]
    
    full_header = '''&lt;!DOCTYPE html&gt;
&lt;html &lt;?php language_attributes(); ?&gt;&gt;
&lt;head&gt;
    &lt;meta charset="&lt;?php bloginfo('charset'); ?&gt;"&gt;
    &lt;meta name="viewport" content="width=device-width, initial-scale=1"&gt;
    &lt;title&gt;&lt;?php wp_title('|', true, 'right'); ?&gt;&lt;/title&gt;
    &lt;?php wp_head(); ?&gt;
&lt;/head&gt;
&lt;body &lt;?php body_class(); ?&gt;&gt;
&lt;?php wp_body_open(); ?&gt;
'''+ header_content + '\n' + mobile_drawer + '\n&lt;main id="main"&gt;\n'

    with open('cha-cambodia-theme/header.php', 'w', encoding='utf-8') as f:
        f.write(full_header)
    print('Created header.php')
    
    # Extract footer content
    footer_start = content.find('&lt;footer class="site-footer"')
    footer_end = content.find('&lt;/footer&gt;', footer_start) + len('&lt;/footer&gt;')
    footer_content = content[footer_start:footer_end]
    full_footer = '''&lt;/main&gt;
'''+footer_content +'''
&lt;?php wp_footer(); ?&gt;
&lt;/body&gt;
&lt;/html&gt;
'''
    
    with open('cha-cambodia-theme/footer.php', 'w', encoding='utf-8') as f:
        f.write(full_footer)
    print('Created footer.php')
    
    # Extract front-page content (between header and footer)
    main_content_start = content.find('&lt;main id="main"&gt;') + len('&lt;main id="main"&gt;')
    main_content_end = footer_start
    front_page_content = content[main_content_start:main_content_end]
    full_front_page = '''&lt;?php get_header(); ?&gt;
''' + front_page_content + '''
&lt;?php get_footer(); ?&gt;
'''
    with open('cha-cambodia-theme/front-page.php', 'w', encoding='utf-8') as f:
        f.write(full_front_page)
    print('Created front-page.php')
    
    # Create other page templates from web/ files
    for page in ['patient-card', 'privacy', 'disclaimer']:
        page_file = f'web/{page}.html'
        with open(page_file, 'r', encoding='utf-8') as f:
            page_content = f.read()
        # Extract main content for each page
        page_main_start = page_content.find('&lt;main')
        page_main_end = page_content.find('&lt;/main&gt;', page_main_start) + len('&lt;/main&gt;')
        page_main = page_content[page_main_start:page_main_end]
        page_template = '''&lt;?php
/*
Template Name: CHA '''+ page.replace('-',' ').title() +''' Page
*/
get_header(); ?&gt;
''' + page_main + '''
&lt;?php get_footer(); ?&gt;
'''
        template_file = f'cha-cambodia-theme/page-{page}.php'
        with open(template_file, 'w', encoding='utf-8') as f:
            f.write(page_template)
        print(f'Created page-{page}.php')
        
    # Create index.php (default fallback)
    index_content = '''&lt;?php get_header(); ?&gt;
&lt;div class="container"&gt;
    &lt;h1&gt;&lt;?php the_title(); ?&gt;&lt;/h1&gt;
    &lt;?php while ( have_posts() ) : the_post(); ?&gt;
        &lt;?php the_content(); ?&gt;
    &lt;?php endwhile; ?&gt;
&lt;/div&gt;
&lt;?php get_footer(); ?&gt;
'''
    with open('cha-cambodia-theme/index.php', 'w', encoding='utf-8') as f:
        f.write(index_content)
    print('Created index.php')
    
extract_header_footer_main()
