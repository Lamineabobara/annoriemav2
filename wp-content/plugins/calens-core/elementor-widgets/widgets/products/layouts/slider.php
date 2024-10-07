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
	'items'      => isset( $settings['post_slider_responsive_xl'] ) ? $settings['post_slider_responsive_xl'] : 3,
	'loop'       => isset( $settings['post_enable_slider_loop'] ) ? $settings['post_enable_slider_loop'] : false,
	'margin'     => isset( $settings['post_spacebetween'] ) ? (int) $settings['post_spacebetween'] : 30,
	'nav'        => isset( $settings['post_enable_arrow'] ) ? $settings['post_enable_arrow'] : false,
	'dots'       => isset( $settings['post_enable_navigation'] ) ? $settings['post_enable_navigation'] : false,
	'autoplay'   => isset( $settings['post_enable_slider_autoplay'] ) ? $settings['post_enable_slider_autoplay'] : false,
	'smartSpeed' => 1000,
	'navText'    => array(
		"<i class='flaticon-left-arrow'></i>",
		"<i class='flaticon-next'></i>",
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

if ( \Elementor\Plugin::$instance->editor->is_edit_mode() ) {
	add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
	add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
	add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
	add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
	add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
}

/**
 * woocommerce_before_shop_loop hook.
 *
 * @hooked wc_print_notices - 10
 * @hooked woocommerce_result_count - 20
 * @hooked woocommerce_catalog_ordering - 30
 */

do_action( 'woocommerce_before_shop_loop' );
?>
<ul class="products products-loop owl-carousel owl-theme owl-carousel-options tcr-products-wrapper" data-owl_options="<?php echo esc_attr( json_encode( $owl_options ) ); ?>">
	<?php
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
		global $post, $product;

		/**
		 * woocommerce_shop_loop hook.
		 *
		 * @hooked WC_Structured_Data::generate_product_data() - 10
		 */
		do_action( 'woocommerce_shop_loop' );

		?>

		<?php wc_get_template_part( 'content', 'product' ); ?>

		<?php 
	endwhile; // end of the loop.
	?>

	<?php wp_reset_postdata(); ?>

	<?php woocommerce_product_loop_end(); ?>
</ul>
<?php
/**
 * woocommerce_after_shop_loop hook.
 *
 * @hooked woocommerce_pagination - 10
 */
do_action( 'woocommerce_after_shop_loop' );
