(function ($, root, undefined) {
	$(function () {

		'use strict';

	  // banner
	  $('.banner').slick({
	    dots: true,
	    arrows: false,
	    infinite: false,
	    speed: 500,
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    autoplay: true,
	    autoplaySpeed: 2000,
	  });

	  // slider responsivo
		$('.responsivo').slick({
			dots: true,
			arrows: false,
			infinite: false,
			speed: 500,
			slidesToShow: 3,
			slidesToScroll: 1,
			responsive: [
				{
					breakpoint: 1200,
					settings: {
						slidesToShow: 3,
						slidesToScroll: 1,
						infinite: true,
						dots: true
					}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
						slidesToScroll: 1
					}
				},
				{
					breakpoint: 768,
					settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
				}
			]
		});


		/*  Default Scripts */
		/* ----------------------------------------- */
		// Mascara de DDD e 9 dígitos para telefones
		var SPMaskBehavior = function (val) {
			  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
			}, spOptions = { onKeyPress: function(val, e, field, options) { field.mask(SPMaskBehavior.apply({}, arguments), options); } };
		$('.mask-phone, input[type="tel"]').mask(SPMaskBehavior, spOptions);

		// SELECT , caso queira excluir algum elemento, colocar 'select:not(elementos)'
		$('select').not('.multiple').wrap('<div class="select-box"></div>');

		// Fancybox
		$("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif'], .fancybox").fancybox({
			loop : false,
		});

		// Rolagem suave
		$('a.smoothscroll').click(function() {
		  if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
		    var target = $(this.hash); target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
		    if (target.length) { $('html,body').animate({ scrollTop: target.offset().top }, 1000); return false; }
		  }
		});
		/* -----------------------------------------  Default Scripts */
	});
})(jQuery, this);