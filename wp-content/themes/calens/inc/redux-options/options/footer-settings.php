<?php
/**
 * Footer Settings
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Footer Settings', 'calens' ),
	'id'     => 'footer_settings',
	'icon'   => 'el el-align-center',
	'fields' => array(
		array(
			'id'       => 'footer_topbar_enable',
			'type'     => 'switch',
			'title'    => esc_html__( 'Footer Topbar Enable', 'calens' ),
			'subtitle' => esc_html__( 'Enable the footer topbar.', 'calens' ),
			'default'  => false,
		),
		array(
			'id'       => 'footer_social_infos',
			'type'     => 'editor',
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
			'title'    => esc_html__( 'Footer Social Info', 'calens' ),
			'required' => array(
				array( 'footer_topbar_enable', '=', 1 ),
			),
		),
		array(
			'id'       => 'footer_contact_infobox',
			'type'     => 'editor',
			'title'    => esc_html__( 'Contact Infobox', 'calens' ),
			'validate' => 'html_custom',
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
			'required' => array(
				array( 'footer_topbar_enable', '=', 1 ),
			),
		),
		array(
			'id'            => 'footer_topbar_background',
			'type'          => 'background',
			'title'         => esc_html__( 'Footer Topbar Background', 'calens' ),
			'desc'          => esc_html__( 'Set topbar background.', 'calens' ),
			'preview_media' => true,
			'output'        => '.site-footer .footer-topbar',			
			'default'       => array(
				'background-color' => '#212121',
			),
			'required'      => array(
				array( 'footer_topbar_enable', '=', 1 ),
			),
		),
		array(
			'id'       => 'footer_layout',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Footer Column layout', 'calens' ),
			'subtitle' => esc_html__( 'Please select the footer layout.', 'calens' ),
			'options'  => array(
				'6-6'     => array(
					'alt' => esc_html__( 'Footer column 6 - 6', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-6.jpg' ),
				),
				'8-4'     => array(
					'alt' => esc_html__( 'Footer column 8 - 4', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-8-4.jpg' ),
				),
				'4-8'     => array(
					'alt' => esc_html__( 'Footer column 4 - 8', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-8.jpg' ),
				),
				'4-4-4'   => array(
					'alt' => esc_html__( 'Footer column 4 - 4 - 4', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-4-4-4.jpg' ),
				),
				'3-3-3-3' => array(
					'alt' => esc_html__( 'Footer column 3 - 3 - 3 - 3', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-3-3-3-3.jpg' ),
				),
				'6-3-3'   => array(
					'alt' => esc_html__( 'Footer column 6 - 3 - 3', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-3-3.jpg' ),
				),
				'3-3-6'   => array(
					'alt' => esc_html__( 'Footer column 3 - 3 - 6', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-3-3-6.jpg' ),
				),
				'8-2-2'   => array(
					'alt' => esc_html__( 'Footer column 8 - 2 - 2', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-8-2-2.jpg' ),
				),
				'2-2-8'   => array(
					'alt' => esc_html__( 'Footer column 2 - 2 - 8', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-8.jpg' ),
				),
				'6-2-2-2' => array(
					'alt' => esc_html__( 'Footer column 6 - 2 - 2 - 2', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-6-2-2-2.jpg' ),
				),
				'2-2-2-6' => array(
					'alt' => esc_html__( 'Footer column 2 - 2 - 2 - 6', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-2-6.jpg' ),
				),
				'2-2-4-4' => array(
					'alt' => esc_html__( 'Footer column 2 - 2 - 4 - 4', 'calens' ),
					'img' => get_parent_theme_file_uri( 'assets/images/theme-options/footer-settings/footer-2-2-4-4.jpg' ),
				),
			),
			'default'  => '3-3-3-3',
		),
		array(
			'id'            => 'footer_background',
			'type'          => 'background',
			'title'         => esc_html__( 'Footer Background', 'calens' ),
			'desc'          => esc_html__( 'Set footer background.', 'calens' ),
			'preview_media' => true,
			'output'        => '.site-footer',
			'default'       => array(
				'background-color' => '#252525',
			),
		),
		array(
			'id'            => 'footer_bottom_background',
			'type'          => 'background',
			'title'         => esc_html__( 'Footer Bottom Bar Background', 'calens' ),
			'desc'          => esc_html__( 'Set bottom bar background.', 'calens' ),
			'preview_media' => true,
			'output'        => '.tcr-copyright .footer-bottombar',
		),
		array(
			'id'       => 'copyright_text_left',
			'type'     => 'editor',
			'title'    => esc_html__( 'Copyright Text Left', 'calens' ),
			'subtitle' => esc_html__( 'Enter the copyright right content', 'calens' ),
			'default'  => 'Develop and design by <a href="#">Calens</a>',
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
		),
		array(
			'id'       => 'copyright_text_right',
			'type'     => 'editor',
			'args'     => array(
				'tinymce' => array(
					'valid_elements' => '*[*]',
				),
			),
			'title'    => esc_html__( 'Copyright Text Right', 'calens' ),
			'subtitle' => esc_html__( 'Enter the copyright right content', 'calens' ),
		),
	),
);
