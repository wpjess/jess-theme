<?php get_header(); ?>
<div id="content">
	<div class="no-header-image"></div>
	<div class="page-copy wrapper clearfix">

		<h1>Blog</h1>

		<?php if (have_posts()) : ?><?php $first = 1; while (have_posts()) : the_post(); ?>
		<div class="post">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<span class="date"><?php the_time('M, d, Y'); ?></span>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="button">Continue Reading</a>
		</div>

		<?php endwhile; ?>

		<div class="pagenav clearfix">
		<div class="alignleft"><?php next_posts_link('&laquo; Newer Posts') ?></div>
		<div class="alignright"><?php previous_posts_link('Previous Posts &raquo;') ?></div>
		</div>


		<?php else : ?>
		<h2 class="center"><?php _e('Nothing found.'); ?></h2>
		<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>