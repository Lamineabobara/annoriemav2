<?php
/**
 * Plugin Name:       Calens Core
 * Description:       This is core plugin for Calens themes.
 * Version:           2.1.1
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       calens-core
 *
 * @package Calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CALENSCORE_PATH', plugin_dir_path( __FILE__ ) );
define( 'CALENSCORE_URL', plugin_dir_url( __FILE__ ) );

/**
 * Load plugin textdomain.
 *
 * @since 1.0.0
 */
function calenscore_load_textdomain() {
	load_plugin_textdomain( 'calens-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}
add_action( 'plugins_loaded', 'calenscore_load_textdomain' );

/**
 * Required theme post types
 */
require_once trailingslashit( CALENSCORE_PATH ) . 'custom-post-types/custom-post-types.php';

/**
 * Required theme post meta fields
 */
require_once trailingslashit( CALENSCORE_PATH ) . 'includes/custom-post-metas.php';

/**
 * Load helper functions.
 */
require_once trailingslashit( CALENSCORE_PATH ) . 'includes/helper-functions.php';

/**
 * Load script style
 */
require_once trailingslashit( CALENSCORE_PATH ) . 'includes/script-styles.php';

/**
 * Load widgets
 */
require_once trailingslashit( CALENSCORE_PATH ) . 'includes/widgets.php';

/**
 * Load Elementor widgets
 */
require_once trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/class-calens-elementor-widgets.php';


