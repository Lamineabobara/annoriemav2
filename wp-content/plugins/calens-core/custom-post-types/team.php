<?php
/**
 * Register "team" custom post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type/
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 *
 * @package Calens Core
 */
if ( ! function_exists( 'calenscore_register_cpt_team' ) ) {
	/**
	 * Function to Register "team" custom post type.
	 */
	function calenscore_register_cpt_team() {
		$labels = array(
			'name'                  => esc_html__( 'Team', 'calens-core' ),
			'singular_name'         => esc_html__( 'Team Member', 'calens-core' ),
			'menu_name'             => esc_html__( 'Team', 'calens-core' ),
			'name_admin_bar'        => esc_html__( 'Team Member', 'calens-core' ),
			'add_new'               => esc_html__( 'Add New', 'calens-core' ),
			'add_new_item'          => esc_html__( 'Add New Member', 'calens-core' ),
			'new_item'              => esc_html__( 'New Member', 'calens-core' ),
			'edit_item'             => esc_html__( 'Edit Member', 'calens-core' ),
			'view_item'             => esc_html__( 'View Member', 'calens-core' ),
			'all_items'             => esc_html__( 'All Members', 'calens-core' ),
			'search_items'          => esc_html__( 'Search Member', 'calens-core' ),
			'parent_item_colon'     => esc_html__( 'Parent Member:', 'calens-core' ),
			'not_found'             => esc_html__( 'No Member found.', 'calens-core' ),
			'not_found_in_trash'    => esc_html__( 'No Member found in Trash.', 'calens-core' ),
			'featured_image'        => esc_html__( 'Member Image', 'calens-core' ),
			'set_featured_image'    => esc_html__( 'Set Member Image', 'calens-core' ),
			'remove_featured_image' => esc_html__( 'Remove Member Image', 'calens-core' ),
			'use_featured_image'    => esc_html__( 'Use Member Image', 'calens-core' ),
		);

		$cpt_team_args = array(
			'labels'             => $labels,
			'description'        => esc_html__( 'Description.', 'calens-core' ),
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'show_in_rest'       => true,
			'rewrite'            => array( 'slug' => 'team' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'menu_icon'          => 'dashicons-groups',
		);

		$cpt_team_args = apply_filters( 'calenscore_register_cpt_team', $cpt_team_args );

		register_post_type( 'team', $cpt_team_args );
	}
}

add_action( 'init', 'calenscore_register_cpt_team' );

/**
 * Register 'team-category' taxonomy for post type 'team'.
 *
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 */
if ( ! function_exists( 'calenscore_register_taxonomy_team_category' ) ) {
	/**
	 * Function to register team-category taxonomy.
	 */
	function calenscore_register_taxonomy_team_category() {
		$labels = array(
			'name'                       => esc_html__( 'Team Categories', 'calens-core' ),
			'singular_name'              => esc_html__( 'Team Category', 'calens-core' ),
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

		$team_category_args = array(
			'hierarchical'          => true,
			'labels'                => $labels,
			'show_ui'               => true,
			'show_admin_column'     => true,
			'public'                => true,
			'update_count_callback' => '_update_post_term_count',
			'query_var'             => true,
			'rewrite'               => array( 'slug' => 'team-category' ),
			'show_in_rest'          => true,
		);

		$team_category_args = apply_filters( 'calenscore_register_taxonomy_team_category', $team_category_args, 'team' );

		register_taxonomy( 'team-category', 'team', $team_category_args );
	}
}

add_action( 'init', 'calenscore_register_taxonomy_team_category' );
