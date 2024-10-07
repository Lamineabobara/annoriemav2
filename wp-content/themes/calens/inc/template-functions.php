<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Calens
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function calens_body_classes( $classes ) {
	global $calens_options;
	
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if ( function_exists( 'is_shop' ) && is_shop() ) {
		$sidebar_position = ( isset( $calens_options['shop_sidebar'] ) && $calens_options['shop_sidebar'] ) ? $calens_options['shop_sidebar'] : $sidebar_position;
		$classes[] = 'shop-' . $sidebar_position;
	}

	return $classes;
}
add_filter( 'body_class', 'calens_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function calens_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'calens_pingback_header' );

if ( ! function_exists( 'calens_get_current_sidebar' ) ) {
	/**
	 * Get the current sidebar.
	 */
	function calens_get_current_sidebar() {

		$sidebar_position = calens_sidebar_position();
		if ( 'full-width' === $sidebar_position ) {
			return false;
		}

		if ( is_page() ) {
			if ( function_exists( 'is_shop' ) && is_shop() ) {
				$current_sidebar = 'shop-sidebar';
			} else {
				$current_sidebar = 'page-sidebar';
			}
		} elseif ( is_search() ) {
			$current_sidebar = 'sidebar-1';
		} elseif ( is_singular( 'service' ) ) {
			$current_sidebar = 'service-sidebar';
		} elseif ( is_home() || is_archive() || is_singular( 'post' ) ) {
			$current_sidebar = 'sidebar-1';
		} else {
			$current_sidebar = 'sidebar-1';
		}

		return $current_sidebar;
	}
}

if ( ! function_exists( 'calens_sidebar_position' ) ) {
	/**
	 * Get the current sidebar position.
	 */
	function calens_sidebar_position() {
		global $calens_options;
		
		$sidebar_position = 'right-sidebar';
		
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
		}

		return $sidebar_position;
	}
}

if ( ! function_exists( 'calens_get_breadcrumbs' ) ) {
	/**
	 * Get breadcrumb.
	 */
	function calens_get_breadcrumbs() {

		$home_url         = home_url( '/' );
		$home_text        = esc_html__( 'Home', 'calens' );
		$link_before      = '<span class="tcr-readcrumb">';
		$link_after       = '</span>';
		$link             = $link_before . '<a href="%1$s">%2$s</a>' . $link_after;
		$delimiter        = ' <i class="fas fa-circle"></i> '; 
		$before           = '<span class="current">';
		$after            = '</span>';
		$page_addon       = '';
		$breadcrumb_trail = '';
		$category_links   = '';
		$wp_the_query     = $GLOBALS['wp_the_query'];
		$queried_object   = $wp_the_query->get_queried_object();

		if ( is_singular() ) {
			$post_object    = sanitize_post( $queried_object );
			$title          = $post_object->post_title;
			$parent         = $post_object->post_parent;
			$post_type      = $post_object->post_type;
			$post_id        = $post_object->ID;
			$post_link      = $before . $title . $after;
			$parent_string  = '';
			$post_type_link = '';

			if ( 'post' === $post_type ) {
				$categories = get_the_category( $post_id );
				if ( $categories ) {
					$category       = $categories[0];
					$category_links = get_category_parents( $category, true, $delimiter );
					$category_links = str_replace( '<a', $link_before . '<a', $category_links );
					$category_links = str_replace( '</a>', '</a>' . $link_after, $category_links );
				}
			}

			if ( ! in_array( $post_type, [ 'post', 'page', 'attachment' ], true ) ) {
				$post_type_object = get_post_type_object( $post_type );
				$archive_link     = esc_url( get_post_type_archive_link( $post_type ) );
				$post_type_link   = sprintf( $link, $archive_link, $post_type_object->labels->singular_name );
			}

			if ( 0 !== $parent ) {
				$parent_links = [];
				while ( $parent ) {
					$post_parent = get_post( $parent );

					$parent_links[] = sprintf( $link, esc_url( get_permalink( $post_parent->ID ) ), get_the_title( $post_parent->ID ) );

					$parent = $post_parent->post_parent;
				}

				$parent_links = array_reverse( $parent_links );

				$parent_string = implode( $delimiter, $parent_links );
			}

			if ( $parent_string ) {
				$breadcrumb_trail = $parent_string . $delimiter . $post_link;
			} else {
				$breadcrumb_trail = $post_link;
			}

			if ( $post_type_link ) {
				$breadcrumb_trail = $post_type_link . $delimiter . $breadcrumb_trail;
			}

			if ( $category_links ) {
				$breadcrumb_trail = $category_links . $breadcrumb_trail;
			}
		}

		if ( is_archive() ) {
			if ( is_category() || is_tag() || is_tax() ) {
				$term_object        = get_term( $queried_object );
				$taxonomy           = $term_object->taxonomy;
				$term_id            = $term_object->term_id;
				$term_name          = $term_object->name;
				$term_parent        = $term_object->parent;
				$taxonomy_object    = get_taxonomy( $taxonomy );
				$current_term_link  = $before . $taxonomy_object->labels->singular_name . ': ' . $term_name . $after;
				$parent_term_string = '';

				if ( 0 !== $term_parent ) {
					$parent_term_links = [];
					while ( $term_parent ) {
						$term                = get_term( $term_parent, $taxonomy );
						$parent_term_links[] = sprintf( $link, esc_url( get_term_link( $term ) ), $term->name );
						$term_parent         = $term->parent;
					}

					$parent_term_links  = array_reverse( $parent_term_links );
					$parent_term_string = implode( $delimiter, $parent_term_links );
				}

				if ( $parent_term_string ) {
					$breadcrumb_trail = $parent_term_string . $delimiter . $current_term_link;
				} else {
					$breadcrumb_trail = $current_term_link;
				}
			} elseif ( is_author() ) {
				$breadcrumb_trail = esc_html__( 'Author archive for ', 'calens' ) . $before . $queried_object->data->display_name . $after;
			} elseif ( is_date() ) {
				$year  = $wp_the_query->query_vars['year'];
				$month = $wp_the_query->query_vars['monthnum'];
				$day   = $wp_the_query->query_vars['day'];

				if ( $month ) {
					$date_time  = DateTime::createFromFormat( '!m', $month );
					$month_name = $date_time->format( 'F' );
				}

				if ( is_year() ) {
					$breadcrumb_trail = $before . $year . $after;
				} elseif ( is_month() ) {
					$year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );
					$breadcrumb_trail = $year_link . $delimiter . $before . $month_name . $after;

				} elseif ( is_day() ) {
					$year_link        = sprintf( $link, esc_url( get_year_link( $year ) ), $year );
					$month_link       = sprintf( $link, esc_url( get_month_link( $year, $month ) ), $month_name );
					$breadcrumb_trail = $year_link . $delimiter . $month_link . $delimiter . $before . $day . $after;
				}
			} elseif ( is_post_type_archive() ) {
				$post_type        = $wp_the_query->query_vars['post_type'];
				$post_type_object = get_post_type_object( $post_type );
				$breadcrumb_trail = $before . $post_type_object->labels->singular_name . $after;
			}
		}

		if ( is_search() ) {
			$breadcrumb_trail = esc_html__( 'Search query for: ', 'calens' ) . $before . get_search_query() . $after;
		}

		if ( is_paged() ) {
			$current_page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : get_query_var( 'page' );
			/* translators: 1: current page */
			$page_addon = $before . sprintf( esc_html__( ' ( Page %s )', 'calens' ), number_format_i18n( $current_page ) ) . $after;
		}

		$breadcrumb_output_link  = '';
		$breadcrumb_output_link .= '<div class="breadcrumb">';
		if ( is_home() || is_front_page() ) {
			$page_for_posts          = get_option( 'page_for_posts' );
			$post_link               = $before . get_the_title( $page_for_posts ) . $after;
			$breadcrumb_trail        = $delimiter . $post_link;
			$breadcrumb_output_link .= '<a href="' . $home_url . '">' . $home_text . '</a>';
			$breadcrumb_output_link .= $breadcrumb_trail;
			$breadcrumb_output_link .= $page_addon;
		} else {
			$breadcrumb_output_link .= '<a href="' . $home_url . '">' . $home_text . '</a>';
			$breadcrumb_output_link .= $delimiter;
			$breadcrumb_output_link .= $breadcrumb_trail;
			$breadcrumb_output_link .= $page_addon;
		}
		$breadcrumb_output_link .= '</div>';

		return $breadcrumb_output_link;
	}
}


add_filter( 'woocommerce_add_to_cart_fragments', 'calens_add_to_cart_fragments' );
if ( ! function_exists( 'calens_add_to_cart_fragments' ) ) {
	function calens_add_to_cart_fragments( $fragments ) {

		ob_start();
		$count = WC()->cart->get_cart_contents_count();
		if ( $count > 9 ) {
			$count = '9+';
		}
		?>
		<span class="cart-count"><?php echo esc_html( $count ); ?></span>
		<?php
		$fragments['.cart-count'] = ob_get_clean();

		return $fragments;
	}
}

if ( ! function_exists( 'calens_comment_form_field' ) ) {
	/**
	 * Function for comment field order.
	 *
	 * @since  1.0.0
	 *
	 * @param  array $fields fields array.
	 * @return array
	 */
	function calens_comment_form_field( $fields ) {

		$comment_field = isset( $fields['comment'] ) ? $fields['comment'] : '';
		$cookies_field = isset( $fields['cookies'] ) ? $fields['cookies'] : '';

		unset( $fields['comment'] );
		unset( $fields['cookies'] );

		$fields['comment'] = $comment_field;
		$fields['cookies'] = $cookies_field;

		return $fields;
	}
}
add_filter( 'comment_form_fields', 'calens_comment_form_field' );

if ( ! function_exists( 'calens_widget_categories_args' ) ) {
	/**
	 * Change the walker for the categories widget.
	 *
	 * @param  array $instance fields array.
	 * @param  array $cat_args fields array.
	 * @return array
	 */
	function calens_widget_categories_args( $cat_args, $instance ) {
		$cat_args['walker'] = new Calens_Walker_Category;
		return $cat_args;
	}
}
add_filter( 'widget_categories_args', 'calens_widget_categories_args', 10, 2 );

if ( ! function_exists( 'calens_archive_count' ) ) {
	/**
	 * Change the sturcture for the archives link.
	 *
	 * @param  string $links string.
	 * @return string
	 */
	function calens_archive_count( $links ) {
		$links = str_replace( '&nbsp;(', '<span>', $links );
		$links = str_replace( ')', '</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'calens_archive_count' );

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

/**
 * Cart count
 * Displayed a cart total
 *
 * @return void
 * @since  1.0.0
 */
function calens_cart_count() {
	$cart_count = WC()->cart->get_cart_contents_count();

	if ( $cart_count > 9 ) {
		$cart_count = '9+';
	}
	?>
	<span class="tcr-cart-count"><?php echo esc_html( $cart_count ); ?></span>
	<?php
}

add_filter( 'woocommerce_add_to_cart_fragments', 'calens_cart_fragment' );
function calens_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();
	calens_cart_count();
	$fragments['.tcr-mini-cart-wrapper .tcr-cart-count'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_widget_cart_is_hidden', 'calens_woocommerce_widget_cart_is_hidden' );
function calens_woocommerce_widget_cart_is_hidden() {
	return false;
}