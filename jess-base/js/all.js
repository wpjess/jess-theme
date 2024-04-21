////////////////////////////////////////////////////////////////////////
//	Mobile Menu
////////////////////////////////////////////////////////////////////////

$(function() {
	$( '#dl-menu' ).dlmenu({
		animationClasses : { classin : 'dl-animate-in-1', classout : 'dl-animate-out-1' }
	});
			
	$(".dl-menu ul.sub-menu").each(function(i){
		$(this).addClass("dl-submenu");
		$(this).find("li:first-child").before("<li class='dl-back'><a href='#'>back</a></li>");
	});
});
