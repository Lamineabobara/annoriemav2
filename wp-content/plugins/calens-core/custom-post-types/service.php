<?php
/**
 * Register "service" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Calens Core
 */
if ( ! function_exists( 'calenscore_register_cpt_service' ) ) {
	/**
	 * Function to Register "service" custom post type.
	 */
	function calenscore_register_cpt_service() {
		$labels = array(
			'name'                  => esc_html__( 'Services', 'calens-core' ),
			'singular_name'         => esc_html__( 'Service', 'calens-core' ),
			'menu_name'             => esc_html__( 'Services', 'calens-core' ),
			'name_admin_bar'        => esc_html__( 'Service', 'calens-core' ),
			'add_new'               => esc_html__( 'Add New', 'calens-core' ),
			'add_new_item'          => esc_html__( 'Add New Service', 'calens-core' ),
			'new_item'              => esc_html__( 'New Service', 'calens-core' ),
			'edit_item'             => esc_html__( 'Edit Service', 'calens-core' ),
			'view_item'             => esc_html__( 'View Service', 'calens-core' ),
			'all_items'             => esc_html__( 'All Service', 'calens-core' ),
			'search_items'          => esc_html__( 'Search Service', 'calens-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Service:', 'calens-core' ),
			'not_found'             => esc_html__( 'No service found.', 'calens-core' ),
			'not_found_in_trash'    => esc_html__( 'No service found in Trash.', 'calens-core' ),
			'featured_image'        => esc_html__( 'Service Image', 'calens-core' ),
			'set_featured_image'    => esc_html__( 'Set Service Image', 'calens-core' ),
			'remove_featured_image' => esc_html__( 'Remove Service Image', 'calens-core' ),
			'use_featured_image'    => esc_html__( 'Use Service Image', 'calens-core' ),
		);

		$cpt_service_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'calens-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'service' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail' ),
			'menu_icon'          => 'dashicons-welcome-write-blog',
		);

		$cpt_service_args = apply_filters( 'calenscore_register_cpt_service', $cpt_service_args );

		register_post_type( 'service', $cpt_service_args );
	}
}

add_action( 'init', 'calenscore_register_cpt_service' );

/**
 * Register 'service-category' taxonomy for post type 'service'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'calenscore_register_taxonomy_service_category' ) ) {
	/**
	 * Function to register service-category taxonomy.
	 */
	function calenscore_register_taxonomy_service_category() {
		$labels = array(
			'name'                       => esc_html__( 'Service Categories', 'calens-core' ),
			'singular_name'              => esc_html__( 'Service Category', 'calens-core' ),
			'search_items'               => esc_html__( 'Search Categories', 'calens-core' ),
			'popular_items'              => esc_html__( 'Popular Categories', 'calens-core' ),
			'all_items'                  => esc_html__( 'All Categories', 'calens-core' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => esc_html__( 'Edit Category', 'calens-core' ),
			'update_item'                => esc_html__( 'Update Category', 'calens-core' ),
			'add_new_item'               => esc_html__( 'Add New Category', 'calens-core' ),
			'new_item_name'              => esc_html__( 'New Category Name', 'calens-core' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'calens-core' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Categories', 'calens-core' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'calens-core' ),
			'not_found'                  => esc_html__( 'No categories found.', 'calens-core' ),
			'menu_name'                  => esc_html__( 'Categories', 'calens-core' ),
		);

		$service_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'service-category' ),
			'show_in_rest'          => true,
		);

		$service_category_args = apply_filters( 'calenscore_register_taxonomy_service_category', $service_category_args, 'service' );

		register_taxonomy( 'service-category', 'service', $service_category_args );
	}
}

add_action( 'init', 'calenscore_register_taxonomy_service_category' );


/**
 * Register 'service-tag' taxonomy to post type 'service'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'calenscore_register_taxonomy_service_tag' ) ) {
	/**
	 * Function to register service-tag taxonomy.
	 */
	function calenscore_register_taxonomy_service_tag() {

		$labels = array(
			'name'                       => esc_html__( 'Service Tags', 'calens-core' ),
			'singular_name'              => esc_html__( 'Service Tag', 'calens-core' ),
			'search_items'               => esc_html__( 'Search Tags', 'calens-core' ),
			'popular_items'              => esc_html__( 'Popular Tags', 'calens-core' ),
			'all_items'                  => esc_html__( 'All Tags', 'calens-core' ),
			'parent_item'                => null,
			'parent_item_colon'          => null,
			'edit_item'                  => esc_html__( 'Edit Tag', 'calens-core' ),
			'update_item'                => esc_html__( 'Update Tag', 'calens-core' ),
			'add_new_item'               => esc_html__( 'Add New Tag', 'calens-core' ),
			'new_item_name'              => esc_html__( 'New Tag Name', 'calens-core' ),
			'separate_items_with_commas' => esc_html__( 'Separate categories with commas', 'calens-core' ),
			'menu_name'                  => esc_html__( 'Tags', 'calens-core' ),
			'add_or_remove_items'        => esc_html__( 'Add or remove Tag', 'calens-core' ),
			'choose_from_most_used'      => esc_html__( 'Choose from the most used Categories', 'calens-core' ),
		);

		$service_tag_args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'singular_name'     => esc_html__( 'Tag', 'calens-core' ),
			'show_admin_column' => true,
			'rewrite'           => true,
			'query_var'         => true,
			'show_in_rest'      => true,
		);

		$service_tag_args = apply_filters( 'calenscore_register_taxonomy_service_tag', $service_tag_args, 'service' );

		register_taxonomy( 'service-tag', 'service', $service_tag_args );
	}
}

add_action( 'init', 'calenscore_register_taxonomy_service_tag' );
