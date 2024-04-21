<?php get_header(); ?>
<div id="content">
	<div class="no-header-image"></div>
	<div class="page-copy wrapper clearfix">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php
	$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
?>
<div class="post">
<?php if($image == '') { } else { ?>
<img src="<?php echo $image; ?>" alt="" />
<?php } ?>
<h1 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h1>


<?php the_content(); ?>

<div class="pagenav clearfix" style="display:none;">
<div class="alignleft"><?php previous_post('&laquo; %','','yes') ?></div>
<div class="alignright"><?php next_post(' % &raquo;','','yes') ?></div>
</div>

<?php comments_template(); ?>


<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
</div>
</div>
<?php get_footer(); ?>