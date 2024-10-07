<?php
/**
 * Template part for header button.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */

global $calens_options;

$header_button_title = isset( $calens_options['header_button_title'] ) ? $calens_options['header_button_title'] : '';
$header_button_liink = isset( $calens_options['header_button_liink'] ) ? $calens_options['header_button_liink'] : '';
if ( ! $header_button_title || ! $header_button_liink ) {
	return;
}
?>
<div class="tcr-header-button-container">
	<div class="tcr-header-button">
		<a class="tcr-header-button" href="<?php echo esc_url( $header_button_liink ); ?>" title="<?php echo esc_attr( $header_button_title ); ?>"><?php echo esc_html( $header_button_title ); ?></a>
	</div>
</div>
