<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Calens
 */

$current_sidebar = ( function_exists( 'calens_get_current_sidebar' ) ) ? calens_get_current_sidebar() : '';
if ( ! $current_sidebar || ! is_active_sidebar( $current_sidebar ) ) {
	return;
}
?>
<aside id="secondary" class="widget-area sidebar col-sm-12 col-md-12 col-lg-4 col-xl-3 column">
	<?php dynamic_sidebar( $current_sidebar ); ?>
</aside><!-- #secondary -->

