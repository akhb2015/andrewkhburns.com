jQuery(document).ready(function($){

	gform.addAction('gform_input_change', function(elem, formId, fieldId){
		if (formId == 9 && fieldId == 1) {
			var selectedOption = $(elem).find(':selected').text();
			var selectedClient = $('.clients > li[data-name="'+selectedOption+'"]');
			$('#input_9_3').val(selectedClient.attr('data-product')).trigger('change');
			$('#input_9_4').val(selectedClient.attr('data-pricing')).trigger('change');
		}
	});

	$('#input_9_1').select2({
    	minimumInputLength: 3,
	});



	$('.JOIN-NETWORK .by-product .form button').click(function(){
		var select = $('.JOIN-NETWORK .by-product select');
		var error = $('.JOIN-NETWORK .by-product .error');

		if (select.val()) {
			window.location = select.val();
		} else {
			error.show();
		}
	});

	$('.JOIN-NETWORK #by-hiring-client').click(function(){
		$('.JOIN-NETWORK .by-hiring-client').show();
		$('.JOIN-NETWORK .by-product').hide();
	});

	$('.JOIN-NETWORK #by-product').click(function(){
		$('.JOIN-NETWORK .by-hiring-client').hide();
		$('.JOIN-NETWORK .by-product').show();
	});
});
