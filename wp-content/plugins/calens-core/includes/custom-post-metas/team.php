<?php
/**
 * Register metafields for team custom post type.
 *
 * @package Calens Core
 */

if ( ! function_exists( 'calenscore_register_team_metafields' ) ) {
	/**
	 * Register metafields for team members.
	 */
	function calenscore_register_team_metafields() {
		add_meta_box( 'team_details', __( 'Team Details', 'calens-core' ), 'calenscore_team_details_callback', 'team' );
	}
}
add_action( 'add_meta_boxes', 'calenscore_register_team_metafields' );

if ( ! function_exists( 'calenscore_team_details_callback' ) ) {
	/**
	 * Team meta fields display callback.
	 *
	 * @param WP_Post $post Current post object.
	 */
	function calenscore_team_details_callback( $post ) {
		global $post;

		wp_nonce_field( basename( __FILE__ ), 'tcr-team-meta-nonce' );

		$team_details                = get_post_meta( $post->ID, 'calens_team_details', true );
		$tcr_teammember_designation   = isset( $team_details['tcr_teammember_designation'] ) ? $team_details['tcr_teammember_designation'] : '';
		$tcr_teammember_email         = isset( $team_details['tcr_teammember_email'] ) ? $team_details['tcr_teammember_email'] : '';
		$tcr_teammember_phone_number  = isset( $team_details['tcr_teammember_phone_number'] ) ? $team_details['tcr_teammember_phone_number'] : '';
		$tcr_teammember_address_info  = isset( $team_details['tcr_teammember_address_info'] ) ? $team_details['tcr_teammember_address_info'] : '';
		$tcr_teammember_website       = isset( $team_details['tcr_teammember_website'] ) ? $team_details['tcr_teammember_website'] : '';
		$tcr_teammember_sign_image_id = isset( $team_details['tcr_teammember_sign_image_id'] ) ? $team_details['tcr_teammember_sign_image_id'] : '';
		$tcr_teammember_socials_total = isset( $team_details['tcr_teammember_socials_total'] ) ? (int) $team_details['tcr_teammember_socials_total'] : '';
		$tcr_teammember_socials_link  = isset( $team_details['tcr_teammember_socials_link'] ) ? $team_details['tcr_teammember_socials_link'] : '';
		$tcr_teammember_socials_icon  = isset( $team_details['tcr_teammember_socials_icon'] ) ? $team_details['tcr_teammember_socials_icon'] : '';
		?>
		<div class="tcr-team-metafields-container">
			<div class="tcr-team-content">
				<div class="tcr-team-general-meta-wrapper">
					<div class="tcr-team-input-field">
						<label for="tcr_teammember_designation"><?php esc_html_e( 'Designation', 'calens-core' ); ?></label>
						<input id="tcr_teammember_designation" class="widefat" type="text" name="tcr_teammember_designation" value="<?php echo esc_attr( $tcr_teammember_designation ); ?>" />
					</div>
					<div class="tcr-team-input-field">
						<label for="tcr_teammember_email"><?php esc_html_e( 'Email', 'calens-core' ); ?></label>
						<input id="tcr_teammember_email" class="widefat" type="email" name="tcr_teammember_email" value="<?php echo esc_attr( $tcr_teammember_email ); ?>" />
					</div>
					<div class="tcr-team-input-field">
						<label for="tcr_teammember_phone_number"><?php esc_html_e( 'Phone Number', 'calens-core' ); ?></label>
						<input id="tcr_teammember_phone_number" class="widefat" type="text" name="tcr_teammember_phone_number" value="<?php echo esc_attr( $tcr_teammember_phone_number ); ?>" />
					</div>
					<div class="tcr-team-input-field">
						<label for="tcr_teammember_address_info"><?php esc_html_e( 'Address Info', 'calens-core' ); ?></label>
						<input id="tcr_teammember_address_info" class="widefat" type="text" name="tcr_teammember_address_info" value="<?php echo esc_attr( $tcr_teammember_address_info ); ?>" />
					</div>
					<div class="tcr-team-input-field">
						<label for="tcr_teammember_website"><?php esc_html_e( 'Website', 'calens-core' ); ?></label>
						<input id="tcr_teammember_website" class="widefat" type="text" name="tcr_teammember_website" value="<?php echo esc_attr( $tcr_teammember_website ); ?>" />
					</div>

					<div class="tcr-team-input-field tcr-image-field-wrap tcr-team-image-wrap">
						<label><?php esc_html_e( 'Signature Image', 'calens-core' ); ?></label>
						<div class="tcr-image-container">
						<?php
						if ( $tcr_teammember_sign_image_id ) {					
						$post_image = wp_get_attachment_image_src( $tcr_teammember_sign_image_id, 'thumbnail' );
							if ( isset( $post_image[0] ) ) {
								$image_src = $post_image[0];
								if ( ! empty( $image_src ) ) {
									?>
									<img class="tcr-image" src="<?php echo esc_url( $image_src ); ?>">
									<?php
								}
							}
						}
						?>
						</div>
						<input type="hidden" class="tcr-image-id" id="team-sign-image-id" name="tcr_teammember_sign_image_id" value="" />
						<input type="button" class="button tcr-image-upload"  value="<?php esc_attr_e( 'Upload Image', 'calens-core' ); ?>" />
						<?php 
						if ( $tcr_teammember_sign_image_id ) {
							?>
							<input type="button" class="button tcr-image-remove" value="<?php esc_attr_e( 'Remove', 'calens-core' ); ?>" />
							<?php
						}
						?>
					</div>

					<div class="tcr-team-repeater-field">
						<label><?php esc_html_e( 'Social Profiles', 'calens-core' ); ?></label>
						<table class="team-social-icon-table">
							<tr>
								<th><?php esc_html_e( 'No.', 'calens-core' ); ?></th>
								<th><?php esc_html_e( 'Icon.', 'calens-core' ); ?></th>
								<th><?php esc_html_e( 'Link.', 'calens-core' ); ?></th>
								<th><?php esc_html_e( 'Remove.', 'calens-core' ); ?></th>
							</tr>
							<?php
							for ( $i = 0; $tcr_teammember_socials_total > $i; $i++ ) {
								?>
								<tr>
									<td class="row-index"><?php echo esc_html( $i + 1 ); ?></td>
									<td>
										<input class="widefat team-social-icons" type="text" name="tcr_teammember_socials_icon[]" value="<?php echo esc_attr( $tcr_teammember_socials_icon[ $i ] ); ?>">
									</td>
									<td>
										<input class="widefat" type="text" name="tcr_teammember_socials_link[]" value="<?php echo esc_attr( $tcr_teammember_socials_link[ $i ] ); ?>">
									</td>
									<td><a class="team-table-row-remove" href="#">Remove</a></td>
								</tr>
								<?php
							}
							?>
						</table>
						<input type="hidden" name="tcr_teammember_socials_total" value="<?php echo esc_attr( $tcr_teammember_socials_total ); ?>">
						<span class="team-table-row-add">Add Row</span>
					</div>					
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'calenscore_team_save_meta_box' ) ) {
	/**
	 * Save team fields content.
	 *
	 * @param int $post_id Post ID.
	 */
	function calenscore_team_save_meta_box( $post_id ) {

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		if ( ! current_user_can( 'edit_posts' ) ) {
			return;
		}

		if ( ! isset( $_POST['tcr-team-meta-nonce'] ) || ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['tcr-team-meta-nonce'] ) ), basename( __FILE__ ) ) ) {
			return;
		}

		$team_details                                = array();
		$team_details['tcr_teammember_designation']   = isset( $_POST['tcr_teammember_designation'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_designation'] ) ) : '';
		$team_details['tcr_teammember_email']         = isset( $_POST['tcr_teammember_email'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_email'] ) ) : '';
		$team_details['tcr_teammember_phone_number']  = isset( $_POST['tcr_teammember_phone_number'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_phone_number'] ) ) : '';
		$team_details['tcr_teammember_address_info']  = isset( $_POST['tcr_teammember_address_info'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_address_info'] ) ) : '';
		$team_details['tcr_teammember_website']       = isset( $_POST['tcr_teammember_website'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_website'] ) ) : '';
		$team_details['tcr_teammember_sign_image_id'] = isset( $_POST['tcr_teammember_sign_image_id'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_sign_image_id'] ) ) : '';
		$team_details['tcr_teammember_socials_total'] = isset( $_POST['tcr_teammember_socials_total'] ) ? sanitize_text_field( wp_unslash( $_POST['tcr_teammember_socials_total'] ) ) : '';
		$team_details['tcr_teammember_socials_icon']  = isset( $_POST['tcr_teammember_socials_icon'] ) ? wp_unslash( $_POST['tcr_teammember_socials_icon'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
		$team_details['tcr_teammember_socials_link']  = isset( $_POST['tcr_teammember_socials_link'] ) ? wp_unslash( $_POST['tcr_teammember_socials_link'] ) : ''; // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		update_post_meta( $post_id, 'calens_team_details', $team_details );
	}
}
add_action( 'save_post', 'calenscore_team_save_meta_box' );
