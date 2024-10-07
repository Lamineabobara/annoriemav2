<?php
/**
 * Functiion that generates the template class
 *
 * @package Calens
 */

if ( ! function_exists( 'calens_grid_column_classes' ) ) {
	/**
	 * Returns the classes.
	 *
	 * @return string
	 */
	function calens_grid_column_classes() {
		global $calens_options;
		
		$sidebar_position = 'right-sidebar';
		$current_sidebar  = ( function_exists( 'calens_get_current_sidebar' ) ) ? calens_get_current_sidebar() : '';
		
		if ( is_active_sidebar( $current_sidebar ) ) {
			if ( is_page() ) {
				if ( function_exists( 'is_shop' ) && is_shop() ) {
					$sidebar_position = ( isset( $calens_options['shop_sidebar'] ) && $calens_options['shop_sidebar'] ) ? $calens_options['shop_sidebar'] : $sidebar_position;
				} else {
					$sidebar_position = ( isset( $calens_options['page_sidebar'] ) && $calens_options['page_sidebar'] ) ? $calens_options['page_sidebar'] : $sidebar_position;
				}
			} elseif ( is_search() ) {
				$sidebar_position = 'right-sidebar';
			} elseif ( is_singular( 'service' ) ) {
				$sidebar_position = ( isset( $calens_options['service_sidebar'] ) && $calens_options['service_sidebar'] ) ? $calens_options['service_sidebar'] : $sidebar_position;
			} elseif ( is_home() || is_archive() || is_singular( 'post' ) ) {
				$sidebar_position = ( isset( $calens_options['blog_sidebar'] ) && $calens_options['blog_sidebar'] ) ? $calens_options['blog_sidebar'] : $sidebar_position;
			} elseif ( function_exists( 'is_product' ) && is_product() ) {
				$sidebar_position = 'no-sidebar';
			}

			if ( 'left-sidebar' === $sidebar_position ) {
				$grid_classes = 'col-sm-12 col-md-12 col-lg-8 col-xl-9 order-xl-2 order-lg-2';
			} elseif ( 'right-sidebar' === $sidebar_position ) {
				$grid_classes = 'col-sm-12 col-md-12 col-lg-8 col-xl-9';
			} else {
				$grid_classes = 'col-sm-12 col-md-12 col-lg-12 col-xl-12';
			}
		} else {
			$grid_classes = 'col-sm-12 col-md-12 col-lg-12 col-xl-12';
		}

		return $grid_classes;
	}
}

if ( ! function_exists( 'calens_post_classes' ) ) {
	/**
	 * Add additional class for post.
	 *
	 * @param  array  $classes classes.
	 * @param  string $class class.
	 * @param  int    $post_id post id.
	 * @return array
	 */
	function calens_post_classes( $classes, $class, $post_id ) {

		if ( ! has_post_thumbnail() ) {
			$classes[] = 'without-image';
		}

		return $classes;
	}
}
add_filter( 'post_class', 'calens_post_classes', 10, 3 );
