<?php
/**
 * Blog shortcode gird layout file.
 *
 * @package calens Core
 */


if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}

$post_grid_responsive_xl = ( $settings['post_grid_responsive_xl'] ) ? (int) $settings['post_grid_responsive_xl'] : 3;
$post_grid_responsive_lg = ( $settings['post_grid_responsive_lg'] ) ? (int) $settings['post_grid_responsive_lg'] : 3;
$post_grid_responsive_md = ( $settings['post_grid_responsive_md'] ) ? (int) $settings['post_grid_responsive_md'] : 2;
$post_grid_responsive_sm = 1;

if ( 5 === (int) $post_grid_responsive_xl ) {
	$classes [] = 'col-xl-five';
} else {
	$classes [] = 'col-xl-' . ( 12 / $post_grid_responsive_xl );
}

$classes [] = 'col-lg-' . ( 12 / $post_grid_responsive_lg );
$classes [] = 'col-md-' . ( 12 / $post_grid_responsive_md );
$classes [] = 'col-sm-' . ( 12 / $post_grid_responsive_sm );
$classes    = implode( ' ', array_filter( array_unique( $classes ) ) );

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
<ul class="products products-loop row grid tcr-products-wrapper">
	<?php
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
		global $post, $product;

		?>
		<li <?php wc_product_class( $classes, $product ); ?>>
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

		/**
		 * Hook: woocommerce_before_shop_loop_item_title.
		 *
		 * @hooked woocommerce_show_product_loop_sale_flash - 10
		 * @hooked woocommerce_template_loop_product_thumbnail - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_product_title - 10
		 */
		do_action( 'woocommerce_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_after_shop_loop_item_title.
		 *
		 * @hooked woocommerce_template_loop_rating - 5
		 * @hooked woocommerce_template_loop_price - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item_title' );

		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		do_action( 'woocommerce_after_shop_loop_item' );
		?>
		</li>
		<?php
	
	endwhile; // end of the loop.
	?>
</ul>
<?php

/**
 * woocommerce_after_shop_loop hook.
 *
 * @hooked woocommerce_pagination - 10
 */
do_action( 'woocommerce_after_shop_loop' );

