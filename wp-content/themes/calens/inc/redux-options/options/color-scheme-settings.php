<?php
/**
 * Color Scheme
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Color Scheme', 'calens' ),
	'id'     => 'color_scheme_settings',
	'desc'   => esc_html__( 'In color schemes, you can change the site default color and set as per your site design.', 'calens' ),
	'icon'   => 'el el-brush', 
	'fields' => array(
		array(
			'id'          => 'primary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Primary Color', 'calens' ),
			'subtitle'    => esc_html__( 'Set primary color for the website.', 'calens' ),
			'transparent' => false,
			'default'     => '#28aa4a',
		),
		array(
			'id'          => 'secondary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Secondary Color', 'calens' ),
			'subtitle'    => esc_html__( 'Set secondary color for the website.', 'calens' ),
			'transparent' => false,
			'default'     => '#272727',
		),
		array(
			'id'          => 'tertiary_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Tertiary Color', 'calens' ),
			'subtitle'    => esc_html__( 'Set tertiary color for the website.', 'calens' ),
			'transparent' => false,
			'default'     => '#f6f6f6',
		),
	),
);
