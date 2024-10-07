<?php
/**
 * Register metafields for project custom post type.
 *
 * @package Calens Core
 */

if ( ! function_exists( 'calenscore_register_project_metafields' ) ) {
	/**
	 * Register metafields for project members.
	 */
	function calenscore_register_project_metafields() {
		add_meta_box( 'project_details', __( 'Project Details', 'calens-core' ), 'calenscore_project_details_callback', 'project' );
	}
}
add_action( 'add_meta_boxes', 'calenscore_register_project_metafields' );

if ( ! function_exists( 'calenscore_project_details_callback' ) ) {
	/**
	 * Project meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function calenscore_project_details_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'tcr-project-meta-nonce' );

		$project_details        = get_post_meta( $post->ID, 'calens_project_details', true );
		$tcr_project_client_name = isset( $project_details['tcr_project_client_name'] ) ? $project_details['tcr_project_client_name'] : '';
		$tcr_project_location    = isset( $project_details['tcr_project_location'] ) ? $project_details['tcr_project_location'] : '';
		$tcr_project_year        = isset( $project_details['tcr_project_year'] ) ? $project_details['tcr_project_year'] : '';
		?>
		<div class="tcr-project-metafields-container">
			<div class="tcr-project-content">
				<div class="tcr-project-general-meta-wrapper">
					<div class="tcr-project-input-field">
						<label for="tcr_project_client_name"><?php esc_html_e( 'Client Name', 'calens-core' ); ?></label>
						<input id="tcr_project_client_name" class="widefat" type="text" name="tcr_project_client_name" value="<?php echo esc_attr( $tcr_project_client_name ); ?>" />
					</div>
					<div class="tcr-project-input-field">
						<label for="tcr_project_location"><?php esc_html_e( 'Location', 'calens-core' ); ?></label>
						<input id="tcr_project_location" class="widefat" type="text" name="tcr_project_location" value="<?php echo esc_attr( $tcr_project_location ); ?>" />
					</div>
					<div class="tcr-project-input-field">
						<label for="tcr_project_year"><?php esc_html_e( 'Year', 'calens-core' ); ?></label>
						<input id="tcr_project_year" class="widefat" type="text" name="tcr_project_year" value="<?php echo esc_attr( $tcr_project_year ); ?>" />
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'calenscore_project_save_meta_box' ) ) {
	/**
	 * Save project fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function calenscore_project_save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( ! isset( $_POST['tcr-project-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tcr-project-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}

		$project_details                           = array();
		$project_details['tcr_project_client_name'] = isset( $_POST['tcr_project_client_name'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_project_client_name'] ) ) : '';
		$project_details['tcr_project_location']    = isset( $_POST['tcr_project_location'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_project_location'] ) ) : '';
		$project_details['tcr_project_year']        = isset( $_POST['tcr_project_year'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_project_year'] ) ) : '';

		update_post_meta( $post_id, 'calens_project_details', $project_details );
	}
}
add_action( 'save_post', 'calenscore_project_save_meta_box' );
