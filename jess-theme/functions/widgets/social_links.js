jQuery(document).ready(function($) {

	$('#footer .social-networks li, .share-box li, .social-icon, .social li').mouseenter(function(){
		$(this).find('.popup').fadeIn();
	});

	$('#footer .social-networks li, .share-box li, .social-icon, .social li').mouseleave(function(){
		$(this).find('.popup').fadeOut();
	});

	
});