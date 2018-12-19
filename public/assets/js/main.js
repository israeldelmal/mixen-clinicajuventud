$('body > aside > ul > li > a').on('click', function(event) {
	event.preventDefault();

	$('body > aside > ul > li > ul').slideUp(300);
	$('body > aside > ul > li > a').removeClass('active');

	if ($(this).siblings('ul').is(':visible')) {
		$(this).removeClass('active');
		$(this).siblings('ul').slideUp(300);
	} else {
		$(this).addClass('active');
		$(this).siblings('ul').slideDown(300);
	}
});

$('#servicio > section > div > aside > ul > li > a').on('click', function(event) {
	event.preventDefault();

	$('#servicio > section > div > aside > ul > li > ul').slideUp(300);
	$('#servicio > section > div > aside > ul > li > a').removeClass('active');

	if ($(this).siblings('ul').is(':visible')) {
		$(this).removeClass('active');
		$(this).siblings('ul').slideUp(300);
	} else {
		$(this).addClass('active');
		$(this).siblings('ul').slideDown(300);
	}
});

$(document).ready(function() {
	$('.item-service:first-of-type > a').addClass('active');
	$('.item-service:first-of-type > ul').addClass('show');
});

$('.item-nav').on('click', function(event) {
	event.preventDefault();
	let Item = $(this).attr('href');

	if ($(window).width() > 1370) {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top - 130
		}, 1000);
	} else {
		$('body, html').stop(true, true).animate({
			scrollTop: $(Item).offset().top
		}, 1000);
		$('body > nav').removeClass('active-nav');
		$('body > button > span').removeClass('active-btn');
	}
});

$('body > button').on('click', function(event) {
	event.preventDefault();
	$('body > nav').toggleClass('active-nav');
	$('body > button > span').toggleClass('active-btn');
});