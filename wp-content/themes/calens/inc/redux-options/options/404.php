<?php
/**
 * Color Scheme
 *
 * @package Calens
 */
return array(
	'title'            => esc_html__( '404 Page', 'calens' ),
	'id'               => '404_page',
	'customizer_width' => '400px',
	'icon'             => 'el el-warning-sign',
	'fields'           => array(
		array(
			'id'       => 'fof_page_title_type',
			'type'     => 'button_set',
			'title'    => esc_html__( 'Title Type', 'calens' ),
			'subtitle' => esc_html__( 'Select page title type', 'calens' ),
			'options'  => array(
				'text'  => esc_html__( 'Text', 'calens' ),
				'image' => esc_html__( 'Image', 'calens' ),
			), 
			'default'  => 'text',
		),
		array(
			'id'       => 'fof_page_title',
			'type'     => 'text',
			'title'    => esc_html__( 'Page Title', 'calens' ),
			'desc'     => esc_html__( 'Enter 404 page title.', 'calens' ),
			'default'  => esc_html__( '404', 'calens' ),
			'required' => array(
				array( 'fof_page_title_type', '=', 'text' ),
			),
		),
		array(
			'id'       => 'fof_page_title_image',
			'type'     => 'media',
			'url'      => true,
			'title'    => esc_html__( 'Title image', 'calens' ),
			'compiler' => 'true',
			'subtitle' => esc_html__( 'Upload tite image.', 'calens' ),
			'required' => array(
				array( 'fof_page_title_type', '=', 'image' ),
			),
		),
		array(
			'id'       => 'fof_page_description',
			'type'     => 'textarea',
			'title'    => esc_html__( 'Page Description', 'calens' ),
			'desc'     => esc_html__( 'Enter 404 page description.', 'calens' ),
			'validate' => 'html_custom',
			'default'  => 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
		),
		array(
			'id'            => 'fof_page_background',
			'type'          => 'background',
			'title'         => esc_html__( '404 Background', 'calens' ),
			'desc'          => esc_html__( 'Set 404 background.', 'calens' ),
			'preview_media' => true,
			'output'        => '.fof-page-container',
		),
		array(
			'id'      => 'fof_page_back_to_home',
			'type'    => 'switch',
			'title'   => esc_html__( 'Back to Home', 'calens' ),
			'default' => true,
		),
	),
);
