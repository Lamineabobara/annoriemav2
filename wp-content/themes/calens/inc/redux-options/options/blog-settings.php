<?php
/**
 * Header Settings
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'Blog Settings', 'calens' ),
	'id'     => 'blog_settings',
	'icon'   => 'el el-blogger',
	'fields' => array(
		array(
			'id'       => 'blog_sidebar',
			'type'     => 'image_select',
			'title'    => esc_html__( 'Blog Sidebar', 'calens' ),
			'subtitle' => esc_html__( 'Select the blog sidebar position.', 'calens' ),
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
		array(
			'id'       => 'facebook_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Facebook Share', 'calens' ),
			'subtitle' => esc_html__( 'You can share post on facebook.', 'calens' ),
			'default'  => false,
		),
		array(
			'id'       => 'twitter_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Twitter Share', 'calens' ),
			'subtitle' => esc_html__( 'You can share post on twitter', 'calens' ),
			'default'  => false,
		),
		array(
			'id'       => 'linkedin_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Linkedin Share', 'calens' ),
			'subtitle' => esc_html__( 'You can share post on linkedin', 'calens' ),
			'default'  => false,
		),
		array(
			'id'       => 'pinterest_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Pinterest Share', 'calens' ),
			'subtitle' => esc_html__( 'You can share post on pinterest', 'calens' ),
			'default'  => false,
		),
		array(
			'id'       => 'tumblr_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Tumblr Share', 'calens' ),
			'subtitle' => esc_html__( 'You can share post on Tumblr', 'calens' ),
			'default'  => false,
		),
		array(
			'id'       => 'skype_share',
			'type'     => 'switch',
			'title'    => esc_html__( 'Skype Share', 'calens' ),
			'subtitle' => esc_html__( 'You can share post on Skype', 'calens' ),
			'default'  => false,
		),
	),
);
