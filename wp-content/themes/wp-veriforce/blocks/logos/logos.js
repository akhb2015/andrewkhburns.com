jQuery(document).ready(function($) {

	$('.LOGOS[data-style="marquee"]').each(function() {
		var items = $(this).find('.item');
		$(this).find('.wrapper').clone().appendTo($(this).find('.slide'));
		$(this).find('.slide').css({
			width: items.outerWidth() * items.length * 2 + 'px',
			animationDuration: items.outerWidth() * items.length * 0.02 + 's',
		});
	});



	$(window).resize(function() {
		$('.LOGOS[data-style="marquee"]').each(function() {
			var width = parseInt($(this).find('.slide')[0].style.width, 10) / 2;
			if (width > $(window).width() - 50) {
				$(this).addClass('alt-animate');
			} else {
				$(this).removeClass('alt-animate');
			}
		});
	});
});
