<?php
/**
 * Blog shortcode slider layout file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$owl_options = array(
	'items'      => isset( $settings['post_slider_responsive_xl'] ) ? $settings['post_slider_responsive_xl'] : 3,
	'loop'       => isset( $settings['post_enable_slider_loop'] ) ? $settings['post_enable_slider_loop'] : false,
	'margin'     => isset( $settings['post_spacebetween'] ) ? (int) $settings['post_spacebetween'] : 30,
	'nav'        => isset( $settings['post_enable_arrow'] ) ? $settings['post_enable_arrow'] : false,
	'dots'       => isset( $settings['post_enable_navigation'] ) ? $settings['post_enable_navigation'] : false,
	'autoplay'   => isset( $settings['post_enable_slider_autoplay'] ) ? $settings['post_enable_slider_autoplay'] : false,
	'smartSpeed' => 1000,
	'navText'    => array(
		"<i class='flaticon-left-arrow'></i>",
		"<i class='flaticon-right-arrow'></i>",
	),
	'responsive' => array(
		0   => array(
			'items' => 1,
		),
		576 => array(
			'items' => isset( $settings['post_slider_responsive_md'] ) ? (int) $settings['post_slider_responsive_md'] : 2,
		),
		768 => array(
			'items' => isset( $settings['post_slider_responsive_lg'] ) ? (int) $settings['post_slider_responsive_lg'] : 2,
		),
		992 => array(
			'items' => isset( $settings['post_slider_responsive_xl'] ) ? (int) $settings['post_slider_responsive_xl'] : 3,
		),
	),
);
?>
<div class="owl-carousel owl-theme tcr-post-wrapper" data-owl_options="<?php echo esc_attr( json_encode( $owl_options ) ); ?>">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		include( __DIR__ . '/../styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
	}
	/* Reset Post Data */
	wp_reset_postdata();
	?>
</div>
