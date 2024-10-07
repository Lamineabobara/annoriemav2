<?php
/**
 * Register widgets.
 *
 * @package calens Core
 *
 * @version 1.0.0
 */

/**
 * Call Widgets loaded.
 */
function calenscore_widgets() {
	require_once trailingslashit( CALENSCORE_PATH ) . '/includes/widgets/class-calens-widget-recent-services.php';
	require_once trailingslashit( CALENSCORE_PATH ) . '/includes/widgets/class-calens-widget-recent-posts.php';
}
add_action( 'plugins_loaded', 'calenscore_widgets', 99 );

/**
 * Register widgets
 */
function calenscore_widgets_init() {
	register_widget( 'Calens_Widget_Recent_Services' );
	register_widget( 'Calens_Widget_Recent_Posts' );
}
add_action( 'widgets_init', 'calenscore_widgets_init' );
