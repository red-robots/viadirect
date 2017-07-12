/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	// tiny helper function to add breakpoints
	function getGridSize() {
		return (window.innerWidth < 600) ? 1 :
			(window.innerWidth < 900) ? 2 : 3 ;
	}
	$(window).load(function(){
		console.log(getGridSize());
		$('.flexslider').flexslider({
			animation: "slide",
			itemWidth: 338,
			itemMargin: 60,
			minItems: getGridSize(),
			maxItems: getGridSize(),
			prevText: '<i class="fa fa-chevron-circle-left"></i>',
			nextText: '<i class="fa fa-chevron-circle-right"></i>',
		}); // end register flexslider
	});
	// check grid size on resize event
	$(window).resize(function() {
		var gridSize = getGridSize();
		var $flexslider = $('.flexslider').data('flexslider');
		$flexslider.vars.minItems = gridSize;
		$flexslider.vars.maxItems = gridSize;
	});
	
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
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});

	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$('#masthead #site-navigation button').click(function(){
		if($('#site-navigation').hasClass('toggled')){
			$('#site-navigation').removeClass('toggled');
			$('#masthead >.row-1').removeClass('toggled');
		} else {
			$('#masthead >.row-1').addClass('toggled');
			$('#site-navigation').addClass('toggled');
		}
	});

});// END #####################################    END