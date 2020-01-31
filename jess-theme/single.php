<?php get_header(); ?>
<article <?php post_class() ?> id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
	$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="post">
<?php if($image == '') { } else { ?>
<img src="<?php echo $image; ?>" alt="" />
<?php } ?>
<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>
<div class="entrytext">

<?php the_content(); ?>

<div class="navigation">
<div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
<div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
</div>

<?php comments_template(); ?>

</div>
</div>
<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</article>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>