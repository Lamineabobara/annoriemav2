<?php
/**
 * Template part for header.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */

global $calens_options;

$header_layout = ( isset( $calens_options['header-layout'] ) && $calens_options['header-layout'] ) ? $calens_options['header-layout'] : 'layout-2';

$header_class  = 'site-header-container';
$header_class .= ' header-' . $header_layout;

if ( ! class_exists( 'Redux' ) ) {
	$header_class .= ' redux-disabled';
}
?>
<header id="masthead" class="<?php echo esc_attr( $header_class ); ?>">
	<?php get_template_part( 'template-parts/header/layouts/' . $header_layout ); ?>
</header>

