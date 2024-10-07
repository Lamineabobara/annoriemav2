<?php
/**
 * Header Settings
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Header Settings', 'calens' ),
	'id'     => 'header_settings',
	'icon'   => 'el el-credit-card',
	'fields' => array(
		array(
			'id'       => 'header-layout',
			'type'     => 'select',
			'title'    => esc_html__( 'Select Header Layout', 'calens' ),
			'subtitle' => esc_html__( 'Please select the header style to display.', 'calens' ),
			'options'  => array(
				'layout-1' => esc_html__( 'Header Layout 1', 'calens' ),
				'layout-2' => esc_html__( 'Header Layout 2', 'calens' ),
				'layout-3' => esc_html__( 'Header Layout 3', 'calens' ),
			),
			'default'  => 'layout-2',
		),
		array(
			'id'       => 'sticky-header',
			'type'     => 'switch',
			'title'    => esc_html__( 'Sticky header', 'crator' ),
			'default'  => 1,
			'subtitle' => esc_html__( 'Enable to display sticky header while scrolling.', 'crator' ),
			'on'       => esc_html__( 'On', 'crator' ),
			'off'      => esc_html__( 'Off', 'crator' ),
		),
		array(
			'id'       => 'display-search-icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Search', 'calens' ),
			'default'  => 1,
			'subtitle' => esc_html__( 'Enable to display the search in header.', 'calens' ),
			'on'       => esc_html__( 'On', 'calens' ),
			'off'      => esc_html__( 'Off', 'calens' ),
		),
		array(
			'id'       => 'display-cart-icon',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display cart', 'calens' ),
			'default'  => 1,
			'subtitle' => esc_html__( 'Enable to display the cart in header. Note : Make sure WooCommerce plugin is enabled.', 'calens' ),
			'on'       => esc_html__( 'On', 'calens' ),
			'off'      => esc_html__( 'Off', 'calens' ),
		),
		array(
			'id'       => 'contact_infobox',
			'type'     => 'editor',
			'title'    => esc_html__( 'Contact Infobox', 'calens' ),
			'validate' => 'html_custom',
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
		),
		array(
			'id'       => 'office_address',
			'type'     => 'text',
			'title'    => esc_html__( 'Office Address', 'calens' ),
			'subtitle' => esc_html__( 'Enter office address.', 'calens' ),
		),
		array(
			'id'       => 'contact_email',
			'type'     => 'text',
			'title'    => esc_html__( 'Contact Mail', 'calens' ),
			'subtitle' => esc_html__( 'Enter contact email.', 'calens' ),
		),
		array(
			'id'       => 'header_button_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Button Title', 'calens' ),
			'subtitle' => esc_html__( 'Enter button title.', 'calens' ),
		),
		array(
			'id'       => 'header_button_liink',
			'type'     => 'text',
			'title'    => esc_html__( 'Button link', 'calens' ),
			'subtitle' => esc_html__( 'Enter button link.', 'calens' ),
		),
		array(
			'id'     => 'site-logo-section',
			'type'   => 'section',
			'title'  => esc_html__( 'Site Logo Setting', 'calens' ),
			'indent' => true,
		),
		array(
			'id'       => 'site-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Site Logo', 'calens' ),
			'compiler' => 'true',
			'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo.png' ) ),
			'subtitle' => esc_html__( 'Upload image for logo.', 'calens' ),
		),
		array(
			'id'       => 'site-logo-height',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Logo Height', 'calens' ),
			'compiler' => 'true',
			'width'    => false,
			'units'    => array( 'px' ),
			'subtitle' => esc_html__( 'Add the logo max height.', 'calens' ),
			'default'  => array(
				'height' => '50',
				'units'  => 'px',
			),
		),
		array(
			'id'       => 'sticky-site-logo',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Sticky Site Logo', 'calens' ),
			'compiler' => 'true',
			'default'  => array( 'url' => get_parent_theme_file_uri( 'assets/images/logo.png' ) ),
			'subtitle' => esc_html__( 'Upload image for logo.', 'calens' ),
		),
		array(
			'id'       => 'sticky-site-logo-height',
			'type'     => 'dimensions',
			'title'    => esc_html__( 'Sticky Logo Height', 'calens' ),
			'compiler' => 'true',
			'width'    => false,
			'units'    => array( 'px' ),
			'subtitle' => esc_html__( 'Add the logo max height.', 'calens' ),
			'default'  => array(
				'height' => '50',
				'units'  => 'px',
			),
		),
	),
);
