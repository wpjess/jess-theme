<?php
/*
Template Name: Landing Page
*/
?>
<?php get_header(); ?>
<div id="content">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
	$image = get_post_meta($post->ID, 'page_image', true);
	$bg = get_post_meta($post->ID, 'page_bg', true);
	$caption = get_post_meta($post->ID, 'caption', true);
?>
<?php if($image =='') { ?>
	<div class="no-header-image"></div>
<?php } else { ?>
	<div class="header-image clearfix">
		<div class="header-caption">
			<div class="header-table">
				<div class="header-cell">
					<?php echo stripslashes($caption); ?>
				</div>
			</div>
		</div>
		<div class="header-img">
			<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" title="" />
		</div>
	</div>
<?php } ?>

	<div class="page-copy wrapper clearfix">
	<?php the_content(); ?>
	</div>

<?php endwhile; endif; ?>

</div>

<?php get_footer(); ?>