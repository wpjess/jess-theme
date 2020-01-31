<?php get_header(); ?>

	<article id="content">


		<?php if (have_posts()) : ?>

		 <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<?php /* If this is a category archive */ if (is_category()) { ?>				
		<h4>Archive Of The Category &#8216;<?php echo single_cat_title(); ?>&#8216; </h4>
		
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h4>Daily Archive Of <?php the_time('j. F Y'); ?></h4>
		
	 <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h4>Monthly Archive Of <?php the_time('F Y'); ?></h4>

		<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h4>Yearly Archive Of <?php the_time('Y'); ?></h4>
				
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h4>Author Archive</h4>

		<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>

		<?php } ?>

<div>&nbsp;</div>
<div>&nbsp;</div>
		

		<?php $first = 1; while (have_posts()) : the_post(); ?>

		<div class="post">
				<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h1>
				
				
				<div class="entry">
				<?php the_content(); ?>	
				</div>
		
				
<p class="postmetadata"><?php the_time(__('d. F Y','relaxation')) ?> | <?php the_category(', ') ?> <!--| <a href="<?php trackback_url(true); ?>" rel="Trackback"> Trackback-Url</a> -->| <?php comments_popup_link(__('Comments (0)','relaxation'), __('Comments (1)','relaxation'), __('Comments (%)','relaxation')); ?> </p>

			</div>
	
		<?php endwhile; ?>

<div class="pagenavigation2">
<div class="alignleft"><?php next_posts_link('&laquo; Newer Posts') ?></div>
<div class="alignright"><?php previous_posts_link('Previous Posts &raquo;') ?></div>
</div>
	
	<?php else : ?>

		<h2 class="center">Nothing Found</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		
	</article>

</div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
