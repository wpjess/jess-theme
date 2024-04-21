<?php
/*
Template Name: Home
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
	<div class="header-image-full clearfix">
		<img src="<?php echo $image; ?>" alt="<?php the_title(); ?>" title="" />
		<span class="header-image-caption"><?php echo stripslashes($caption); ?></span>
	</div>
<?php } ?>

	<div class="page-copy home-page wrapper clearfix">
		<?php the_content(); ?>
	</div>

		<div class="home-squares clearfix">
			<div class="square">
				<a href="<?php bloginfo("template_directory") ?>/images/resume.pdf">
				<img src="<?php bloginfo("template_directory") ?>/images/icon1.png" alt="" title=""  /></a>
				<h2>One</h2>
				<span>Pellentesque habitant morbi tristique</span>
				<a href="<?php bloginfo("template_directory") ?>/images/file.pdf" class="button">Learn More</a>
			</div>
			<div class="square">
				<a href="<?php echo get_option('home'); ?>/creative/">
				<img src="<?php bloginfo("template_directory") ?>/images/icon2.png" alt="" title=""  /></a>
				<h2>Two</h2>
				<span>Pellentesque habitant morbi tristique</span>
				<a href="<?php echo get_option('home'); ?>/blog/" class="button">Take A Look</a>
			</div>
			<div class="square">
				<a href="<?php echo get_option('home'); ?>/thinking/">
				<img src="<?php bloginfo("template_directory") ?>/images/icon3.png" alt="" title=""  /></a>
				<h2>Three</h2>
				<span>Pellentesque habitant morbi tristique</span>
				<a href="<?php echo get_option('home'); ?>/contact-us/" class="button">Read Up</a>
			</div>
	</div>

<?php endwhile; endif; ?>
</div>

<?php get_footer(); ?>