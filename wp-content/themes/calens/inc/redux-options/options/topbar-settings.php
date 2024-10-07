<?php
/**
 * Header Settings
 *
 * @package calens
 */
return array(
	'title'  => esc_html__( 'Topbar Settings', 'calens' ),
	'id'     => 'topbar_settings',
	'icon'   => 'el el-minus ',
	'fields' => array(
		array(
			'id'      => 'display-topbar',
			'type'    => 'switch',
			'title'   => esc_html__( 'Display Topbar', 'calens' ),
			'default' => 0,
			'on'      => esc_html__( 'On', 'calens' ),
			'off'     => esc_html__( 'Off', 'calens' ),
		),
		array(
			'id'          => 'topbar_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Topbar Text Color', 'calens' ),
			'subtitle'    => esc_html__( 'Set Topbar Text color for the website.', 'calens' ),
			'transparent' => false,
			'default'     => '#000',
			'required'    => array( 'display-topbar', '=', 1 ),
		),
		array(
			'id'          => 'topbar_bg_color',
			'type'        => 'color',
			'title'       => esc_html__( 'Topbar Background Color', 'calens' ),
			'subtitle'    => esc_html__( 'Set Topbar Background color for the website.', 'calens' ),
			'transparent' => false,
			'default'     => '#fff',
			'required'    => array( 'display-topbar', '=', 1 ),
		),
		array(
			'id'       => 'topbar-info-section',
			'type'     => 'section',
			'title'    => esc_html__( 'Topbar Info', 'calens' ),
			'indent'   => true,
			'required' => array( 'display-topbar', '=', 1 ),
		),
		array(
			'id'       => 'topbar_info_left',
			'type'     => 'editor',
			'title'    => esc_html__( 'Topbar Info Left', 'calens' ),
			'validate' => 'html_custom',
			'required' => array( 'display-topbar', '=', 1 ),
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
		),
		array(
			'id'       => 'topbar_info_right',
			'type'     => 'editor',
			'title'    => esc_html__( 'Topbar Info Right', 'calens' ),
			'validate' => 'html_custom',
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
			'required' => array( 'display-topbar', '=', 1 ),
		),
	),
);
