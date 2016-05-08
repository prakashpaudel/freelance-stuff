// iPhone scaling bug fix by @mathias, @cheeaun and @jdalton
(function(doc) {

	var addEvent = 'addEventListener',
		type = 'gesturestart',
		qsa = 'querySelectorAll',
		scales = [1, 1],
		meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];
		
	function fix() {
		meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
		doc.removeEventListener(type, fix, true);
	}
	
	if ((meta = meta[meta.length - 1]) && addEvent in doc) {
		fix();
		scales = [.25, 1.6];
		doc[addEvent](type, fix, true);
	}

}(document));

(function($) {
	
	// Add has-js class to html tag, if javascript is enabled
	$('html').addClass('has-js');
	
	// No spam, please
	$('a.emailaddy').each(function(i) {
		var text = $(this).text();
		var address = text.replace(' at ', '@');
		$(this).attr('href', 'mailto:' + address);
			$(this).text(address);
	});

	// Add navigation controllers for small screens

	$('.sans-logo').append('<div class="menu-trigger"><a class="sans-button trigger-button" href="#" title="Toggle Menu"><i class="fa fa-bars"></i></a></div>');
	//$('.sans-masthead').append('<div class="menu-trigger"><a class="sans-button trigger-button" href="#" title="Toggle Menu"><i class="fa fa-bars"></i></a></div>');
	$('.filter-controls').prepend('<div class="filter-trigger"><a class="sans-button trigger-button" href="#" title="Toggle Filter"><i class="fa fa-bars"></i> Filter</a></div>');
	
	// Add an icon to footer nav current menu item
	$('.sans-footer li.current-menu-item a').append(' <i class="fa fa-arrow-left"></i>');

	// Toggle main menu on small screens
	$('.menu-trigger a').click(function() {
		$('.sans-main-menu').slideToggle({
			speed:	300,
		});
		$(this).toggleClass('show-menu');
		return false;
	});
	
	// Toggle portfolio filter nav on small screens
	$('.filter-trigger a').click(function() {
		$('.filter_nav').slideToggle({
			speed:	300,
		});
		$(this).toggleClass('show-filters');
		return false;
	});
	
	// Hide the filter navigation once an element is clicked on small screens
	$('.filter_nav a').click(function() {
		$('.filter_nav').slideToggle({
			speed:	300,
		});
		$('.filter-trigger a').removeClass('show-filters');
		return false;
	});
	
	// Add focus to hovered portfolio thumbnail
	$('.portfolio-grid li').hover(function() {
		$('.portfolio-grid li').not(this).stop().animate({opacity: '0.4'}, 300);
		}, function() {
			$('.portfolio-grid li').not(this).stop().animate({opacity: '1'}, 300);
		}
	);
	
	// Anchor scrolling
	$('.scroll-it').click(function(event) {
		
		// Prevent the default action for the click event
		event.preventDefault();

		// Get the full url - like mysitecom/index.htm#home
		var full_url = this.href;

		// Split the url by # and get the anchor target name - home in mysitecom/index.htm#home
		var parts = full_url.split('#');
		var trgt = parts[1];

		// Get the top offset of the target anchor
		var target_offset = $('#'+trgt).offset();
		var target_top = target_offset.top;

		// Go to that anchor by setting the body scroll top to anchor top
		$('html, body').animate({scrollTop:target_top}, 500);
	});
	
	// Filter portfolio
	$('#filter-portfolio').filterable();
	
	// Responsive videos
	$('.sans-portfolio-video').fitVids();
	$('.sans-post-video').fitVids();
	$('.sans-entry').fitVids();
	$('.sans-hero-video').fitVids();
	$('.sans-case-study').fitVids();
	
	// Responsive floating images on blog posts
	$(window).load(function() {
	
		var blogWidth = 780; // width of desktop blog post container
		
		$('.sans-blog-img img.alignleft').each(function() { // blog post images floating left
			var ratio = $(this).width()/blogWidth;
			$(this).wrap('<div style="width: '+(ratio*100)+'%; float: left; margin-right: 3.34%;"></div>');
		});
		
		$('.sans-blog-img img.alignright').each(function() { // blog post images floating right
			var ratio = $(this).width()/blogWidth;
			$(this).wrap('<div style="width: '+(ratio*100)+'%; float: right; margin-left: 3.34%;"></div>');
		});
	
	});
	
	// Responsive floating images on portfolio items
	$(window).load(function() {
	
		var portfolioWidth = 788; // width of desktop portfolio container
		
		$('.sans-portfolio-img img.alignleft').each(function() { // blog post images floating left
			var ratio = $(this).width()/portfolioWidth;
			$(this).wrap('<div style="width: '+(ratio*100)+'%; float: left; margin-right: 3.3%;"></div>');
		});
		
		$('.sans-portfolio-img img.alignright').each(function() { // blog post images floating right
			var ratio = $(this).width()/portfolioWidth;
			$(this).wrap('<div style="width: '+(ratio*100)+'%; float: right; margin-left: 3.3%;"></div>');
		});
	
	});
	
	// Responsive floating images on pages
	$(window).load(function() {
	
		var pageWidth = 1050; // width of desktop portfolio container
		
		$('.sans-img-resize img.alignleft').each(function() { // blog post images floating left
			var ratio = $(this).width()/pageWidth;
			$(this).wrap('<div style="width: '+(ratio*100)+'%; float: left; margin-right: 2.4762%;"></div>');
		});
		
		$('.sans-img-resize img.alignright').each(function() { // blog post images floating right
			var ratio = $(this).width()/pageWidth;
			$(this).wrap('<div style="width: '+(ratio*100)+'%; float: right; margin-left: 2.4762%;"></div>');
		});
	
	});
	
	// Initiate Fancybox on gallery items
	
	// Clear fix hack for columns
	$('<div class="clear"></div>').insertAfter('.sans-half-column-last');
	$('<div class="clear"></div>').insertAfter('.sans-third-column-last');
	
	$('.mailchimp label span').append('<strong class="red">*</span>');
	$('.mailchimp input[type=image]').wrap('<div class="mailchimp-btn"></div>');
	
	$('.latest-item').eq(0).css('padding-top', '0');
	
	$('#cat-list a, #pagenav a, #tags a').each(function(index, element) {
        var href = $(this).attr('href');
		href += '#list';
		$(this).attr('href', href);
    });
	
	$('.gallery-icon a').fancybox();

})(jQuery);
