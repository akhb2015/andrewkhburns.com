jQuery(document).ready(function($){

	$('.POSTS form select').change(function() {
		$(this).parents('form').submit();
	});



	$('.POSTS form button[type="reset"]').click(function(event) {
		event.preventDefault();
		var form = $(this).parents('form');

		if (form.is('[data-alm]')) {
			window.history.replaceState(null, null, window.location.href.split(/[?#]/)[0]);
			form.trigger('reset').submit();
		} else {
			window.location.replace(form.attr('action'));
		}
	});



	$('.POSTS form[data-alm]').submit(function(event) {
		event.preventDefault();

		var data = $(this).serializeArray().reduce(function(obj, item) {
			if (item.name.slice(0, 2) == '__') {
				obj.taxonomy = item.name.substring(2) + (obj.taxonomy ? ':' + obj.taxonomy : '');
				obj.taxonomyTerms = item.value + (obj.taxonomyTerms ? ':' + obj.taxonomyTerms : '');
				obj.taxonomyOperator = 'IN' + (obj.taxonomyOperator ? ':' + obj.taxonomyOperator : '');
			} else {
				obj[item.name.substring(1)] = item.value;
			}

			return obj;
		}, {});

		ajaxloadmore.filter('none', 1, data);

		// var href = window.location.href.split(/[?#]/)[0] + '?' + $(this).find('input, select').not('[type="hidden"]').serialize();
		// window.history.replaceState(null, null, href);
	});
});
