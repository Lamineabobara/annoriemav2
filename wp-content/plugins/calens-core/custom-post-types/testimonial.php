<?php
/**
 * Register "testimonial" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Calens Core
 */
if ( ! function_exists( 'calenscore_register_cpt_testimonial' ) ) {
	/**
	 * Function to Register "testimonial" custom post type.
	 */
	function calenscore_register_cpt_testimonial() {
		$labels = array(
			'name'                  => esc_html__( 'Testimonial', 'calens-core' ),
			'singular_name'         => esc_html__( 'Testimonial', 'calens-core' ),
			'menu_name'             => esc_html__( 'Testimonial', 'calens-core' ),
			'name_admin_bar'        => esc_html__( 'Testimonial', 'calens-core' ),
			'add_new'               => esc_html__( 'Add New', 'calens-core' ),
			'add_new_item'          => esc_html__( 'Add New Testimonial', 'calens-core' ),
			'new_item'              => esc_html__( 'New Testimonial', 'calens-core' ),
			'edit_item'             => esc_html__( 'Edit Testimonial', 'calens-core' ),
			'view_item'             => esc_html__( 'View Testimonial', 'calens-core' ),
			'all_items'             => esc_html__( 'All Testimonial', 'calens-core' ),
			'search_items'          => esc_html__( 'Search Testimonial', 'calens-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Testimonial:', 'calens-core' ),
			'not_found'             => esc_html__( 'No Testimonial found.', 'calens-core' ),
			'not_found_in_trash'    => esc_html__( 'No Testimonial found in Trash.', 'calens-core' ),
			'featured_image'        => esc_html__( 'Testimonial Image', 'calens-core' ),
			'set_featured_image'    => esc_html__( 'Set Testimonial Image', 'calens-core' ),
			'remove_featured_image' => esc_html__( 'Remove Testimonial Image', 'calens-core' ),
			'use_featured_image'    => esc_html__( 'Use Testimonial Image', 'calens-core' ),
		);

		$cpt_testimonial_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'calens-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'testimonial' ),
			'capability_type'    => 'post',
			'has_archive'        => false,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'thumbnail', 'excerpt' ),
			'menu_icon'          => 'dashicons-businessman',
		);

		$cpt_testimonial_args = apply_filters( 'calenscore_register_cpt_testimonial', $cpt_testimonial_args );

		register_post_type( 'testimonial', $cpt_testimonial_args );
	}
}

add_action( 'init', 'calenscore_register_cpt_testimonial' );

/**
 * Register 'testimonial-category' taxonomy for post type 'testimonial'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'calenscore_register_taxonomy_testimonial_category' ) ) {
	/**
	 * Function to register testimonial-category taxonomy.
	 */
	function calenscore_register_taxonomy_testimonial_category() {
		$labels = array(
			'name'                       => esc_html__( 'Testimonial Categories', 'calens-core' ),
			'singular_name'              => esc_html__( 'Testimonial Category', 'calens-core' ),
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

		$testimonial_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'testimonial-category' ),
			'show_in_rest'          => true,
		);

		$testimonial_category_args = apply_filters( 'calenscore_register_taxonomy_testimonial_category', $testimonial_category_args, 'testimonial' );

		register_taxonomy( 'testimonial-category', 'testimonial', $testimonial_category_args );
	}
}

add_action( 'init', 'calenscore_register_taxonomy_testimonial_category' );
