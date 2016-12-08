$(document).ready(function(){
	var menu = $('.menu');
	var originalOffset = menu.offset().top;

	function scroll(){
		if($(window).scrollTop() >= originalOffset){
			$('.menu').addClass('navbar-fixed-top');
		}else{
			$('.menu').removeClass('navbar-fixed-top');
		}
	}
	
	document.onscroll = scroll;
});

$(window).scroll(function() {
	if($(this).scrollTop()) {
    	$('.btn-top').fadeIn();
	}else {
    	$('.btn-top').fadeOut();
	}
});