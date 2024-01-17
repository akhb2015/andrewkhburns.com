jQuery(document).ready(function($) {

	$('.VERTICAL-SCROLLER').each(function() {
		var scrollOffset, start, end, rows;
		var container = $(this);
		var fixed = container.find('.fixed');



		$(window).resize(function() {
			scrollOffset = $(window).height() * 0.5;
			start = container.offset().top + fixed.height() / 4;
			end = container.offset().top + container.height() - fixed.height() / 4;

			rows = [];
			container.find('.row').each(function(index) {
				rows.push({
					start: $(this).offset().top,
					end: $(this).offset().top + $(this).height()
				});
			});
		});



		$(document).scroll(function() {
			var scrollPosition = $(document).scrollTop() + scrollOffset;

			if (scrollPosition >= start && scrollPosition <= end) {
				container.addClass('alt-fixed');
			} else {
				container.removeClass('alt-fixed');
			}

			if (scrollPosition > end) {
				container.addClass('alt-fixed-end');
			} else {
				container.removeClass('alt-fixed-end');
			}

			if (scrollPosition > start) {
				rows.forEach(function(row, index) {
					if (scrollPosition >= row.start && scrollPosition <= row.end) {
						container.attr('data-active', index + 1);
					}
				});
			} else {
				container.attr('data-active', 1);
			}
		});
	});
});
