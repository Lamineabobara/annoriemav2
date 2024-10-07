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
		<div class="tcr-service-content-inner">
			<div class="tcr-service-content-cover">
				<div class="tcr-service-title">
					<h3 class="service-title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h3>
				</div>
				<div class="tcr-service-icon">
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
			</div>
			</div>
		<div class="tcr-service-link">	 
			<a href="<?php echo esc_url( get_permalink() ); ?>"><i class="fas fa-plus"></i></a>
		</div>
	</div>
	<div class="tcr-service-content">					
		<?php the_excerpt(); ?>
	</div>
</div>
