<?
////////////////////////////////////////////////////////
/// MOBILE MENU - HAMBURGER THAT TURNS INTO X
////////////////////////////////////////////////////////

// FILES IN EXTRAS - MOBILE-MENU

// in header.php 

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/mobile-menu/css/jquery.fatNav.min.css">

<div class="fat-nav">
        <div class="fat-nav__wrapper">
            <ul>
                <?php wp_nav_menu(array('theme_location' => 'main_menu', 'depth' => 3, 'container' => false)); ?>
            </ul>
        </div>
    </div>

<?php
// in footer.php
<script type="text/javascript" src="<?php bloginfo("template_directory") ?>/js/mobile-menu/js/jquery.fatNav.js"></script>
<script>
    (function() {
        $.fatNav();
    }());
</script>


////////////////////////////////////////////////////////////////////////
//	SOCIAL MEDIA ICONS FONT - http://www.socicon.com/how.php
////////////////////////////////////////////////////////////////////////


<link rel="stylesheet" href="https://d1azc1qln24ryf.cloudfront.net/114779/Socicon/style-cf.css?9ukd8d">



////////////////////////////////////////////////////////////////////////
//  FEATHERLIGHT POPUP
////////////////////////////////////////////////////////////////////////

<link href="<?php bloginfo('template_directory'); ?>/js/lightbox/featherlight.css" rel="stylesheet">
<script src="<?php bloginfo('template_directory'); ?>/js/lightbox/featherlight.js"></script>

<a href="#" data-featherlight="#inline">

<div style="display:none;">
<div id="inline">
Popup Content
</div>
</div>


////////////////////////////////////////////////////////////////////////
//	OWL CAROUSEL NEW
////////////////////////////////////////////////////////////////////////

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/carousel/owl.carousel.min.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/carousel/owl.theme.default.min.css">
<script src="<?php bloginfo('template_directory'); ?>/js/carousel/owl.carousel.js"></script>
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    items: 1,
    autoplay: true,
    animateOut: 'fadeOut'
});



////////////////////////////////////////////////////////////////////////
// 	OWL CAROUSEL  OLD
////////////////////////////////////////////////////////////////////////


<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/carousel/owl.carousel.css">
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/carousel/owl.theme.css">

<script src="<?php bloginfo('template_directory'); ?>/js/carousel/owl.carousel.js"></script>
<script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                margin: 0,
                nav: true,
                loop: true,
				items: 1
              })
            })
         </script>
		 
 <div class="owl-carousel owl-theme">
	<div class="item">First Slide</div>
	<div class="item">Second Slide</div>
	<div class="item">Third Slide</div>
 </div>

////////////////////////////////////////////////////////////////////////
//	EQUAL HEIGHT DIVS
////////////////////////////////////////////////////////////////////////
?>

<script type="text/javascript" language="javascript" charset="utf-8" src="<?php bloginfo('template_directory'); ?>/js/equalheight.js"></script>

<? 
////////////////////////////////////////////////////////////////////////
//	LIGHTBOX	
////////////////////////////////////////////////////////////////////////
?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/lightbox/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/lightbox/jquery.fancybox.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
			$('a[href$="jpg"], a[href$="png"], a[href$="jpeg"]').fancybox();  
		});
</script>


<?
////////////////////////////////////////////////////////////////////
//  TOGGLE SHORTCODE
////////////////////////////////////////////////////////////////////
?>
<script src="<?php bloginfo('template_directory'); ?>/js/accordion.js"></script>
<script>
  $(document).ready(function() {
            $('.accordion').accordion(); //some_id section1 in demo
        });
 </script>
 
 <div class="accordion" id="nav-section1">Section Header<span></span></div>
	<div>Toggle stuff here</div>
</div>
 
 
/********************  ACCORDION TOGGLE  ***********************/

 .accordion {
        margin: 0;
        padding:0px;
		cursor:hand;
		cursor:pointer;
    }
  .accordion:hover { color:#000; }
    .accordion-open {
		color:#000;
    }
    .accordion-open span {
        display:block;
        float:left;
        padding:10px;
		padding-left:0;
		margin-right:3px;
    }
    .accordion-open span {
        background:url(images/minus.png) center center no-repeat;
    }
    .accordion-close span {
        display:block;
        float:left;
        background:url(images/plus.png) center center no-repeat;
        padding:10px;
		padding-left:0;
		margin-right:3px;
    }
    div.container {
        padding:0;
        margin:0;
    }
 
 
 <?
 
 ////////////////////////////////////////////////////////////////////////
 //	BETTER SHRINKING HEADER
 ////////////////////////////////////////////////////////////////////////

 <script>
$(function(){
 var shrinkHeader = 300;
  $(window).scroll(function() {
    var scroll = getCurrentScroll();
      if ( scroll >= shrinkHeader ) {
           $('.header').addClass('shrink');
        }
        else {
            $('.header').removeClass('shrink');
        }
  });
function getCurrentScroll() {
    return window.pageYOffset;
    }
});
</script>

.header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background: #fff;
    color:#fff;
    z-index: 1000;
    height: 170px;
    overflow: hidden;
    -webkit-transition: height 0.3s;
    -moz-transition: height 0.3s;
    transition: height 0.3s;
    text-align:center;
	-moz-box-shadow: 0px 4x 10px #ccc;
	-webkit-box-shadow: 0px 4px 10px #ccc;
	box-shadow: 0px 4px 10px #ccc;

}
.header.shrink {
    height: 100px;
    line-height:80px;
}
.header #logo
{
    padding:55px 0 0;
    -webkit-transition: all 0.3s;
    -moz-transition: all 0.3s;
    transition: all 0.3s;
}

.header.shrink #logo
{
   padding:20px 0 0;
}

<?
////////////////////////////////////////////////////////////////////////
//  SHRINKING HEADER WHEN SCROLLING DOWN
////////////////////////////////////////////////////////////////////////

<script src="<?php bloginfo('template_directory'); ?>/js/classie.js"></script>
<script>
    function init() {
        window.addEventListener('scroll', function(e){
            var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                shrinkOn = 140,
                header = document.querySelector("#header");
            if (distanceY > shrinkOn) {
                classie.add(header,"smaller");
            } else {
                if (classie.has(header,"smaller")) {
                    classie.remove(header,"smaller");
                }
            }
        });
    }
    window.onload = init();
</script>


#header { 	
	height:90px;
	-webkit-transition: all 0.7s ease-in-out;
    -moz-transition: all 0.7s ease-in-out;
    -ms-transition: all 0.7s ease-in-out;
    -o-transition: all 0.7s ease-in-out;
    transition: all 0.7s  ease-in-out;
    -webkit-backface-visibility: hidden;
	z-index:9999;
}
#header.smaller { height:55px; }


////////////////////////////////////////////////////////////////////////
//	SCROLL TO ANCHOR ON PAGE - with offset
////////////////////////////////////////////////////////////////////////

$(document).ready(function(){
	$('a[href^="#"]').on('click',function (e) {
	    e.preventDefault();

	    var target = this.hash;
	    var $target = $(target);

	    $('html, body').stop().animate({
	        'scrollTop': $target.offset().top - 100
	    }, 900, 'swing', function () {
	        window.location.hash = target;
	    });
	});
});


////////////////////////////////////////////////////////////////////////
// TABBED CONTENT AREA
////////////////////////////////////////////////////////////////////////

<script>
$(document).ready(function() {
    $(".tabs-menu a").click(function(event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
</script>

.tab {
    border: 1px solid #d4d4d1;
    background-color: #fff;
    float: left;
    margin-bottom: 20px;
    width: auto;
}

.tab-content {
    width: 660px;
    padding: 20px;
    display: none;
}

#tab-1 {
 display: block;   
}


<div id="tabs-container">
    <ul class="tabs-menu">
        <li class="current"><a href="#tab-1">Tab 1</a></li>
        <li><a href="#tab-2">Tab 2</a></li>
    </ul>
    <div class="tab">
        <div id="tab-1" class="tab-content">
            <p>Lorem ipsum dolor</p>
        </div>
        <div id="tab-2" class="tab-content">
            <p>Donec semper dictum sem</p>
        </div>
	</div>
</div>

////////////////////////////////////////////////////////////
//  AJAX SUBMIT FORM
////////////////////////////////////////////////////////////
?>
<script type="text/javascript">
$('#connection').submit(function (event) {   // the id of the form
        $.post('wmdformmailer.php', $(this).serialize(),
            function(data) {
                $('#msg').html(data);
            }
        );
		 event.preventDefault();
		 });
		 
		 
		 $.ajaxSetup({
        beforeSend:function(){
            // show loading image
           // $("#ajaxLoading").show();
        },
        complete:function(){
            $(".panel2").fadeOut("slow");
			$(".panel3").css("cssText", "display:block !important;");
        }
    });
</script>


<?
///////////////////////////////////////////////////////////
///////////////     DZS CONTENT SCROLLER  /////////////////
///////////////////////////////////////////////////////////

?>

<!-- in header -->
<!-- content scroller -->
<link rel='stylesheet' type="text/css" href="<?php bloginfo('template_directory'); ?>/js/dzs-scroller/advancedscroller/plugin.css"/>

<!-- in footer -->
<!-- scrolling content boxes -->
<script src="<?php bloginfo('template_directory'); ?>/js/dzs-scroller/advancedscroller/plugin.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function($){
        $("#as1").advancedscroller({
            settings_swipe: "on"
            ,design_arrowsize: "40"
            });
        $("#as2").advancedscroller({
            settings_mode: "onlyoneitem"
            ,design_arrowsize: "0"
            ,settings_swipe: "on"
            ,settings_swipeOnDesktopsToo: "on"
            ,settings_slideshow: "on"
            ,settings_slideshowTime: "3"
            });
});
</script>

<!-- in theme files -->
<div class="demo-mastercon">
    <div class="advancedscroller-con">
        <div id="as1" class="advancedscroller" style="width:100%;">
            <ul class="items">
			<?php $paged=(get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>products, 'product-category' => 'featured', 'showposts'=>50, 'posts_per_page' => 1, 'caller_get_posts' => 1, 'paged' => $paged )); ?>
			<?php if (have_posts()) :  $count = 1; while (have_posts()) : the_post(); ?>
			<? $prod_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
            <li class="item-tobe">
                <img class="fullwidth" src="<?php echo $prod_image; ?>"/>
                <div class="name"><?php the_title(); ?></div>
                <div class="price"><span class="real-price">$899.99</span></div>
                <div class="addtocart-con">
                <div class="button-addtocart">ADD TO CART</div>
                </div>
            </li>
			<?php endwhile; endif; wp_reset_query(); ?>
			</ul>
		</div>
	</div>
</div>





<?
///////////////////////////////////////////////////////////
//////////////////     ROYAL SLIDER    ///////////////////////
///////////////////////////////////////////////////////////

?>

<!-- in header -->
<meta name="viewport" content="width = device-width, initial-scale = 1.0" />
<link class="rs-file" href="<?php bloginfo('template_directory'); ?>/js/royalslider/royalslider.css" rel="stylesheet">
<link class="rs-file" href="<?php bloginfo('template_directory'); ?>/js/royalslider/skins/minimal-white/rs-minimal-white.css" rel="stylesheet">

<!-- in footer -->
 <script class="rs-file" src="<?php bloginfo('template_directory'); ?>/js/royalslider/jquery.royalslider.min.js"></script>
 <script id="addJS">jQuery(document).ready(function($) {
  $('#full-width-slider').royalSlider({
    arrowsNav: true,
    loop: false,
    keyboardNavEnabled: true,
    controlsInside: false,
    imageScaleMode: 'fill',
    arrowsNavAutoHide: false,
    autoScaleSlider: true, 
    autoScaleSliderWidth: 960,     
    autoScaleSliderHeight: 350,
    controlNavigation: 'bullets',
    thumbsFitInViewport: false,
    navigateByClick: true,
    startSlideId: 0,
    autoPlay: false,
    transitionType:'move',
    globalCaption: false,
    deeplinking: {
      enabled: true,
      change: false
    },
    /* size of all images http://help.dimsemenov.com/kb/royalslider-jquery-plugin-faq/adding-width-and-height-properties-to-images */
    imgWidth: 1400,
    imgHeight: 680
  });
});
</script>
	

<!-- in theme files -->
<div class="sliderContainer fullWidth clearfix">
<div id="full-width-slider" class="royalSlider heroSlider rsMinW">
  <div class="rsContent">
    <img class="rsImg" src="../img/full-width/1.jpg" alt="" />
    <div class="infoBlock infoBlockLeftBlack rsABlock" data-fade-effect="" data-move-offset="10" data-move-effect="bottom" data-speed="200">
      <h4>This is an animated block, add any number of them to any type of slide</h4>
      <p>Put completely anything inside - text, images, inputs, links, buttons.</p>
    </div>
  </div>
 </div>
</div>



<?

///////////////////////////////////////////////////////////
///////////////  NIVO SLIDER SLIDESHOW ////////////////////
///////////////////////////////////////////////////////////

?>

<!-- in header or footer -->
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/nivo/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/nivo/nivo-slider.css" type="text/css" media="screen" />
 
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/nivo/jquery.nivo.slider.js"></script>

<script type="text/javascript">
  $(window).load(function() {
        $('#slider').nivoSlider({
        animSpeed:900,
        pauseTime:4000,
        startSlide:0,
		effect: 'fade',
        directionNav:true,
        directionNavHide:true,
        controlNav:true,
        controlNavThumbs:false,
        controlNavThumbsFromRel:true,
        keyboardNav:true,
        pauseOnHover:false,
        manualAdvance:false,
        //lastSlide: function(){primary.vars.stop = true;}
    });
	
    });
</script>


<!-- in theme files -->

<div id="slideshow">
<div class="slider-wrapper theme-default">
            <div class="ribbon"></div>
            <div id="slider" class="nivoSlider">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
		<?
		global $post;
		$thumbnail_ID = '';//get_post_thumbnail_id();
		$images = get_children(array('post_parent' => $post->ID,
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order ID'));
		if ($images) :
			echo '';
		foreach ($images as $attachment_id => $image) :
		if ( $image->ID != $thumbnail_ID ) :
			$img_title = $image->post_title;   // title.
			$img_caption = $image->post_excerpt; // caption.
			$img_description = $image->post_content; // description.
			$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt
			if ($img_alt == '') : $img_alt = $img_title; endif; 
			$big_array = image_downsize( $image->ID, 'slideshow' );
	 		$img_url = $big_array[0];
			?>
 
			<img src="<?php echo $img_url; ?>" alt="" title="" />
 
		<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		<?php endwhile; endif; ?>
            </div>
        </div>
</div>

<?



///////////////////////////////////////////////////////////
//////////////////     SLIDES.JS    ///////////////////////
///////////////////////////////////////////////////////////

?>

<!-- in header or footer -->
<script src="<?php bloginfo('template_directory'); ?>/js/slides/slides.min.jquery.js"></script>
	<script>
		$(function(){
			$('#slides').slides({
				preload: true,
				generateNextPrev: true
			});
		});
	</script>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/slides/css/global.css" type="text/css" media="screen" />



<!-- in theme files -->
<div id="slides">
	<div class="slides_container">	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>		
		<?
		global $post;
		$thumbnail_ID = '';//get_post_thumbnail_id();
		$images = get_children(array('post_parent' => $post->ID,
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order ID'));
		if ($images) :
			echo '';
		foreach ($images as $attachment_id => $image) :
		if ( $image->ID != $thumbnail_ID ) :
			$img_title = $image->post_title;   // title.
			$img_caption = $image->post_excerpt; // caption.
			$img_description = $image->post_content; // description.
			$img_alt = get_post_meta($attachment_id, '_wp_attachment_image_alt', true); //alt
			if ($img_alt == '') : $img_alt = $img_title; endif; 
			$big_array = image_downsize( $image->ID, 'slideshow' );
	 		$img_url = $big_array[0];
			?>
 
			<div>
				<h1>Slide 1</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
				<img src="<?php echo $img_url; ?>" alt="" title="" />
			</div>
 
		<?php endif; ?>
		<?php endforeach; ?>
		<?php endif; ?>
		<?php endwhile; endif; ?>
	</div>
</div>



<?
///////////////////////////////////////////////////////////
/////////  SLIDESHOW WITH CAROUSEL THUMBS /////////////////
/////////   A LA ANIMAL MEDICAL HOSPITAL  /////////////////
///////////////////////////////////////////////////////////
?>


<!-- in header -->
<link type="text/css" href="<?php bloginfo('template_directory'); ?>/js/slideshow-thumbnails/bottom.css" rel="stylesheet" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/slideshow-thumbnails/jquery.pikachoose.js"></script>
		<script language="javascript">
			$(document).ready(
				function (){
					$("#pikame").PikaChoose({carousel:true,carouselVertical:false,thumbOpacity: 1,showCaption: true,});
				});
		</script>


<!-- in theme -->
<!-- pulls images from those uploaded to the page -->
<div class="pikachoose">		  
	<ul id="pikame" class="jcarousel-skin-pika">
	<?php
	$args = array( 'post_type' => 'attachment',  'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post_mime_type' => 'image' ,'post_status' => null, 'post_parent' => $post->ID ); 
	$attachments = get_posts($args);
	if ($attachments) {
	foreach ( $attachments as $attachment ) { ?>
		<?php
			$img_title = $attachment->post_title;   // title.
			$img_caption = $attachment->post_excerpt; // caption.
			$img_description = $attachment->post_content; // description.
		?>
		<li><img src="<?php echo wp_get_attachment_url( $attachment->ID , 'header' ); ?>" alt="" class="gallery-image" /><span><?php echo esc_html( $attachment->post_title ); ?></span></li>
	<?php	}
			} ?>	
	</ul>
</div>



<?





//////////////////////////////////////////////////////////////
////////////   SCROLLING CONTENT ALA DEBRA TURNER  ///////////
//////////////////////////////////////////////////////////////
?>

<!-- in the header or footer -->
<link type="text/css" href="<?php bloginfo('template_directory'); ?>/js/newscroll/style/jquery.jscrollpane.css" rel="stylesheet" media="all" />

<link type="text/css" href="<?php bloginfo('template_directory'); ?>/js/newscroll/style/jquery.jscrollpane.lozenge.css" rel="stylesheet" media="all" />
<!-- the styles for the lozenge theme -->

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/newscroll/jquery.mousewheel.js"></script>
		
<!-- the jScrollPane script -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/newscroll/jquery.jscrollpane.min.js"></script>

		<script type="text/javascript">
			$(function()
			{
				// this initialises the demo scollpanes on the page.

				$('.scroll-pane').jScrollPane({ 
					showArrows: true,
					arrowScrollOnHover: false
				});
				$('.scroll-pane-small').jScrollPane({ 
					showArrows: true,
					arrowScrollOnHover: false
				});
			
			}); 
			</script>



<!-- in theme files -->
<div id="scroll-wide">
<div id="pane1" class="scroll-pane-small">
<div id="summary-copy"><?php the_content(); ?></div>
</div>
</div>



<?

////////////////////////////////////////////////////////////
/////////////////  ACCORDION DIVS //////////////////////////
////////////////  ALA BROTHERS RESTAURANT //////////////////
////////////////////////////////////////////////////////////
?>

<!-- in the head or footer -->
<script type="text/javascript">
$(document).ready(function() {
$('div.demo-show2:eq(0) > div').hide();
$('div.demo-show2:eq(0) > h4').click(function() {

$(this).next('div').slideToggle('slow')
.siblings('div:visible').slideUp('slow');

// for styling the moving arrows 
$(this).addClass('arrow-down')
.siblings('h4').removeClass('arrow-down');

});

$("h4").toggle(function(){
		$(this).addClass("arrow-down");
		}, function () {
		$(this).removeClass("arrow-down");
	});

});
</script>



<!-- in the theme files -->

<div class="demo-show2">

<h4>Omelettes</h4>
<div class="news_text">
<?php $paged=(get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>brothers_menu,'menu-categories' => 'omelettes','showposts'=>1, 'posts_per_page' => 1, 'caller_get_posts' => 1, 'paged' => $paged )); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php rewind_posts(); ?>
</div>

<h4>Eggs</h4>
<div class="news_text">
<?php $paged=(get_query_var('paged')) ? get_query_var('paged') : 1; query_posts(array('post_type'=>brothers_menu,'menu-categories' => 'omelettes','showposts'=>1, 'posts_per_page' => 1, 'caller_get_posts' => 1, 'paged' => $paged )); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php the_content(); ?>
<?php endwhile; endif; ?>
<?php rewind_posts(); ?>
</div>




<?



/////////////////////////////////////////////////////////
////////////  FANCY BOX LIGHTBOX WINDOW   ///////////////
////////////     ALA LAMY CONSULTING         ////////////
/////////////////////////////////////////////////////////
?>

<!-- in header or footer -->
<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/js/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/fancybox/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox").fancybox({
		maxWidth	: 680,
		maxHeight	: 1200,
		fitToView	: false,
		width		: '70%',
		height		: '90%',
		autoSize	: false,
		closeClick	: false,
		openEffect	: 'none',
		closeEffect	: 'none'
	});
	});
</script>

<!-- or change it to this to automatically make gallery thumbnails into lightboxes -->
$(".gallery-icon a").fancybox


<!-- in theme files -->
<a class="fancybox" href="1_b.jpg" data-fancybox-group="gallery" title="Lorem ipsum dolor sit amet"><img src="1_s.jpg" alt="" /></a>

<a class="fancybox" href="2_b.jpg" data-fancybox-group="gallery" title="Etiam quis mi eu elit temp"><img src="2_s.jpg" alt="" /></a>




<?




////////////////////////////////////////////////////////////////////
/////////////////   MAX IMAGE BACKGROUND PHOTO  ////////////////////
////////////////////////////////////////////////////////////////////

?>

<!-- in header or footer -->
<script src="<?php bloginfo('template_directory'); ?>/js/max/lib/js/jquery.cycle.all.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/max/lib/js/jquery.maximage.min.js" type="text/javascript" charset="utf-8"></script>


<!-- single image background.  In theme files -->
<div id="maximage">
		<div>
		<img src="<?php bloginfo('template_directory'); ?>/images/2.jpg" alt="" />
		</div>
</div>


<!-- multi image background slideshow.  In theme files -->

<div id="arrows">
<a href="" id="arrow_left"><img src="<?php bloginfo('template_directory'); ?>/js/max/lib/images/demo/arrow_left.png" alt="Slide Left" width="58" height="97" /></a>
<a href="" id="arrow_right"><img src="<?php bloginfo('template_directory'); ?>/js/max/lib/images/demo/arrow_right.png" alt="Slide Right" width="58" height="97" /></a>
</div>

	<img id="cycle-loader" src="<?php bloginfo('template_directory'); ?>/js/max/lib/images/ajax-loader.gif" alt="" title="" />
		<div id="maximage">
			
			<img src="<?php bloginfo('template_directory'); ?>/images/1.jpg" alt="" title="" />
			<img src="<?php bloginfo('template_directory'); ?>/images/2.jpg" alt="" title="" />
			
			<div>
			<img src="<?php bloginfo('template_directory'); ?>/js/max/lib/images/demo/man.jpg" alt="" title="" />
				<div class="in-slide-content" style="display:none;">
					<p>Image Caption</p>
				</div>
			</div>
		</div>

		
<?




///////////////////////////////////////////////////////////////////////
//////////////////   SUPERFISH DROP DOWN MENU  ////////////////////////
///////////////////////////////////////////////////////////////////////

?>

<!-- in header or footer -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/superfish.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/hoverintent.js"></script>
<script type="text/javascript">
jQuery(function(){
jQuery('ul.sf-menu').superfish({
    speed      : 200
});
});
</script>


<!-- in theme files.  Automatic menu -->
<ul class="sf-menu">
<?php wp_list_pages('depth=3&title_li='); ?>
</ul>


<!-- in theme files.  Wordpress controlled menu -->
<?php wp_nav_menu(array('theme_location' => 'main_navigation', 'depth' => 3, 'container' => false, 'menu_class' => 'sf-menu')); ?>

<!-- in functions.php for controlled menu -->
<?
register_nav_menus( array(
	'main_menu' => 'Main Menu',
) );

function wpb_first_and_last_menu_class($items) {
    $items[1]->classes[] = 'first';
    $items[count($items)]->classes[] = 'last';
    return $items;
}
add_filter('wp_nav_menu_objects', 'wpb_first_and_last_menu_class');




////////////////////////////////////////////////////////////////////
////////////////////////   STICKY HEADER  //////////////////////////
//////////////////  http://jsbin.com/omanut/2   ////////////////////
?> 

<!-- style -->
  .fixed {
    position: fixed;
    top: 0;
  }
  .sticky {
    width: 100%;
    background: #F6D565;
    padding: 25px 0;
    text-transform: uppercase;
  }
  
  

<!-- in header or footer -->
<script>
var sticky = document.querySelector('.sticky');
var origOffsetY = sticky.offsetTop;

function onScroll(e) {
  window.scrollY >= origOffsetY ? sticky.classList.add('fixed') :
                                  sticky.classList.remove('fixed');
}

document.addEventListener('scroll', onScroll);
</script>



<!-- in theme files -->
<div class="sticky"><h3>Super amazing header</h3></div>






<?
//////////////////////////////////////////////////////////////
/////////////   JQUERY POPUP ONLOAD WITH COOKIE  /////////////
?>

<!-- in theme files -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.cookie.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
	if($.cookie("modal") != 'true') {
		var date = new Date();
		var minutes = 30;
		date.setTime(date.getTime() + (minutes * 60 * 1000));
        $("#inline").fancybox().trigger('click');
		$.cookie("modal", "true", { path: '/', expires: date });  
	}
   });
</script>



<!-- popup window -->
<div id="data" style="display:none; width:700px; text-align:left; overflow:hidden;">

<p style="color:#FFA649; font-weight:bold; font-size:14px; text-align:center;">Looking for the Oasis Cancun, the most popular Spring break hotel in Cancun?<br /><span style="font-size:23px; font-weight:normal;">We have rooms!!!</span></p>

</div>
<!-- end popup window -->
	
<?php
	
////////////////////////////////////////////////////////////////////
//  wp simple galleries loop
////////////////////////////////////////////////////////////////////

?>

<?php global $post;
	$gallery = get_post_meta($post->ID, 'wpsimplegallery_gallery', true);?>
	<?php if($gallery == '') { } else { ?>
	<?php $gallery = (is_string($gallery)) ? @unserialize($gallery) : $gallery; ?>
	
	
	<div id="sidebar-slider" class="clearfix">
	<div class="liquid-slider"  id="side-slider">
	
	<? foreach ($gallery as $img) { 
	$img_title = $img; 
	$url = wp_get_attachment_image_src( $img_title, 'full' );?>
	<div class="slide-wrap">
	<a class="fancybox" href="<?php echo $url[0]; ?>" data-fancybox-group="gallery" ><img src="<?php echo $url[0]; ?>" alt="<?php the_title(); ?>" title=""   /></a>
	</div>
	<? } ?>
	
	</div>
	</div>
	
	<?php } ?>

?>