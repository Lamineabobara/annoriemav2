<?php
/**
 * Register metafields for page.
 *
 * @package Calens Core
 */

if ( ! function_exists( 'calenscore_register_page_metafields' ) ) {
	/**
	 * Register metafields for page.
	 */
	function calenscore_register_page_metafields() {
		add_meta_box( 'calens_page_settings', __( 'Page Settings', 'calens-core' ), 'calens_page_settings_callback', 'page' );
	}
}
add_action( 'add_meta_boxes', 'calenscore_register_page_metafields' );

if ( ! function_exists( 'calens_page_settings_callback' ) ) {
	/**
	 * Page meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function calens_page_settings_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'tcr-page-meta-nonce' );
		
		$page_settings         = get_post_meta( $post->ID, 'calens_page_settings', true );
		$tcr_page_title_disable = isset( $page_settings['tcr_page_title_disable'] ) ? (bool) $page_settings['tcr_page_title_disable'] : '';
		?>
		<div class="tcr-page-metafields-container">
			<div class="tcr-page-content">
				<div class="tcr-page-input-field">
					<label for="tcr_page_title_disable"><?php esc_html_e( 'Disable Page Title', 'calens-core' ); ?></label>
					<input type="checkbox" id="tcr_page_title_disable" name="tcr_page_title_disable" value="true" <?php checked( $tcr_page_title_disable, true ); ?>>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'calenscore_page_save_meta_box' ) ) {
	/**
	 * Save page fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function calenscore_page_save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( ! isset( $_POST['tcr-page-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tcr-page-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}

		$page_settings                          = array();
		$page_settings['tcr_page_title_disable'] = isset( $_POST['tcr_page_title_disable'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_page_title_disable'] ) ) : '';

		update_post_meta( $post_id, 'calens_page_settings', $page_settings );
	}
}
add_action( 'save_post', 'calenscore_page_save_meta_box' );
