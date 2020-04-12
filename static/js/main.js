$(function () {
	"use strict";
	var wind = $(window);

	wind.on('load', function () {
		$(".loader").fadeOut();
		$("#preloder").delay(400).fadeOut("slow");

		/*========Portfolio Isotope Setup========*/
		$('.grid').isotope({
			itemSelector: '.grid-item',
		});

		// filter items on button click
		$('.filter-button-group').on('click', 'li', function () {
			var filterValue = $(this).attr('data-filter');
			$('.grid').isotope({ 
				filter: filterValue,
				animationOptions: {
					duration: 750,
					easing: "linear",
					queue: false,
				},
			});
			$('.filter-button-group li').removeClass('active');
			$(this).addClass('active');
		});

		/*========Navbar Close On Click Mobile Responsive========*/
		$(".nav-item .nav-link").on('click', function () {
			$(".navbar-collapse").removeClass("show");
		});


		/*========AFFIX========*/
		var toggleAffix = function (affixElement, scrollElement, wrapper) {
			var height = affixElement.outerHeight(),
				top = wrapper.offset().top;

			if (scrollElement.scrollTop() >= top-100) {
				wrapper.height(height);
				affixElement.addClass("affix");
			} else {
				affixElement.removeClass("affix");
				wrapper.height('auto');
			}
		};

		/* use toggleAffix on any data-toggle="affix" elements */
		$('[data-toggle="affix"]').each(function () {
			var ele = $(this),
				wrapper = $('<div></div>');

			ele.before(wrapper);
			$(window).on('scroll resize', function () {
				toggleAffix(ele, $(this), wrapper);
			});

			// init
			toggleAffix(ele, $(window), wrapper);
		});

		/*======== OWL CAROUSEL ========*/
		$('.mycarousel .owl-carousel').owlCarousel({
			items: 1,
			loop: true,
			margin: 30,
			mouseDrag: false,
			autoplay: false,
			stagePadding: 30,
			smartSpeed: 450
		});
	});
});

$(document).ready(function () {
	/*------------------
		Scroll
	--------------------*/
	$('.menu-link').click(function () {
		event.preventDefault();
		var scroll_item_index = $(this).data('scroll-item');
		console.log(scroll_item_index);

		$('html, body').animate({
			scrollTop: $("[data-scroll-item-index='" + scroll_item_index + "']").offset().top
		}, 500);
	});

	/*------------------
		Navigation
	--------------------*/
	$('.nav-switch').on('click', function (event) {
		$('.menu-flex').slideToggle(400);
		event.preventDefault();
	});

	$('.service').mouseenter(function (event) {
		$(this).find(".horizontal-separator").addClass("horizontal-separator-white");
	}).mouseleave(function (event) {
		$(this).find(".horizontal-separator").removeClass("horizontal-separator-white");
	});
});

$(function () {
	window.verifyRecaptchaCallback = function (response) {
		$('input[data-recaptcha]').val(response).trigger('change')
	}

	window.expiredRecaptchaCallback = function () {
		$('input[data-recaptcha]').val("").trigger('change')
	}

	$('#contact-form').validator();
	$('#contact-form').on('submit', function (e) {
		if (!e.isDefaultPrevented()) {

			$.ajax({
				type: "POST",
				url: base_url + "index.php/Contact/contact",
				data: $(this).serialize(),
				dataType: "JSON",
				success: function (data) {
					var messageAlert = 'alert-' + data.type;
					var messageText = data.message;

					var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
					if (messageAlert && messageText) {
						$('#contact-form').find('.messages').html(alertBox);
						$('#contact-form')[0].reset();
						grecaptcha.reset();
					}
				}
			});
			return false;
		}
	})
});
