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
		var $flexslider_dom = $('.flexslider');
		if($flexslider_dom.length===1){
			var $flexslider = $flexslider_dom.data('flexslider');
			$flexslider.vars.minItems = gridSize;
			$flexslider.vars.maxItems = gridSize;
		}
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

	$(window).load(function(){
		if($('.svg').length>0){
			var $svg = $('.svg');
			var svg_height = $svg.offset().top;
			var $layer_1 = $('#Layer_1');
			var $window = $(window);
			var offset = 500;
			var fudge = -200;
			function move(){
				var svg_width = $svg.width();
				var current_position = $window.scrollTop();
				var percent_in_offset = (current_position - svg_height + offset)/(fudge + offset);
				if( percent_in_offset >= 0 && percent_in_offset <= 1 ){
					$layer_1.css({
						marginBottom: -0.25*svg_width*(1-percent_in_offset)+"px",
						marginTop: -0.25*svg_width*(percent_in_offset)+"px"
					});
				}
			}
			$window.on('resize',function(){
				$layer_1.css({
					marginBottom: "",
					marginTop: ""
				});
			});
			$window.on('scroll',move);
		}
	});

});// END #####################################    END