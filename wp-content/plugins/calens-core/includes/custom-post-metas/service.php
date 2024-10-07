<?php
/**
 * Register metafields for service custom post type.
 *
 * @package Calens Core
 */

if ( ! function_exists( 'calenscore_register_service_metafields' ) ) {
	/**
	 * Register metafields for service members.
	 */
	function calenscore_register_service_metafields() {
		add_meta_box( 'service_details', __( 'Service Details', 'calens-core' ), 'calenscore_service_details_callback', 'service' );
	}
}
add_action( 'add_meta_boxes', 'calenscore_register_service_metafields' );

if ( ! function_exists( 'calenscore_service_details_callback' ) ) {
	/**
	 * service meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function calenscore_service_details_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'tcr-service-meta-nonce' );

		$service_details = get_post_meta( $post->ID, 'calens_service_details', true );
		$tcr_service_icon = isset( $service_details['tcr_service_icon'] ) ? $service_details['tcr_service_icon'] : '';
		?>
		<div class="tcr-service-metafields-container">
			<div class="tcr-service-content">				
				<div class="tcr-service-input-field">
					<label for="tcr_service_icon"><?php esc_html_e( 'Service Icon', 'calens-core' ); ?></label>
					<input class="widefat service-icons" type="text" name="tcr_service_icon" value="<?php echo esc_attr( $tcr_service_icon ); ?>">
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'calenscore_service_save_meta_box' ) ) {
	/**
	 * Save service fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function calenscore_service_save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( ! isset( $_POST['tcr-service-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tcr-service-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}

		$service_details                    = array();
		$service_details['tcr_service_icon'] = isset( $_POST['tcr_service_icon'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_service_icon'] ) ) : '';

		update_post_meta( $post_id, 'calens_service_details', $service_details );
	}
}
add_action( 'save_post', 'calenscore_service_save_meta_box' );
