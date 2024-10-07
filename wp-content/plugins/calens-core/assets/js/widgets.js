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
	
	jQuery(window).on('elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-progress-bar.default', progressbar );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-counter.default', counter );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-blog.default', Owl_carousel );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-clients.default', Owl_carousel );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-projects.default', Owl_carousel );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-services.default', Owl_carousel );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-team.default', Owl_carousel );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-testimonials.default', Owl_carousel );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-tabs.default', custom_tab );
		elementorFrontend.hooks.addAction( 'frontend/element_ready/calens-products.default', Owl_carousel );
	});
	
	$( window ).load(
		function( $ ) {

			progressbar();
			counter();
			Owl_carousel();

			jQuery( window ).on( 'scroll', function(){
				progressbar();
				counter();
			});
			
			/*
			 * Magnific Popup
			 */

			jQuery( '.tcr-mfg-popup-image' ).magnificPopup({
				type: 'image'
			});
		}
	);
	
	/*
	 * Run Progress Bar
	 */

	function progressbar() {
		var window_position = jQuery( window ).scrollTop();
		window_position     = window_position + jQuery( window ).height();
		
		jQuery( '.tcr-progress-bar-inner' ).each( function( index ) {
			var element_position  = jQuery( this ).offset().top;
			
			if ( element_position < window_position ) {
				if ( ! jQuery( this ).parent( '.tcr-progress-bar' ).hasClass( 'bar-is-animated' ) ) {
					jQuery( this ).parent( '.tcr-progress-bar' ).addClass( 'bar-is-animated' );
					var $this = this;
					var max_value = jQuery( this ).attr( 'data-bar-value' );
					var width = 1;
					var id = setInterval( frame, 14 );

					function frame() {
						if ( width >= 100 ) {
							clearInterval( id );
						} else {
							if ( max_value >= width ) {
								width++;
								jQuery( $this ).css( 'width', width + "%" );	
							}
						}
					}
				}
			}
		});
		
		jQuery( '.tcr-circle-progress-bar' ).each( function( index ) {
			var element_position  = jQuery( this ).offset().top;

			jQuery( this ).asPieProgress({
				speed: 50,
				easing: 'swing'
			});

			if ( element_position < window_position ) {
				jQuery( this ).asPieProgress( 'start' );
			}			
		});
	}

	/*
	 * Run Counter
	 */
	function counter() {
		var window_position = jQuery( window ).scrollTop();
		window_position     = window_position + jQuery( window ).height();
		
		jQuery( '.tcr-counter-wrapper .tcr-counter-number' ).each( function( index ) {
			var element_position  = jQuery( this ).offset().top;
			if ( element_position < window_position ) {
				if ( ! jQuery( this ).hasClass( 'counter-is-animated' ) ) {
					jQuery( this ).addClass( 'counter-is-animated' );
					var $this = this;
					var max_value = jQuery( this ).attr( 'data-counter-value' );

					var $this = jQuery(this);
					jQuery({ Count: 0 }).animate(
					{ 
						Count: $this.text() 
					},
					{
						duration: 2000,
						easing: 'swing',
						step: function () {
							$this.text( Math.ceil( this.Count ) );
						}
					});
				}
			}
		});
	}
	
	/*
	 * Owl carousel
	 */
	function Owl_carousel() {
		setTimeout( function(){ 
			jQuery( '.owl-carousel' ).each( function() {
				var $owl_options = ( jQuery( this ).attr( 'data-owl_options' ) ) ? jQuery( this ).data( 'owl_options' ) : {};
				$owl_options.rtl = ( jQuery( 'body' ).hasClass( 'rtl' ) ) ? true : false;
				jQuery( this ).owlCarousel( $owl_options );
			});		
		}, 500 );
	}
	
	/*
	 * Custom Tab
	 */
	function custom_tab() {

		jQuery( '.tcr_tabs_wrapper' ).each( function( index ) {
			jQuery( this ).find( '.tcr-tab-list .tcr-list-tab' ).first().addClass( 'cd-active-tab-link' );
			jQuery( this ).find( '.tcr-tab-content .tcr-tab-content-list' ).first().addClass( 'cd-active-tab' );
		});

		jQuery( '.tcr-tab-list a' ).on( 'click', function( event ) {

			event.preventDefault();

			jQuery( this ).parents( '.tcr_tabs_wrapper' ).find( '.cd-active-tab' ).removeClass( 'cd-active-tab' );
			jQuery( this ).parents( '.tcr_tabs_wrapper' ).find( '.cd-active-tab-link' ).removeClass( 'cd-active-tab-link' );
			jQuery( this ).parents( '.tcr-list-tab' ).addClass( 'cd-active-tab-link' );

			var tab_content_id = jQuery( this ).attr( 'data-tab-id' );
			jQuery( '#' + tab_content_id ).addClass( 'cd-active-tab' );
		});
	}
})( jQuery );