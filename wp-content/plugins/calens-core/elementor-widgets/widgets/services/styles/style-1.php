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

$service_details = get_post_meta( $post->ID, 'calens_service_details', true );
$tcr_service_icon = isset( $service_details['tcr_service_icon'] ) ? $service_details['tcr_service_icon'] : '';
?>
<div class="tcr-service-slide">
	<div class="tcr-service-service-wrapper">				
		<div class="tcr-service-service-thumbnail-wrapper">
			<?php
			if ( has_post_thumbnail( $post->ID ) ) {
				$post_image_id = get_post_thumbnail_id( $post->ID );
				$post_image    = wp_get_attachment_image_src( $post_image_id, 'calens-600x340' );

				if ( isset( $post_image[0] ) ) {
					$post_image_src = $post_image[0];
				}
			}
			?>
			<div class="tcr-service-image-container">
				<?php
				if ( ! empty( $post_image_src ) ) {
					?>
					<img class="service-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
					<?php
				}
				?>
			</div>					
		</div>
		<div class="tcr-service-content-inner">
			<div class="tcr-service-content-cover d-flex align-items-center">
				<div class="tcr-service-date">
				<?php
				if ( $tcr_service_icon ) {
					?>
					<i class="<?php echo esc_attr( $tcr_service_icon ); ?>"></i>
					<?php
				} else {
					?>
					<i class="fas fa-door-open"></i>
					<?php
				}
				?>
				</div>
				<div class="tcr-service-title">
					<h3 class="service-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h3>
				</div>
			</div>
			<div class="tcr-service-content">					
				<?php the_excerpt(); ?>
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html_e( 'Read More', 'calens-core' ); ?><i class="flaticon flaticon-right-arrow"></i></a>
			</div>
		</div>
	</div>
</div>
