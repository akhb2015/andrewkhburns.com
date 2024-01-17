jQuery(document).ready(function($){

	//default
	$('.TABS button:first-child').addClass('active');
	$('.TABS .content:first-child').addClass('active');
	$('.TABS .image:first-child').addClass('active');

	$('.TABS button').on('click', function(){
		var index = $(this).index() + 1;

		$('.TABS button').removeClass('active');
		$('.TABS .content').removeClass('active');
		$('.TABS .image').removeClass('active');

		$('.TABS button:nth-child('+index+')').addClass('active');
		$('.TABS .content:nth-child('+index+')').addClass('active');
		$('.TABS .image:nth-child('+index+')').addClass('active');

	});


	//style2
	$('.TABS2 button:first-child').addClass('active');
	$('.TABS2 .tab:first-child').addClass('active');

	$('.TABS2 button').on('click', function(){
		var index = $(this).index() + 1;

		$('.TABS2 button').removeClass('active');
		$('.TABS2 .tab').removeClass('active');

		$('.TABS2 button:nth-child('+index+')').addClass('active');
		$('.TABS2 .tab:nth-child('+index+')').addClass('active');

	});


});