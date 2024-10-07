<?php // phpcs:ignore WPThemeReview.Templates.ReservedFileNamePrefix.ReservedTemplatePrefixFound
/**
 * Header Settings
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Page Title Settings', 'calens' ),
	'id'     => 'page_title_settings',
	'icon'   => 'el el-file-edit',
	'fields' => array(
		array(
			'id'      => 'display_page_title',
			'type'    => 'switch',
			'title'   => esc_html__( 'Page Title', 'calens' ),
			'default' => 1,
			'on'      => esc_html__( 'On', 'calens' ),
			'off'     => esc_html__( 'Off', 'calens' ),
		),
		array(
			'id'       => 'page_title_height',
			'type'     => 'slider',
			'title'    => esc_html__( 'Page Title Height', 'calens' ),
			'desc'     => esc_html__( 'Set height for the Page Title.', 'calens' ),
			'default'  => 300,
			'min'      => 100,
			'step'     => 1,
			'max'      => 600,
			'required' => array(
				array( 'display_page_title', '=', 1 ),
			),
		),
		array(
			'id'       => 'display_breadcrumb',
			'type'     => 'switch',
			'title'    => esc_html__( 'Display Breadcrumb ?', 'calens' ),
			'default'  => 1,
			'on'       => esc_html__( 'On', 'calens' ),
			'off'      => esc_html__( 'Off', 'calens' ),
			'required' => array(
				array( 'display_page_title', '=', 1 ),
			),
		),
		array(
			'id'       => 'page_title_alignment',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Title Alignment', 'calens' ),
			'subtitle' => esc_html__( 'Select page title alignment', 'calens' ),
			'options'  => array(
				'left'   => esc_html__( 'Left', 'calens' ),
				'right'  => esc_html__( 'Right', 'calens' ),
				'center' => esc_html__( 'Center', 'calens' ),
			),
			'default'  => 'left',
		),
		array(
			'id'       => 'page_title_text_color',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Title Text Color', 'calens' ),
			'subtitle' => esc_html__( 'Select page title alignment', 'calens' ),
			'default'  => 'dark',
			'options'  => array(
				'light' => esc_html__( 'Light', 'calens' ),
				'dark'  => esc_html__( 'Dark', 'calens' ),
			),
		),
		array(
			'id'               => 'page_title_banner_image',
			'type'             => 'background',
			'title'            => esc_html__( 'Background Image', 'calens' ),
			'desc'             => esc_html__( 'Set page background image.', 'calens' ),
			'background-color' => false,
			'preview_media'    => true,
			'default'          => array(
				'background-size'   => 'cover',
				'background-repeat' => 'no-repeat',
			),
			'output'           => '.tcr-page-title',
			'required'         => array(
				array( 'display_page_title', '=', 1 ),
			),
		),
		array(
			'id'       => 'page_title_background_color',
			'type'     => 'color',
			'title'    => esc_html__( 'Background Color', 'calens' ),
			'mode'     => 'background-color',
			'output'   => array( 'background-color' => '.tcr-page-title' ),
			'default'  => '#f8f8f8',
			'required' => array(
				array( 'display_page_title', '=', 1 ),
			),
		),
	),
);
