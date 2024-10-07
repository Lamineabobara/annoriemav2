<?php // phpcs:ignore WPThemeReview.Templates.ReservedFileNamePrefix.ReservedTemplatePrefixFound
/**
 * Header Settings
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Page Settings', 'calens' ),
	'id'     => 'page_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'       => 'page_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Page Sidebar', 'calens' ),
			'subtitle' => esc_html__( 'Select the page sidebar position.', 'calens' ),
			'options'  => array(
				'full-width'    => array(
					'alt' => esc_html__( 'Full Width', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/sidebars/full-width.jpg' ),
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
