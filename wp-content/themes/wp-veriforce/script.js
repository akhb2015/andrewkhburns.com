jQuery(document).ready(function($) {

	// DYANMIC IFRAME HEIGHT

	window.addEventListener('message', function(e) {
		var $iframe = $('.form iframe');
		var eventName = e.data[0];
		var data = e.data[1] + 1;
		switch(eventName) {
			case 'setHeight':
				$iframe.height(data);
				break;
		}
	}, false);



	// MEGA MENU

	$('.HEADER .megamenu').on('mouseenter', function(){
		$(this).find('.a[tabindex]').first().focus();
	}).on('mouseleave', function(){
		$(this).find('*').blur();
	});

	$('.HEADER .megamenu').on('mousedown', function(event) {
		if (!$(event.target).is('a, .a')) {
			event.preventDefault();
			return false;
		}
	});

	$('.NAV input[type="checkbox"]').change(function(){
		$('.NAV input[type="checkbox"]').not($(this)).prop('checked', false);
	});



	// ENABLE TRANSITIONS

	$('body').removeClass('b-loading');



	// BUTTON ARROW

	$('.b-button.alt-arrow').append('<svg viewBox="0 0 24 12" style="width:24rem"; height:12rem;"><path d="M19.5147 5.00007L16.2929 1.77823L17.7071 0.364014L23.4142 6.07111L17.7071 11.7782L16.2929 10.364L19.6568 7.00007L0 7.00008V5.00008L19.5147 5.00007Z"/></svg>');



	// FLICKITY

	$('.b-columns.alt-flickity').each(function() {
		var flickity = $(this).flickity({
			contain: true,
			wrapAround: true,
			draggable: true,
			cellAlign: 'center',
			cellSelector: '.b-column',
			groupCells: true,
			prevNextButtons: true,
			pageDots: false,
			imagesLoaded: true,
		});
	});

	$(window).resize(function() {
		$('.b-columns.alt-flickity.flickity-enabled').each(function() {
			var heights = $(this).find('.b-column').map(function() {
				$(this).css({height: 'auto'});
				return $(this).height();
			}).get();

			var maxHeight = Math.max.apply(null, heights);
			$(this).find('.b-column').height(maxHeight);
		});
	});



	// JS BACK

	$('[data-back]').click(function(event) {
		if (document.referrer && document.referrer.indexOf($(this).attr('href')) !== -1) {
			event.preventDefault();
			history.back(-1);
		}
	});



	// JS SELECT

	$('[data-select]').change(function() {
		window.location = $(this).val();
	});



	// DISABLE SCROLL

	function disableScroll() {
		var scrollDiv = document.createElement('div');
		scrollDiv.className = 'b-scrollbar';
		document.body.appendChild(scrollDiv);
		var scrollbarWidth = scrollDiv.offsetWidth - scrollDiv.clientWidth;
		document.body.removeChild(scrollDiv);

		$('html').css({'overflow': 'hidden'});
		$('.b-page').css({'border-right-width': scrollbarWidth + 'px'});
		$('.b-page-head, .b-nav, .b-modal').css({'right': scrollbarWidth + 'px'});
		$(':input, a').attr('tabindex', '-1');
	}



	// ENABLE SCROLL

	function enableScroll() {
		$('html').removeAttr('style');
		$('.b-page').removeAttr('style');
		$('.b-page-head, .b-nav, .b-modal').removeAttr('style');
		$(':input, a').removeAttr('tabindex');
	}



	// STOP PAGE SCROLL WHEN NAV OPEN

	$('#toggle-nav').change(function() {
		if ($('#toggle-nav').prop('checked')) {
			if ($(document).scrollTop() < $('.b-page-head').height()) $(document).scrollTop(0);
			$('.NAV .frame').scrollTop(0);
			disableScroll();
		} else {
			setTimeout(function() {
				enableScroll();
			}, 250);
		}
	});



	// OPEN/CLOSE MODAL

	$(document).on('click', '[data-modal]', function() {
		var content = $('#' + $(this).attr('data-modal'));
		content = content.html().replace('data-src', 'src');

		var modal = `
			<div class="b-modal">
				<div class="b-modal-overlay" data-close></div>
				<div class="b-modal-content">${content}</div>
			</div>
		`;

		$('.b-modal').remove();
		$('body').append(modal);
		disableScroll();

		$('.b-modal :input, .b-modal a').removeAttr('tabindex');
		$('body').addClass('b-modal-open');
	});

	$(document).on('click', '[data-close]', function() {
		$('body').removeClass('b-modal-open');
		setTimeout(function() {
			$('.b-modal').remove();
			enableScroll();
		}, 250);
	});

	$(document).on('keyup', function(event) {
		if (event.keyCode == 27) $('[data-close]').click();
	});



	// LOAD IFRAME

	$(document).on('click', '[data-iframe]', function() {
		var container = $('#' + $(this).attr('data-iframe'));
		var iframe = container.find('iframe');

		iframe.attr('src', iframe.attr('data-src'));
		container.show();
	});



	// STICKY SCROLL CHECK

	(function() {
		var page = $('.b-page');
		var pageHead = $('.b-page-head');
		var previousScrollPosition = $(document).scrollTop();

		$(document).scroll(function() {
			var currentScrollPosition = $(document).scrollTop();

			if (currentScrollPosition > pageHead.height()) {
				page.attr('data-scroll', (currentScrollPosition < previousScrollPosition ? 'up' : 'down'));
			}

			if (currentScrollPosition < 1) {
				page.removeAttr('data-scroll');
			}

			previousScrollPosition = currentScrollPosition;
		});
	}());



	// VIDEO PAGE SPEED HACK

	$('video[data-autoplay]').each(function() {
		$(this).trigger('play');
	});



	// OPEN EXTERNAL LINKS IN NEW TAB

	$('a[href^=http]').click(function () {
	    var a = new RegExp('/' + window.location.host + '/');
	    if (!a.test(this.href)) {
	        window.open(this.href);
	        return false;
	    }
	});

	// if link opens in new tab

	$('a[target="_blank"]').attr('aria-label', '(opens in new tab)')


	// ANIMATION

	if($(window).width() > 960){
		$.fn.visible = function(partial) {
			var $t            = $(this),
				$w            = $(window),
				viewTop       = $w.scrollTop(),
				viewBottom    = viewTop + $w.height(),
				_top          = $t.offset().top,
				_bottom       = _top + $t.height(),
				compareTop    = partial === true ? _bottom : _top,
				compareBottom = partial === true ? _top : _bottom;
			return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
		};

		$(window).on('load resize scroll', function(){
			$('[data-animate]').each(function(){
				if ($(this).visible(true)) {
					$(this).attr('data-animate', 'true');
				}
			});
		});

		if($(document).scrollTop() > 0){
			$('[data-animate]').removeAttr('data-animate');
		}
	}

});



// BODY RESIZE OBSERVER W/ THROTTLE

function throttle(f, delay) {
	let timer = 0;
	return function(...args) {
		clearTimeout(timer);
		timer = setTimeout(() => f.apply(this, args), delay);
	}
}

const resizeObserver = new ResizeObserver(throttle(entries => {
	window.dispatchEvent(new Event('resize'));
}, 500));

resizeObserver.observe(document.body);

