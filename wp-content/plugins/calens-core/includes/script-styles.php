<?php
/**
 * Script and styles for calens core plugin.
 *
 * @package Calens Core
 */

/**
 * Enqueue scripts and styles.
 */
function calenscore_scripts() {

	wp_enqueue_style( 'calens-asPieProgress', trailingslashit( CALENSCORE_URL ) . 'assets/css/asPieProgress.min.css' );

	wp_enqueue_style( 'calens-elementor-widgets', trailingslashit( CALENSCORE_URL ) . 'assets/css/elementor-widgets.css' );

	wp_enqueue_script( 'calens-asPieProgress', trailingslashit( CALENSCORE_URL ) . 'assets/js/asPieProgress.min.js', array( 'jquery' ), false, true );
	
	wp_enqueue_script( 'calens-elementor-widgets', trailingslashit( CALENSCORE_URL ) . 'assets/js/widgets.js', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'calenscore_scripts', 99 );

/**
 * Enqueue scripts and styles for admin.
 */

function calenscore_admin_scripts( $hook ) {
	wp_enqueue_script( 'calenscore-fontawesome-iconpicker', trailingslashit( CALENSCORE_URL ) . 'assets/js/fontawesome-iconpicker.min.js', array( 'jquery' ), false, true );
	wp_register_script( 'calenscore-admin', trailingslashit( CALENSCORE_URL ) . 'assets/js/admin.js', array( 'jquery' ), false, true ); 
	
	$calenscore_object = array(
		'calenscore_get_social_icons'  => calenscore_get_social_icons(),
		'calenscore_get_service_icons' => calens_vc_iconpicker_type_flaticon( array() ),
	);
	
	wp_localize_script( 'calenscore-admin', 'calenscore_object', $calenscore_object );
	wp_enqueue_script( 'calenscore-admin' );

	wp_enqueue_style( 'calenscore-admin-css', trailingslashit( CALENSCORE_URL ) . '/assets/css/admin.css', array(), '1.0.0' );
	wp_enqueue_style( 'calenscore-fontawesome-iconpicker', trailingslashit( CALENSCORE_URL ) . '/assets/css/fontawesome-iconpicker.min.css', array(), '1.0.0' );
}
add_action( 'admin_enqueue_scripts', 'calenscore_admin_scripts', 99 );
