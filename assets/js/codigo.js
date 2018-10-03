(function ($, root, undefined) {
	$(function () {

		'use strict';

	  // banner
	  $('.banner').slick({
	    dots: false,
	    arrows: true,
	    infinite: false,
	    speed: 750,
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    autoplay: true,
	    autoplaySpeed: 3500,
	  });

    // $('#macy-grid').masonry({
    //   itemSelector: '.grid-item',
    //   percentPosition: true
    // });
	  // slider responsivo
		$('.responsivo').slick({
			dots: true,
			arrows: false,
			infinite: false,
			speed: 750,
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

		// add plus and minus
    $(document).on('click', '.quantity .plus, .quantity .minus', function (e) {
      // Get values
      let $qty = $(this).closest('.quantity').find('.qty'),
        currentVal = parseFloat($qty.val()),
        max = parseFloat($qty.attr('max')),
        min = parseFloat($qty.attr('min')),
        step = $qty.attr('step');
      // Format values
      if (!currentVal || currentVal === '' || currentVal === 'NaN') currentVal = 0;
      if (max === '' || max === 'NaN') max = '';
      if (min === '' || min === 'NaN') min = 0;
      if (step === 'any' || step === '' || step === undefined || parseFloat(step) === 'NaN') step = 1;
      // Change the value
      if ($(this).is('.plus')) {
        if (max && (max == currentVal || currentVal > max)) {
          $qty.val(max);
        } else {
          $qty.val(currentVal + parseFloat(step));
        }
      } else {
        if (min && (min == currentVal || currentVal < min)) {
          $qty.val(min);
        } else if (currentVal > 0) {
          $qty.val(currentVal - parseFloat(step));
        }
      }
      // Trigger change event
      $qty.trigger('change');
      e.preventDefault();
    });

		$('.wpcf7-form input[type="submit"]').replaceWith('<button id="submit" type="submit" class="btn icon">' + $('.wpcf7-form input[type="submit"]').val() +'</button>');
		
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