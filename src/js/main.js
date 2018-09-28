$(document).ready(function() {

	var get_type = 'girl';
	var get_skin = 1;
	var get_eyes = 1;
	var get_hair = 1;

	$(".btn-bookblock-left").on('click', function (event) {
		event.preventDefault();

		$('#bb-bookblock').bookblock('prev');

	});

	$(".btn-bookblock-right").on('click', function (event) {
		event.preventDefault();

		$('#bb-bookblock').bookblock('next');

	});

	$(document).keydown(function (e) {
		var keyCode = e.keyCode || e.which,
			arrow = {
				left: 37,
				up: 38,
				right: 39,
				down: 40
			};

		switch (keyCode) {
			case arrow.left:
				$('#bb-bookblock').bookblock('prev');
				break;
			case arrow.right:
				$('#bb-bookblock').bookblock('next');
				break;
		}
	});

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

	$("#croppie-img-file").on('change', function (event) {
		event.preventDefault();

		if (this.files[0]) {

			var reader = new FileReader();

			reader.onload = function (event) {

				image = event.target.result;

				$("#upload-croppie").croppie('destroy');

				$("#upload-croppie").croppie({
					viewport: {
						width: 136,
						height: 168,
					}
				});

				$("#upload-croppie").croppie('bind', image);

				$("#btn-croppie-file-add").hide();
				$("#img-avatar-pre-select").hide();
				$("#btn-croppie-file-cancel").fadeIn();
				$("#btn-croppie-file-accept").fadeIn();
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

			$("#img-avatar-pre-select").attr('src', resp);	
			$("#img-avatar-pre-select").fadeIn();

			$("#hidden_croppie_img_file").val(resp);

			$("#upload-croppie").croppie('destroy');

			$("#btn-croppie-file-add").fadeIn();

			$("#btn-croppie-file-cancel").hide();
			$("#btn-croppie-file-accept").hide();

		});

	});

	$("#btn-croppie-file-cancel").on('click', function (event) {
		event.preventDefault();

		$("#upload-croppie").croppie('destroy');

		$("#hidden_croppie_img_file").val("");

		$("#btn-croppie-file-add").fadeIn();

		$("#img-avatar-pre-select").hide();		
		$("#btn-croppie-file-cancel").hide();
		$("#btn-croppie-file-accept").hide();

	});

	$("#form-crear-cuento").submit(function (event) {
		event.preventDefault();

		var $btn = $('#btn-crear-cuento').button('loading');

		$.ajax({
			cache: false,
			type: $(this).attr("method"),
			url: $(this).attr("action"),
			data: $(this).serialize(),
			success: function (data) {

				/*var element = document.createElement('a');
				element.setAttribute('href', data);
				element.setAttribute('target', '_blank');
				element.setAttribute('download', 'tu-cuento-sonado');
				element.style.display = 'none';
				document.body.appendChild(element);
				element.click();
				document.body.removeChild(element);*/

				$(".img-bookblock").each(function (index) {

					var count = index + 1;

					$(this).attr("src", "./generate-image/script-create-image/page-" + count + ".php?type=" + get_type + "&skin=" + get_skin + "&eyes=" + get_eyes + "&hair=" + get_hair);

				});

				setTimeout(function () {

					$btn.button('reset');
					
					$(".create-story-block").hide();
					$(".container-create-story-4").fadeIn();

					$('#bb-bookblock').bookblock();

					$('#form-crear-cuento')[0].reset();
	
					get_skin = 1;
					$('#hidde_value_skin').val(1);
					get_eyes = 1;
					$('#hidde_value_eyes').val(1);
					get_hair = 1;
					$('#hidde_value_hair').val(1);
	
					$("#img-select-avatar").attr("src", "./generate-image/script-avatar.php?type="+get_type+"&skin="+get_skin+"&eyes="+get_eyes+"&hair="+get_hair);
	
					$("#img-avatar-pre-select").hide();	
					$("#upload-croppie").croppie('destroy');

				}, 5000);
			}
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

	$(".btn-link-main").on('click', function (event) {
		event.preventDefault();

		var seccion = $(this).data('seccion');

		$('body,html').animate({ scrollTop: $(seccion).offset().top }, 1000, 'swing');

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