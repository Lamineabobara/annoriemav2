<?php
/**
 * Template part for cart logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */
 
global $calens_options;

$display_cart_icon = isset( $calens_options['display-cart-icon'] ) ? $calens_options['display-cart-icon'] : '';
if ( ! $display_cart_icon ) {
	return;
}

if ( class_exists( 'WooCommerce' ) ) {
	?>
	<div class="tcr-mini-cart-wrapper">
		<a class="cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php /* translators: %1$s is replaced with "number" */ echo sprintf( esc_attr__( 'View Cart (%s)', 'calens' ), esc_attr( WC()->cart->get_cart_contents_count() ) ); ?>"><span class="cart-icon"><i class="fas fa-shopping-cart"></i></span><?php calens_cart_count(); ?></a>
		<div class="cart-items"><?php the_widget( 'WC_Widget_Cart', 'title=' ); ?></div>
	</div>
	<?php
}