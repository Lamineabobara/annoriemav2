<?php
/**
 * Clients shortcode template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$owl_options = array(
	'items'      => isset( $settings['clients_column'] ) ? $settings['clients_column'] : 4,
	'loop'       => isset( $settings['enable_slider_loop'] ) ? $settings['enable_slider_loop'] : false,
	'margin'     => isset( $settings['spacebetween'] ) ? $settings['spacebetween'] : 10,
	'nav'        => isset( $settings['enable_arrow'] ) ? $settings['enable_arrow'] : false,
	'dots'       => isset( $settings['enable_navigation'] ) ? $settings['enable_navigation'] : false,
	'autoplay'   => isset( $settings['enable_slider_autoplay'] ) ? $settings['enable_slider_autoplay'] : false,
	'smartSpeed' => 1000,
	'navText'    => array(
		"<i class='flaticon-left-arrow'></i>",
		"<i class='flaticon-right-arrow'></i>",
	),
	'responsive' => array(
		0   => array(
			'items' => 1,
		),
		767 => array(
			'items' => 2,
		),
		992 => array(
			'items' => isset( $settings['clients_column'] ) ? $settings['clients_column'] : 4,
		),
	),
);
?>
<div class="owl-carousel owl-theme" data-owl_options="<?php echo esc_attr( json_encode( $owl_options ) ); ?>">
	<?php include( __DIR__ . '/../styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
</div>
