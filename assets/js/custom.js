/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});


	$("#primary-menu > li > a").each(function(){
		var wave = $("#waveSvg").html();
		$(this).append(wave);
	});
	

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();


	$(document).on("click",".menu-toggle",function(){
		$(this).toggleClass('open');
		$('body').toggleClass('open-menu');
		$(".main-navigation").toggleClass('open');
		$(".main-menu").slideToggle();
	});

});// END #####################################    END