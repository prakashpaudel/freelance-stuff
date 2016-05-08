$(document).ready(function(){
	$(window).resize(function(event) {
		var img = $('.cols.inner img');
		var h = img.height();
		img.css('margin-top', +h / -2 + "px");
		var w = img.width();
		img.css('margin-left', +w / -2 + "px");
	});
	
	$(window).resize();


})