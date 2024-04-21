<?php get_header(); ?>

	<div id="content">
		<div class="wrapper clearfix">

		<?php if (have_posts()) : $post = $posts[0];  ?>
		<?php if (is_category()) { ?>				
		<h1>Archive Of The Category &#8216;<?php echo single_cat_title(); ?>&#8216; </h1>
		
 	  	<?php } elseif (is_day()) { ?>
		<h1>Daily Archive Of <?php the_time('j. F Y'); ?></h1>
		
	 	<?php } elseif (is_month()) { ?>
		<h1>Monthly Archive Of <?php the_time('F Y'); ?></h1>

		<?php } elseif (is_year()) { ?>
		<h1>Yearly Archive Of <?php the_time('Y'); ?></h1>
				
	  	<?php } elseif (is_author()) { ?>
		<h1>Author Archive</h1>

		<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<?php } ?>

		<div>&nbsp;</div>
		<div>&nbsp;</div>

		<?php $first = 1; while (have_posts()) : the_post(); ?>

		<div class="post">
			<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>
				
			<div class="entry">
				<?php the_content(); ?>	
			</div>
		
			<p class="postmeta"><?php the_time(__('d. F Y')) ?> | <?php the_category(', ') ?> | <?php comments_popup_link(__('Comments (0)'), __('Comments (1)'), __('Comments (%)')); ?> </p>
		</div>
	
		<?php endwhile; ?>

		<div class="pagenav">
			<div class="alignleft"><?php next_posts_link('&laquo; Newer Posts') ?></div>
			<div class="alignright"><?php previous_posts_link('Previous Posts &raquo;') ?></div>
		</div>
	
	<?php else : ?>

		<h2 class="center">Nothing Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>
