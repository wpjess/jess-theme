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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@200;300;400;700&display=swap" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"> 


<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/mobile-menu/css/jquery.fatNav.min.css">

<?php wp_head(); ?>

</head>

<?php 
	global $post;
	$slug = get_post( $post )->post_name; 
?>

<body <?php if(is_front_page()) { ?>id="page-home"<?php } ?> class="<?php echo $slug; ?>">
<div id="page">
<header id="header">

	<div class="clearfix">
		<a href="<?php echo get_option('home'); ?>/"><img src="<?php bloginfo("template_directory") ?>/images/logo.png" alt="" title="" id="logo"  /></a>
	
	<nav id="menu" class="clearfix">
	<ul class="sf-menu">
		<?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 3, 'container' => false)); ?>
	</ul>
	</nav>

	<a href="javascript:void(0)" class="hamburger"><div class="hamburger__icon"></div></a>
	<div class="fat-nav">
        <div class="fat-nav__wrapper">
            <ul>
                <?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 3, 'container' => false)); ?>
                <li><a href="https://www.instagram.com/jmichaelashland/" target="_blank">
		<img src="<?php bloginfo("template_directory") ?>/images/instagram.png" alt="" title="" /></a></li>
            </ul>
        </div>
    </div>
	</div>

</header>