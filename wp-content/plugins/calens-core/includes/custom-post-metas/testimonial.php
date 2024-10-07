<?php
/**
 * Register metafields for testimonial custom post type.
 *
 * @package Calens Core
 */

if ( ! function_exists( 'calenscore_register_testimonial_metafields' ) ) {
	/**
	 * Register metafields for testimonial members.
	 */
	function calenscore_register_testimonial_metafields() {
		add_meta_box( 'testimonial_details', __( 'testimonial Details', 'calens-core' ), 'calenscore_testimonial_details_callback', 'testimonial' );
	}
}
add_action( 'add_meta_boxes', 'calenscore_register_testimonial_metafields' );

if ( ! function_exists( 'calenscore_testimonial_details_callback' ) ) {
	/**
	 * testimonial meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function calenscore_testimonial_details_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'tcr-testimonial-meta-nonce' );

		$testimonial_details         = get_post_meta( $post->ID, 'calens_testimonial_details', true );
		$tcr_testimonial_designation  = isset( $testimonial_details['tcr_testimonial_designation'] ) ? $testimonial_details['tcr_testimonial_designation'] : '';
		$tcr_testimonial_rating       = isset( $testimonial_details['tcr_testimonial_rating'] ) ? (int) $testimonial_details['tcr_testimonial_rating'] : '';
		?>
		<div class="tcr-testimonial-metafields-container">
			<div class="tcr-testimonial-content">
				<div class="tcr-testimonial-general-meta-wrapper">
					<div class="tcr-testimonial-input-field">
						<label for="tcr_testimonial_designation"><?php esc_html_e( 'Designation', 'calens-core' ); ?></label>
						<input id="tcr_testimonial_designation" class="widefat" type="text" name="tcr_testimonial_designation" value="<?php echo esc_attr( $tcr_testimonial_designation ); ?>" />
					</div>
					<div class="tcr-testimonial-input-field">
						<label for="tcr_testimonial_rating"><?php esc_html_e( 'Ratings', 'calens-core' ); ?></label>
						<div class="testimonial-stars-rating">
							<?php
							for ( $i = 1; 5 >= $i; $i++ ) {
								if ( $tcr_testimonial_rating >= $i ){
									?>
									<span class="star rated">&nbsp;</span>
									<?php
								} else {
									?>
									<span class="star">&nbsp;</span>
									<?php
								}
							}
							?>
						</div>
						<input type="hidden" id="tcr_testimonial_rating" name="tcr_testimonial_rating" value="<?php echo esc_attr( $tcr_testimonial_rating ); ?>" />
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'calenscore_testimonial_save_meta_box' ) ) {
	/**
	 * Save testimonial fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function calenscore_testimonial_save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( ! isset( $_POST['tcr-testimonial-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tcr-testimonial-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}

		$testimonial_details  = array();

		$testimonial_details['tcr_testimonial_rating']       = isset( $_POST['tcr_testimonial_rating'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_testimonial_rating'] ) ) : '';
		$testimonial_details['tcr_testimonial_designation']  = isset( $_POST['tcr_testimonial_designation'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_testimonial_designation'] ) ) : '';

		update_post_meta( $post_id, 'calens_testimonial_details', $testimonial_details );
	}
}
add_action( 'save_post', 'calenscore_testimonial_save_meta_box' );