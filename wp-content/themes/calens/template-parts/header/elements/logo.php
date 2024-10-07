<?php
/**
 * Template part for header logo.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */

global $calens_options;

$logo_url = get_parent_theme_file_uri( 'assets/images/logo.png' );
if ( isset( $calens_options['site-logo']['url'] ) ) {
	$logo_url = $calens_options['site-logo']['url'];
}

$sticky_logo_url = get_parent_theme_file_uri( 'assets/images/logo.png' );
if ( isset( $calens_options['sticky-site-logo']['url'] ) ) {
	$sticky_logo_url = $calens_options['sticky-site-logo']['url'];
}
?>
<div class="site-logo">
	<a href="<?php echo esc_url( get_home_url() ); ?>" rel="home">
		<img class="img-fluid" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/>
	</a>
</div>

<div class="sticky-site-logo">
	<a href="<?php echo esc_url( get_home_url() ); ?>" rel="home">
		<img class="img-fluid" src="<?php echo esc_url( $sticky_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"/>
	</a>
</div>
