/******************
	:: Indexes
*******************

Window -> Load
:: Progress Bar

*******************
	:: Indexes
*******************/

( function($){
	"use strict"
	
	$( document ).ready( function($) {
		$( '.search-popup-modal' ).magnificPopup({
			type: 'inline',
			preloader: false,
			modal: true
		});

		$(document).on('click', '.popup-modal-dismiss', function (e) {
			e.preventDefault();
			$.magnificPopup.close();
		});
		
		var header_offset   = $( '.header-stickable' ).offset();
		var outerHeight     = $( '.header-stickable' ).outerHeight();
		var header_position = header_offset.top + outerHeight;
		var window_width    = $(window).width();

		if ( $( 'body' ).hasClass( 'admin-bar' ) && window_width >= 992 ) {
			$( '.site-header-container' ).addClass( 'admin-bar-enabled' );
		}

		if ( calens_l10n.sticky_header ) {
			$( window ).scroll(
				function(event) {

				var current_position = $( window ).scrollTop();
				var window_width2     = $(window).width();

				if ( current_position > header_position ) {
					$( '.header-stickable' ).addClass( 'tcr-sticky-header' );
					var offset_px = 0;
					if( $('#wpadminbar').length > 0 && (self===top) ){
						offset_px = jQuery('#wpadminbar').height();
					}
					if(window_width2 >= 1025){
						$('.header-stickable').css('top', offset_px + "px");
					}
				} else {
					$('.header-stickable' ).removeClass( 'tcr-sticky-header' );
					$('.header-stickable').removeAttr('style');
				}
			});
		}
		
		$('.popup-calens a, a.popup-calens').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
		});
		
		$( '#primary-menu' ).slicknav({
			'label' : ' ',
			'closedSymbol': '+', 
			'openedSymbol': '-',
			'allowParentLinks': true,
			appendTo : '#site-navigation-mobile'
		});

		$(document).on('click', '#scroll-to-top', function (e) {
			e.preventDefault();
			$( 'html, body' ).animate({ scrollTop: 0 }, 900);
		});
		
		$('#scroll-to-top').removeClass('active');
		$( window ).scroll( function(){
			if ( $( window ).scrollTop() > 150 ) {
				$( '#scroll-to-top' ).addClass('active');
			} else {
				$( '#scroll-to-top' ).removeClass('active');
			}
		});
	});

})( jQuery );