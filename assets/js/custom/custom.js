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
	if($('body.home').length > 0){
		function getGridSize_home() {
			return (window.innerWidth < 600) ? 1 :
				(window.innerWidth < 900) ? 2 : 3 ;
		}
		$(window).load(function(){
			$('.flexslider.home').flexslider({
				animation: "slide",
				itemWidth: 338,
				itemMargin: 60,
				minItems: getGridSize_home(),
				maxItems: getGridSize_home(),
				prevText: '<i class="fa fa-chevron-circle-left"></i>',
				nextText: '<i class="fa fa-chevron-circle-right"></i>',
				start: function(){
					var height = 0;
					$('#flexslider ul.slides li > .wrapper').each(function(){
						var $this = $(this);
						height = $this.outerHeight() > height ? $this.outerHeight() : height;
					});
					$('#flexslider ul.slides li').height(height);
				}
			}); // end register flexslider
		});
		// check grid size on resize event
		$(window).resize(function() {
			var gridSize = getGridSize_home();
			var $flexslider_dom = $('.flexslider.home');
			if($flexslider_dom.length===1){
				var $flexslider = $flexslider_dom.data('flexslider');
				$flexslider.vars.minItems = gridSize;
				$flexslider.vars.maxItems = gridSize;
			}
		});
	}
	if($('body.page-id-104, body.page-id-106').length > 0){
		function getGridSize_inner() {
			return (window.innerWidth < 600) ? 1 : 
			(window.innerWidth < 900) ? 2 : 4 ;
		}
		$(window).load(function(){
			$('.flexslider.inner').flexslider({
				animation: "slide",
				itemWidth: 338,
				itemMargin: 60,
				minItems: getGridSize_inner(),
				maxItems: getGridSize_inner(),
				controlNav: false,
				prevText: '<i class="fa fa-chevron-circle-left"></i>',
				nextText: '<i class="fa fa-chevron-circle-right"></i>',
			}); // end register flexslider
		});
		// check grid size on resize event
		$(window).resize(function() {
			var gridSize = getGridSize_inner();
			var $flexslider_dom = $('.flexslider.inner');
			if($flexslider_dom.length===1){
				var $flexslider = $flexslider_dom.data('flexslider');
				$flexslider.vars.minItems = gridSize;
				$flexslider.vars.maxItems = gridSize;
			}
		});
	}


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

	$('a.popup').colorbox({
		rel: 'gal',
		inline: true,
		width: '90%',
		maxWidth: '960px',
		close: '<i class="fa fa-times"></i>',
		previous: '<i class="fa fa-chevron-left"></i>',
		next: '<i class="fa fa-chevron-right"></i>'
	});
    $(window).on('resize', function () {
        var width = window.innerWidth * 0.9 > 960 ? '960px' : '90%';
        $.colorbox.resize({
            width: width,
        });
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
			$('#masthead >.row-2').removeClass('toggled');
		} else {
			$('#masthead >.row-1').addClass('toggled');
			$('#masthead >.row-2').addClass('toggled');
			$('#site-navigation').addClass('toggled');
		}
	});
	$('#masthead .mid-size-button').click(function(){
		if($('#site-navigation-mid').hasClass('toggled-mid')){
			$('#site-navigation-mid').removeClass('toggled-mid');
		} else {
			$('#site-navigation-mid').addClass('toggled-mid');
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
				if( percent_in_offset >= 0 ){
					if(percent_in_offset > 1){
						percent_in_offset = 1;
					}
					$layer_1.css({
						marginBottom: -0.25*svg_width*(1-percent_in_offset)+"px",
						marginTop: -0.25*svg_width*(percent_in_offset)+"px"
					});
				}
			}
			move();
			$window.on('resize',function(){
				$layer_1.css({
					marginBottom: "",
					marginTop: ""
				});
			});
			$window.on('scroll',move);
		}
	});

	//analytics integration
	$('a.analytics').one('click',function(e){
		e.preventDefault();
		var placed = false;
		function temp(){
			if(!placed){
				placed = true;
				var $this = $(this);
				if($this.attr('href')!==undefined) {
					window.location = $this.attr('href');
				}
			}
		}
		var placeClick = temp.bind(this);
		setTimeout(placeClick,1000);

		var label_regex = new RegExp("\\blabel:\\S+\\b");
		var cat_regex = new RegExp("\\bcat:\\S+\\b");
		var action_regex = new RegExp("\\baction:\\S+\\b");
		var label_matches = this.className.match(label_regex);
		var cat_matches = this.className.match(cat_regex);
		var action_matches = this.className.match(action_regex);
		var label = null;
		var cat = null;
		var action = null;
		if(label_matches){
			label = label_matches[0].split(':')[1];
		}
		if(cat_matches){
			cat = cat_matches[0].split(':')[1];
		}
		if(action_matches){
			action = action_matches[0].split(':')[1];
		}
		if(cat||label||action){
			ga('send', {
				hitType: 'event',
				hitCallback: function(){
					placeClick();
				},
				eventCategory: cat,
				eventAction: action,
				eventLabel: label,
				eventValue: null
			});
		}
	});
});// END #####################################    END