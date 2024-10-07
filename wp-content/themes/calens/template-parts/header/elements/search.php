<?php
/**
 * Template part for header search.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */

global $calens_options;

$display_search_icon = isset( $calens_options['display-search-icon'] ) ? $calens_options['display-search-icon'] : '';
if ( ! $display_search_icon ) {
	return;
}
?>
<div class="search-wrapper">
	<a href="#search-popup-modal" class="search-icon search-popup-modal"><i class="fas fa-search"></i></a>
</div>
<div id="search-popup-modal" class="white-popup-block mfp-hide">
	<form method="get" class="tcr-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="tcr-searchform-field" name="s" placeholder="<?php echo esc_attr__( 'Enter Search Keyword...', 'calens' ); ?>">
		<button class="tcr-search-button" type="submit">X</button>
	</form>
	<button title="<?php echo esc_attr__( 'Close (Esc)', 'calens' ); ?>" type="button" class="mfp-close">x</button>
</div>
