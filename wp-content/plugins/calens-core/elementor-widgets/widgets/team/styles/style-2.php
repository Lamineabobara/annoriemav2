<?php
/**
 * Clients shortcode template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $post;
$team_details = get_post_meta( get_the_ID(), 'calens_team_details', true );
?>
<div class="tcr-teammember-slide">
	<div class="tcr-teammember-wrapper">				
		<div class="tcr-teammember-thumbnail-wrapper">
			<?php
			if ( has_post_thumbnail( $post->ID ) ) {
				$post_image_id = get_post_thumbnail_id( $post->ID );
				$post_image    = wp_get_attachment_image_src( $post_image_id, 'calens-600x645' );

				if ( isset( $post_image[0] ) ) {
					$post_image_src = $post_image[0];
				}
			}
			?>
			<div class="tcr-teammember-image-container">
				<?php
				if ( ! empty( $post_image_src ) ) {
					?>
					<img class="teammember-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
					<?php
				}
				?>
			</div>					
		</div>
		<div class="tcr-teammember-content-cover">
			<?php
			if ( ( isset( $team_details['tcr_teammember_socials_icon'] ) && $team_details['tcr_teammember_socials_icon'] ) && ( isset( $team_details['tcr_teammember_socials_total'] ) && $team_details['tcr_teammember_socials_total'] ) ) {
				?>
				<div class="tcr-teammember-social-profiles-container">
					<div class="tcr-teammember-share">
						<span class="fa fa-share-alt"></span>
					</div>
					<div class="tcr-teammember-social-links">
						<div class="tcr-teammember-social-inner ">
							<ul class="tcr-teammember-social-profiles">
								<?php
								for ( $i = 0; $team_details['tcr_teammember_socials_total'] > $i; $i++ ) {
									if ( isset( $team_details['tcr_teammember_socials_link'][ $i ] ) && isset( $team_details['tcr_teammember_socials_icon'][ $i ] ) ) {
										?>
										<li class="tcr-teammember-social-profile">
											<a href="<?php echo esc_url( $team_details['tcr_teammember_socials_link'][ $i ] ); ?>" target="_blank">
												<i class="<?php echo esc_attr( $team_details['tcr_teammember_socials_icon'][ $i ] ); ?>"></i>
											</a>
										</li>
										<?php
									}
								}
								?>
							</ul>
						</div>
					</div>
				</div>
				<?php
			}
			?>
			<div class="tcr-title-inner">
				<div class="tcr-teammember-title">
					<h3 class="teammember-title">
						<a href="<?php echo esc_attr( get_post_permalink( $post->ID ) ); ?>" class="teammember-title-link"><?php echo esc_html( $post->post_title ); ?></a>
					</h3>
				</div>
				<?php
				if ( isset( $team_details['tcr_teammember_designation'] ) && $team_details['tcr_teammember_designation'] ) {
					?>
					<div class="tcr-teammember-designation-container">
						<h5 class="tcr-teammember-designation"><?php echo esc_html( $team_details['tcr_teammember_designation'] ); ?></h5>
					</div>
				</div>
					<?php
				}
			?>
		</div>
	</div>
</div>
