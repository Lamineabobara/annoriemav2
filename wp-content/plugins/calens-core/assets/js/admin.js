/******************
	:: Indexes
*******************

Window -> ready
:: Rating testimonial

*******************
	:: Indexes
*******************/

( function($){
	"use strict"
	
	$( document ).ready( function() {
		
		/*
		 * Rating testimonial
		 */
		 
		$(document).on( 'click', '.testimonial-stars-rating .star', function () {
			var ratings =  $( '.testimonial-stars-rating .star' ).index( this ) + 1;
			$( '.testimonial-stars-rating .star' ).removeClass( 'rated' );
			$( '.star:lt( ' + ratings + ' )' ).addClass( 'rated' );
			$( '#tcr_testimonial_rating' ).val( ratings );
		});
		
		/*
		 * Add Row for the team social fields.
		 */
		$(document).on( 'click', '.team-table-row-add', function () {	
			var row_add    = '';	
			var current_row = $( '.team-social-icon-table tr' ).length;
			
			row_add = '<tr><td class="row-index">' + current_row + '</td><td><input class="widefat team-social-icons" type="text" name="tcr_teammember_socials_icon[]" value=""></td><td><input class="widefat" type="text" name="tcr_teammember_socials_link[]" value=""></td><td><a class="team-table-row-remove" href="#">Remove</a></td></tr>';
			$( '.team-social-icon-table' ).append( row_add );
			
			$( '.team-social-icon-table td.row-index' ).each( function( index ) {
				$( this ).text( index + 1 );
			});
			
			var total_row = $( '.team-social-icon-table tr' ).length - 1;
			$( 'input[name="tcr_teammember_socials_total"]' ).val( total_row );
			
			calenscore_social_iconpicker();
		});
		
		/*
		 * Remove Row for the team social fields.
		 */
		$(document).on( 'click', '.team-table-row-remove', function ( event ) {
			event.preventDefault();
			$( this ).parents( 'tr' ).remove()
			
			$( '.team-social-icon-table td.row-index' ).each( function( index ) {
				$( this ).text( index + 1 );
			});
			
			var total_row = $( '.team-social-icon-table tr' ).length - 1;
			$( 'input[name="tcr_teammember_socials_total"]' ).val( total_row );
		});

		/*
		 * Team Member Signature
		 */		
		$( document ).on( 'click', '.tcr-image-upload', function( event ) {

			event.preventDefault();

			var image_frame;
			var el_data = $( this );
			var parents = el_data.parents( '.tcr-image-field-wrap' );

			image_frame = wp.media( {
				title: el_data.data( 'Choose Image' ),
				button: {
					text: el_data.data( 'update' ),
					close: false,
				},
				multiple: false,
				library: {
					type: 'image'
				},
			} );

			image_frame.on( 'select', function () {
				var attachment_data = image_frame.state().get( 'selection' ).first();

				image_frame.close( attachment_data );

				if ( attachment_data.attributes.sizes.thumbnail ) {
					var image_url = attachment_data.attributes.sizes.thumbnail.url;
				} else {
					var image_url = attachment_data.attributes.url;
				}

				parents.find( '.tcr-image-container' ).empty().hide().append( '<img class="tcr-image" src="' + image_url + '" >' ).slideDown( 'fast' );
				parents.find( '.tcr-image-remove' ).show();
				
				if ( ! $( parents ).find( '.tcr-image-remove' ).length > 0 ) {
					parents.append( '<input type="button" class="button tcr-image-remove" value="Remove" />' );
				}

				$( parents ).find( '.tcr-image-id' ).val( attachment_data.attributes.id );
			} );

			image_frame.open();

		} );
		
		$( document ).on( 'click', '.tcr-image-remove', function( event ) {
			event.preventDefault();
			
			var el_data = $( this );
			var parent  = $( this ).parents( '.tcr-image-field-wrap' );

			$( parent ).find( '.tcr-image-container > img' ).slideUp().remove();
			$( parent ).find( '.tcr-image-id' ).val( '' );
			$( parent ).find( '.tcr-image-remove' ).remove();
		} );

		calenscore_social_iconpicker();
		calenscore_service_iconpicker()

	});

	/*
	 * Social Icon picker.
	 */
	function calenscore_social_iconpicker(){
		
		var icons_array = [];
		$.each(
			calenscore_object.calenscore_get_social_icons,
			function( icon_key, icon_val ) {
				var icon_key  = Object.entries( icon_val );			
				icons_array.push( {title:icon_key[0][0], searchTerms:icon_key[0][1]} )
			}
		);

		var options = {
			icons : icons_array,
			inputSearch: true,
		}
		$( '.team-social-icons' ).iconpicker( options );
	}
	
	/*
	 * Social Icon picker.
	 */
	function calenscore_service_iconpicker(){
		
		var icons_array = [];
		$.each(
			calenscore_object.calenscore_get_service_icons,
			function( icon_key, icon_val ) {
				var icon_key  = Object.entries( icon_val );			
				icons_array.push( {title:icon_key[0][0], searchTerms:icon_key[0][1]} )
			}
		);

		var options = {
			icons : icons_array,
			inputSearch: true,
		}
		$( '.service-icons' ).iconpicker( options );
	}
	
})( jQuery );