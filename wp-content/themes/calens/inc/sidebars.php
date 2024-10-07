<?php
/**
 * Calens Sidebars
 *
 * @package Calens
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function calens_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'calens' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Blog Sidebar.', 'calens' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	if ( class_exists( 'Redux' ) ) {
		// Footer sidebars.
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer column 1', 'calens' ),
				'id'            => 'footer-column-1',
				'description'   => esc_html__( 'Add widgets here.', 'calens' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer column 2', 'calens' ),
				'id'            => 'footer-column-2',
				'description'   => esc_html__( 'Add widgets here.', 'calens' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer column 3', 'calens' ),
				'id'            => 'footer-column-3',
				'description'   => esc_html__( 'Add widgets here.', 'calens' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			) 
		);
		
		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer column 4', 'calens' ),
				'id'            => 'footer-column-4',
				'description'   => esc_html__( 'Add widgets here.', 'calens' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);
	}

	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'calens' ),
			'id'            => 'page-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'calens' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Service Sidebar', 'calens' ),
			'id'            => 'service-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'calens' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Shop Sidebar', 'zaver' ),
			'id'            => 'shop-sidebar',
			'description'   => esc_html__( 'Add widgets to dispplay on the shop page.', 'zaver' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);
}
add_action( 'widgets_init', 'calens_widgets_init' );

