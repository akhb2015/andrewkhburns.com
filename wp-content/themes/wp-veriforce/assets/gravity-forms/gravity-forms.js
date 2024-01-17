jQuery(document).ready(function($) {

	// GRAVITY FORMS ACTIVE CLASS

	function addActiveClass(element) {
		var gfield = element.parents('.gfield');
		if ((element.val() != '' || element.is(':focus')) && !gfield.hasClass('alt-static')) {
			gfield.addClass('alt-active');
		} else {
			gfield.removeClass('alt-active');
		}
	}

	if ($('.gform_wrapper').length) {
		$('.gform_wrapper').on('focus', 'input, textarea, select', function() {
			addActiveClass($(this));
		});

		$('.gform_wrapper').on('blur', 'input, textarea, select', function() {
			addActiveClass($(this));
		});

		$(document).on('gform_post_render', function() {
			$('.gform_wrapper input:not(.gform_hidden), .gform_wrapper textarea, .gform_wrapper select').each(function() {
				addActiveClass($(this));
			});
		});
	}

});
