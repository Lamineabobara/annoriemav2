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
?>
<div class="tcr-testimonial-slide">
	<div class="tcr-testimonial-wrapper">				
		<div class="tcr-testimonial-thumbnail-wrapper">
			<?php
			if ( has_post_thumbnail( $post->ID ) ) {
				$post_image_id = get_post_thumbnail_id( $post->ID );
				$post_image    = wp_get_attachment_image_src( $post_image_id, 'full' );

				if ( isset( $post_image[0] ) ) {
					$post_image_src = $post_image[0];
				}
			}
			?>
			<div class="tcr-testimonial-image-container">
				<?php
				if ( ! empty( $post_image_src ) ) {
					?>
					<img class="testimonial-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
					<?php
				}
				?>
			</div>					
		</div>
		<div class="tcr-testimonial-content-cover">
			<div class="tcr-testimonial-content">						
				<?php the_excerpt(); ?>
			</div>
			<div class="tcr-testimonials-title">
				<?php 
				$testimonial_details        = get_post_meta( $post->ID, 'calens_testimonial_details', true );
				$tcr_testimonial_designation = isset( $testimonial_details['tcr_testimonial_designation'] ) ? $testimonial_details['tcr_testimonial_designation'] : '';
				$tcr_testimonial_rating      = isset( $testimonial_details['tcr_testimonial_rating'] ) ? (int) $testimonial_details['tcr_testimonial_rating'] : '';
				?>
				<h3 class="testimonial-title"><?php echo esc_html( $post->post_title ); ?></h3>
				<?php
				if ( $tcr_testimonial_designation ) {
					?>
					<span class="testimonial-designation">
					<?php echo esc_html( $tcr_testimonial_designation ); ?>
					</span>
					<?php
				}
				if ( $tcr_testimonial_rating ) {
					?>
					<div class="tcr-testimonial-rating">
						<?php
						for ( $i = 1; 5 >= $i; $i++ ) {
							if ( $tcr_testimonial_rating >= $i ) {
								?>
								<span class="fas fa-star checked"></span>
								<?php
							} else {
								?>
								<span class="fas fa-star"></span>
								<?php
							}
						}
						?>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</div>