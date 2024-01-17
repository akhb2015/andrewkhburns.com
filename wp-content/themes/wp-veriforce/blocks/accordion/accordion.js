jQuery(document).ready(function($) {

	$('.ACCORDION .toggle').click(function() {
		var rows = $(this).parents('.rows');
		var row = $(this).parents('.row');
		var container = $(this).parents('.row').find('.container')[0];

		if (rows.hasClass('alt-singular')) {
			rows.find('.row').removeClass('alt-active');
			rows.find('.container').css({maxHeight: ''});
		}

		row.toggleClass('alt-active');

		if (container.style.maxHeight) {
			container.style.maxHeight = null;
			$(this).text('Expand');
		} else {
			container.style.maxHeight = container.scrollHeight + 'px';
			$(this).text('Collapse');
		}
	});



	$(window).resize(function() {
		$('.ACCORDION .row.alt-active .container').each(function() {
			$(this).css({maxHeight: 'none'});
			$(this).css({maxHeight: $(this).outerHeight() + 'px'});
		});

		$('.ACCORDION[data-style="image"]').each(function() {
			$(this).find('.rows').css({minHeight: $(this).find('.image').height()});
		});
	});
});
