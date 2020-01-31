// Nivo Slider
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
	
	

// mobile menu 
$(function () {
      // TinyNav.js 1
      $('.sf-menu').tinyNav({
        active: 'selected',
        label: ''
      });

    });
	
	
	

// max background image
$(function(){
				$('#maximage').maximage({
					cycleOptions: {
						fx: 'fade',
						speed: 1000, // Has to match the speed for CSS transitions in jQuery.maximage.css (lines 30 - 33)
						timeout: 5000,
						prev: '#arrow_left',
						next: '#arrow_right',
						pause: 1,
						before: function(last,current){
							if(!$.browser.msie){
								// Start HTML5 video when you arrive
								if($(current).find('video').length > 0) $(current).find('video')[0].play();
							}
						},
						after: function(last,current){
							if(!$.browser.msie){
								// Pauses HTML5 video when you leave it
								if($(last).find('video').length > 0) $(last).find('video')[0].pause();
							}
						}
					},
					onFirstImageLoaded: function(){
						jQuery('#cycle-loader').hide();
						jQuery('#maximage').fadeIn('fast');
					}
				});
	
				// Helper function to Fill and Center the HTML5 Video
				jQuery('video,object').maximage('maxcover');
	
				// To show it is dynamic html text
				jQuery('.in-slide-content').delay(1200).fadeIn();
			});
			
			
// Scrolling Content With Arrows ala Debra Turner
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

			
// zoom large fishing pole
	$(document).ready(function(){
			$('#ex1').zoom();
			$('#ex2').zoom();
		});
		
		
		
		
// accordion menu - ala BeulahFlyRods.com
$("#accordion > li > div").click(function(){
 
    if(false == $(this).next().is(':visible')) {
        $('#accordion ul').slideUp(300);
    }
    $(this).next().slideToggle(300);
});
$("#accordion2 > li > div").click(function(){
 
    if(false == $(this).next().is(':visible')) {
        $('#accordion2 ul').slideUp(300);
    }
    $(this).next().slideToggle(300);
});
 
//$('#accordion ul:eq(0)').show();		