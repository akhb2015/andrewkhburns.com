jQuery(document).ready(function($) {

	// FLICKITY

	$('.HOMEPFA .images.alt-flickity').each(function() {
		var flickity = $(this).flickity({
			contain: true,
			draggable: false,
			cellAlign: 'center',
			cellSelector: '.image',
			prevNextButtons: false,
			pageDots: false,
			imagesLoaded: false,
			fade: true,
			autoPlay: 3000,
		});
	});

});