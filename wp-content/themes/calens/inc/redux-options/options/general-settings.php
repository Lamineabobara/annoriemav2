<?php // phpcs:ignore WPThemeReview.Templates.ReservedFileNamePrefix.ReservedTemplatePrefixFound
/**
 * Header Settings
 *
 * @package Calens
 */
return array(
	'title'  => esc_html__( 'General Settings', 'calens' ),
	'id'     => 'general_settings',
	'icon'   => 'el el-dashboard ',
	'fields' => array(
		array(
			'id'       => 'scroll_to_top',
			'type'     => 'switch',
			'title'    => esc_html__( 'Scroll To Top', 'calens' ),
			'subtitle' => esc_html__( 'Enable "scroll to top".', 'calens' ),
			'default'  => true,
		),
	),
);
