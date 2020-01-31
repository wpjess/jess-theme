<?php
/*
Template Name: Home
*/
?>
<?php get_header(); ?>
<article id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post">
<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
<div class="entrytext">
<?php the_content(); ?>
</div>
</div>
<?php endwhile; endif; ?>
</article>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>