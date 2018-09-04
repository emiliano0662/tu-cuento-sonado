$(document).ready(function() {

	var get_type = 'girl';
	var get_skin = 1;
	var get_eyes = 1;
	var get_hair = 1;

	$.validate({
		form: '#form-crear-cuento',
	});

	$("input[name=gender]").change(function () {

		get_type = $(this).val();

		$("#img-select-avatar").attr("src", "./generate-image/script-avatar.php?type="+get_type+"&skin="+get_skin+"&eyes="+get_eyes+"&hair="+get_hair);

	});

	$(".btn-change-create-story").on('click', function (event) {
		event.preventDefault();

		var item = $(this).data('item');

		switch (item) {
			case 2:
			
				$('#name').validate(function (valid, elem) {

					if (valid) {

						$(".create-story-block").hide();
						$(".container-create-story-"+item).fadeIn();
					}
				});

			break;
			case 5:

				$(".create-story-block").hide();
				$(".container-create-story-2").fadeIn();

			break;
		
			default:

				$(".create-story-block").hide();
				$(".container-create-story-"+item).fadeIn();

			break;
		}

	});

	$(".carousel-create-story-items").on('click', '.carousel-item', function (event) {
		event.preventDefault();

		var item = $(this).data('item');
		var type = $(this).data('type');

		$(".content-items-"+item+" .carousel-item").removeClass('active');
		$(this).addClass('active');

		switch (item) {
			case 'skin':
				get_skin = type;
				$('#hidde_value_skin').val(type);
				break;
			case 'ayes':
				get_eyes = type;
				$('#hidde_value_eyes').val(type);
				break;
			case 'hair':
				get_hair = type;	
				$('#hidde_value_hair').val(type);
				break;
		}

		$("#img-select-avatar").attr("src", "./generate-image/script-avatar.php?type="+get_type+"&skin="+get_skin+"&eyes="+get_eyes+"&hair="+get_hair);

	});

	$("#form-crear-cuento").submit(function (event) {
		event.preventDefault();

		$.ajax({
			cache: false,
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function (data) {

			}
		});

	});

	$("#croppie-img-file").on('change', function (event) {
		event.preventDefault();

		if (this.files[0]) {

			var reader = new FileReader();

			reader.onload = function (event) {

				image = event.target.result;

				$("#upload-croppie").croppie('destroy');

				$("#upload-croppie").croppie({
					viewport: {
						width: 150,
						height: 150,
					}
				});

				$("#upload-croppie").croppie('bind', image);
			}

			reader.readAsDataURL(this.files[0]);

		} else {

			alert('Lo sentimos - tu navegador no es compatible con la API FileReader');
		}

	});

	$("#btn-croppie-file-add").on('click', function (event) {
		event.preventDefault();

		$("#croppie-img-file").click();

	});

	$("#btn-croppie-file-accept").on('click', function (event) {
		event.preventDefault();

		$("#upload-croppie").croppie('result', {
			type: 'canvas',
			size: 'viewport'
		}).then(function (resp) {

			$("#hidden_croppie_img_file").val(resp);

		});

	});

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

	var owl_carousel_create_story = $('.carousel-create-story-items').owlCarousel({
		items: 1,
		margin: 0,
		loop: false,
		nav: false,
		dots: false,
		autoplay: false
	});

	$(".btn-carousel-create-story.btn-left").on('click', function (event) {
		event.preventDefault();

		owl_carousel_create_story.trigger('prev.owl.carousel');
	});

	$(".btn-carousel-create-story.btn-right").on('click', function (event) {
		event.preventDefault();

		owl_carousel_create_story.trigger('next.owl.carousel');
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