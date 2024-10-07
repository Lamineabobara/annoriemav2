<?php
/**
 * Template part for displaying team posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calens
 */

$team_details = get_post_meta( get_the_ID(), 'calens_team_details', true );
?>
<article id="post-<?php the_ID(); ?>">	
	<div class="tcr-team-bg row">
	<div class="col-lg-7">
		<h3 class="tcr-team-title"><?php echo esc_html__( "Hi' I am ", 'calens' ); ?>
			<?php
			the_title( '<span>', '</span>' ); 
			?>
		</h3>
		<div class="tcr-teammember-details-container">
			<?php
			if ( has_excerpt( get_the_ID() ) ) {
				?>
				<div class="tcr-teammember-des"><?php the_excerpt(); ?></div>
				<?php
			}
			?>
			<div class="tcr-teammember-details">
				<?php
				if ( isset( $team_details['tcr_teammember_phone_number'] ) && $team_details['tcr_teammember_phone_number'] ) {
					?>
					<div class="tcr-teammember-detail tcr-teammember_phone-number">
						<div class="tcr-teammember-detail-title"><?php echo esc_html__( 'Phone', 'calens' ); ?> : </div>
						<div class="tcr-teammember-detail-value"><?php echo esc_html( $team_details['tcr_teammember_phone_number'] ); ?></div>
					</div>
					<?php
				}
				if ( isset( $team_details['tcr_teammember_email'] ) && $team_details['tcr_teammember_email'] ) {
					?>
					<div class="tcr-teammember-detail tcr-teammember-email">
						<div class="tcr-teammember-detail-title"><?php echo esc_html__( 'Email', 'calens' ); ?> : </div>
						<div class="tcr-teammember-detail-value"><?php echo esc_html( $team_details['tcr_teammember_email'] ); ?></div>
					</div>
					<?php
				}
				if ( isset( $team_details['tcr_teammember_website'] ) && $team_details['tcr_teammember_website'] ) {
					?>
					<div class="tcr-teammember-detail tcr-teammember-website">
						<div class="tcr-teammember-detail-title"><?php echo esc_html__( 'Website', 'calens' ); ?> : </div>
						<div class="tcr-teammember-detail-value"><a href="<?php echo esc_url( $team_details['tcr_teammember_website'] ); ?>"><?php echo esc_url( $team_details['tcr_teammember_website'] ); ?></a></div>
					</div>
					<?php
				}
				if ( isset( $team_details['tcr_teammember_address_info'] ) && $team_details['tcr_teammember_address_info'] ) {
					?>
					<div class="tcr-teammember-detail tcr-teammember-address-info">
						<div class="tcr-teammember-detail-title"><?php echo esc_html__( 'Address', 'calens' ); ?> : </div>
						<div class="tcr-teammember-detail-value"><?php echo esc_html( $team_details['tcr_teammember_address_info'] ); ?></div>
					</div>
					<?php
				}
				?>
			</div>
			<div class="tcr-teammember-link-profiles-container">
				<?php
				if ( ( isset( $team_details['tcr_teammember_socials_icon'] ) && $team_details['tcr_teammember_socials_icon'] ) && ( isset( $team_details['tcr_teammember_socials_total'] ) && $team_details['tcr_teammember_socials_total'] ) ) {
					?>
					<ul class="tcr-teammember-link-profiles">
						<?php
						for ( $i = 0; $team_details['tcr_teammember_socials_total'] > $i; $i++ ) {
							?>
							<li class="tcr-teammember-link-profile">
								<a href="<?php echo esc_url( $team_details['tcr_teammember_socials_link'][ $i ] ); ?>">
									<i class="<?php echo esc_attr( $team_details['tcr_teammember_socials_icon'][ $i ] ); ?>"></i>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	<div class="col-lg-5">
		<div class="tcr-teammember-thumbnail">
			<?php calens_post_thumbnail( 'calens-800x1000' ); ?> 
			<div class="tcr-teammember-wrapper-content">
				<?php
				the_title( '<h3 class="tcr-team-title">', '</h3>' ); 

				if ( isset( $team_details['tcr_teammember_designation'] ) && $team_details['tcr_teammember_designation'] ) {
					?>
					<div class="tcr-teammember-designation"><?php echo esc_html( $team_details['tcr_teammember_designation'] ); ?></div>
					<?php
				}

				if ( isset( $team_details['tcr_teammember_sign_image_id'] ) && $team_details['tcr_teammember_sign_image_id'] ) {
					$post_image = wp_get_attachment_image_src( $team_details['tcr_teammember_sign_image_id'], 'full' );

					if ( isset( $post_image[0] ) ) {
						$image_src = $post_image[0];
						if ( ! empty( $image_src ) ) {
							?>
							<img class="teammember-sign-image" src="<?php echo esc_url( $image_src ); ?>" alt="<?php echo esc_attr( the_title() ); ?>">
							<?php
						}
					}
				}
				?>
			</div>
		</div>
	</div>
	</div>
	<div class="row tcr-teammember-content">
	<div class="col-md-12">
		<?php the_content(); ?>
	</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
