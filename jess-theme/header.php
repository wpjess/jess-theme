<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> <?php } ?> <?php wp_title(); ?></title>

<meta name="viewport" content="width=device-width" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/images/favicon.ico">


<!-- all our JS is at the bottom of the page, except for Modernizr. -->
<script src="<?php bloginfo('template_directory'); ?>/js/modernizr.custom.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/detectizr.js"></script>

<?php wp_head(); ?>

</head>

<?php 
	global $post;
	$slug = get_post( $post )->post_name; 
?>

<body <?php if(is_front_page()) { ?>id="page-home"<?php } ?> class="<?php echo $slug; ?>">

<div id="page">
<header id="header">

	<div class="wrapper clearfix">
	<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo("template_directory") ?>/images/logo.png" alt="" title="" id="logo"  /></a>
	
	<nav id="menu" class="clearfix">
	<ul class="sf-menu">
	<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 3, 'container' => false)); ?>
	</ul>
	</nav>

	<div id="dl-menu" class="dl-menuwrapper">
		<button class="dl-trigger">Open Menu</button>
		<ul class="dl-menu">
			<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 3, 'container' => false)); ?>
		</ul>
	</div>
	</div>

</header>