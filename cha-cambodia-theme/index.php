&lt;?php get_header(); ?&gt;
&lt;div class="container"&gt;
    &lt;h1&gt;&lt;?php the_title(); ?&gt;&lt;/h1&gt;
    &lt;?php while ( have_posts() ) : the_post(); ?&gt;
        &lt;?php the_content(); ?&gt;
    &lt;?php endwhile; ?&gt;
&lt;/div&gt;
&lt;?php get_footer(); ?&gt;
