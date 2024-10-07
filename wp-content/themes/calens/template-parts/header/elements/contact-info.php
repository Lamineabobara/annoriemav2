<?php
/**
 * Template part for header contact information.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calens
 */

global $calens_options;

$contact_infobox = isset( $calens_options['contact_infobox'] ) ? $calens_options['contact_infobox'] : '';

if ( empty( $contact_infobox ) ) {
	return;
}
?>
<div class="contact-info">
	<?php
	if ( $contact_infobox ) {
		echo do_shortcode( $contact_infobox ); 
	}
	?>
</div>
