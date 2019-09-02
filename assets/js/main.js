(function ($, root, undefined) {
	$(function () {

		'use strict';

	  // banner
	  $('.banner').slick({
	    dots: true,
	    arrows: false,
	    infinite: false,
	    speed: 750,
	    slidesToShow: 1,
	    slidesToScroll: 1,
	    autoplay: false,
	    autoplaySpeed: 3500,
	  });

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

		// change color img.svg
		jQuery('img.change-color').each(function(){
			var $img = jQuery(this);
			var imgID = $img.attr('id');
			var imgClass = $img.attr('class');
			var imgURL = $img.attr('src');
	
			jQuery.get(imgURL, function(data) {
				// Get the SVG tag, ignore the rest
				var $svg = jQuery(data).find('svg');

				// Add replaced image's ID to the new SVG
				if(typeof imgID !== 'undefined') {
					$svg = $svg.attr('id', imgID);
				}
				// Add replaced image's classes to the new SVG
				if(typeof imgClass !== 'undefined') {
					$svg = $svg.attr('class', imgClass+' replaced-svg');
				}

				// Remove any invalid XML tags as per http://validator.w3.org
				$svg = $svg.removeAttr('xmlns:a');
				
				// Check if the viewport is set, else we gonna set it if we can.
				if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
					$svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
				}

				// Replace image with new SVG
				$img.replaceWith($svg);
	
			}, 'xml');
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
		$('select').not('.no-box').not('.multiple').wrap('<div class="select-box"></div>');

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
		/* -----------------------------------------  Gallery images each */


		var $images = $('.wp-block-gallery img');
		var fb = [];
		
		if($images.length > 0){
				$images.each(function(index, img) {
		   fb.push({
			 src : img.src,
			 type: 'image',
			 $orig : $(img).parent()
		   })
		});

		$('.wp-block-gallery').on('click', 'img', function() {
		  $.fancybox.open(fb, {
			// Here you can put your custom options
		  }, $images.index(this))
		});
		}
	});
})(jQuery, this);