<?php
/**
 * Color Scheme
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Services Settings', 'calens' ),
	'id'     => 'service_settings',
	'icon'   => 'el el-graph',
	'fields' => array(
		array(
			'id'       => 'service_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Services Sidebar', 'calens' ),
			'subtitle' => esc_html__( 'Select the services sidebar position.', 'calens' ),
			'options'  => array(
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
