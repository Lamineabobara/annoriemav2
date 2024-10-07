<?php
/**
 * WooCommerce
 *
 * @package Calens
 */
global $wp_customize;

return array(
	'title'            => isset( $wp_customize ) ? esc_html__( 'WooCommerce (Theme Option)', 'calens' ) : esc_html__( 'WooCommerce', 'calens' ),
	'id'               => 'woocommerce_settings',
	'icon'             => 'el el-shopping-cart',
	'fields'           => array(
		array(
			'id'       => 'shop_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Shop Page Sidebar', 'calens' ),
			'subtitle' => esc_html__( 'Select the page sidebar position.', 'calens' ),
			'options'  => array(
				'full-width'    => array(
					'alt' => esc_html__( 'Full Width', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/sidebars/full-width.jpg' )
				),
				'left-sidebar'  => array(
					'alt' => esc_html__( 'Left Sidebar', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/sidebars/left-sidebar.jpg' ),
				),
				'right-sidebar' => array(
					'alt' => esc_html__( 'Right Sidebar', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/sidebars/right-sidebar.jpg' ),
				),
			),
			'default'  => 'right-sidebar',
		),
	),
);
