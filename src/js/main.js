$(document).ready(function() {

	var owl_carousel_main = $('.owl-carousel-main').owlCarousel({
		items: 1,
		margin: 0,
		loop: true,
		nav: false,
		dots: false,
		autoplay: true
	});

	$(".btn-owl-carousel-main.btn-left").on('click', function (event) {
		event.preventDefault();

		owl_carousel_main.trigger('prev.owl.carousel');
	});

	$(".btn-owl-carousel-main.btn-right").on('click', function (event) {
		event.preventDefault();

		owl_carousel_main.trigger('next.owl.carousel');
	});

	$(".btn-dropdown-menu-create-story").on('click', function (event) {
		event.preventDefault();

		var language = $(this).data('language');

		$('#input-create-story-language').val(language);
	});

	$("#form-contact").submit(function (event) {
		event.preventDefault();

		$.ajax({
			cache: false,
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function (data) {

				if (data) {

					$('.alert').hide();
					$('.alert-success').fadeIn();

					$("#form-contact")[0].reset();
					
				}else{

					$('.alert').hide();
					$('.alert-danger').fadeIn();

				}

				setTimeout(function () { $('.alert').hide(); }, 5000);
			}
		});

	});

	$("[data-dinaanim]").each(function () {

		var $this = $(this);

		$this.addClass("dinaAnim-invisible");

		if ($(window).width() > 767) {

			$this.appear(function () {

				var delay = ($this.data("dinadelay") ? $this.data("dinadelay") : 1);

				if (delay > 1) $this.css("animation-delay", delay + "ms");

				$this.addClass("dinaAnim-animated");
				$this.addClass('dinaAnim-' + $this.data("dinaanim"));

				setTimeout(function () {

					$this.addClass("dinaAnim-visible");

				}, delay);

			}, { accX: 0, accY: -150 });

		} else {

			$this.animate({ opacity: 1 }, 300, 'easeInOutQuad', function () { });
		}
	});

});