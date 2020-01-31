<?php get_header(); ?>
<div id="content">
<div class="wrapper clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="post">
<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>


<div class="entry">
<?php the_excerpt() ?>
</div>

</div>

<?php endwhile; ?>
<div class="navigation clearfix">
<div class="alignleft half"><?php next_posts_link('&laquo; Newer Posts') ?></div>
<div class="alignright half"><?php previous_posts_link('Previous Posts &raquo;') ?></div>

</div>


<?php else : ?>
<h2><?php _e('Not found.','relaxation') ?></h2>
<?php include (TEMPLATEPATH . '/searchform.php'); ?>
<?php endif; ?>
</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>