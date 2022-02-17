/**
 * Main javascript file for the site
 *
 * @author      Andy Burns
 * @copyright   2021
 */

 var $=jQuery.noConflict();

/* Extremely rudimentary check for mobile devices */
is_mobile = false;

if (/Mobi/.test( navigator.userAgent) ) {
	if (/iPad/.test( navigator.userAgent) ) {
		is_mobile = false;
	} else {
		is_mobile = true;
	}
}

/* Add 'live' back to jQuery so 3rd-party plugins that use it don't throw errors */
jQuery.fn.extend({
	live: function (event, callback) {
		if (this.selector) {
			jQuery(document).on(event, this.selector, callback);
		}
	}
});

/* Add a toggleText function that works similarly to toggleClass */
jQuery.fn.extend({
	toggleText: function(a, b){
		return this.text(this.text() == b ? a : b);
	}
});


/* On page scroll... */
jQuery(window).scroll(function() {
	/* Show the back-to-top arrow after scrolling 500px down the page */
	if (jQuery(this).scrollTop() >= 500) {
		jQuery('.scroll-top').fadeIn();
	} else {
		jQuery('.scroll-top').fadeOut();
	}
});

/*hamburger menu animation*/
$(document).ready(function(){
	$('.navbar-toggler').on('click', function() {
		$('#nav-icon3').toggleClass('open');
	});
});

/* Everything else... */
jQuery(document).ready(function($) {
	
	//pin footer to the bottom of short pages
	/* vp_h will hold the height of the browser window */
    var vp_h = $(window).height();
    /* b_g will hold the height of the html body */
    var b_g = $('body').height();
    /* If the body height is lower than window */
    if (b_g < vp_h) {
        /* Set the footer css -> position: absolute; */
        $('footer#site-footer').css("position", "fixed");
    }


	$('.dropdown').on('show.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).slideDown();
	});
	$('.dropdown').on('hide.bs.dropdown', function(e){
		$(this).find('.dropdown-menu').first().stop(true, true).slideUp();
	});

	//don't close the dropdown when item is clicked
	$(document).on('click', '.dropdown-menu', function (e) {
		e.stopPropagation();
	});

	/* Enable tooltips (they are off by default) */
	$('[data-toggle="tooltip"]').tooltip();

	/* Smooth scrolling to anchors */
	$('.smooth-scroll').on('click', function(e) {
		/* Make sure the hash has a value before overriding default link behavior */
		if (this.hash !== '') {
			e.preventDefault();
		}

		/* Store the hash */
		var hash = this.hash;

		/* Scroll to the hash */
		$('html, body').animate({
			scrollTop: $(hash).offset().top
		}, 600 );

		return false;
	});

	/* Back to top */
	$('.scroll-top').click(function() {
		$('html, body').animate({
			scrollTop: 0
		}, 600);

		return false;
	});

});


/* Grab the query string */
var QueryString = function () {
	var query_string = {};
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i=0;i<vars.length;i++) {
		var pair = vars[i].split("=");
		// If first entry with this name
		if (typeof query_string[pair[0]] === "undefined") {
			query_string[pair[0]] = decodeURIComponent(pair[1]);
		// If second entry with this name
		} else if (typeof query_string[pair[0]] === "string") {
			var arr = [ query_string[pair[0]],decodeURIComponent(pair[1]) ];
			query_string[pair[0]] = arr;
		// If third or later entry with this name
		} else {
			query_string[pair[0]].push(decodeURIComponent(pair[1]));
		}
	}
	return query_string;
}();


//Bootstrap form validation behavior
(function() {
  'use strict';

  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');

    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
