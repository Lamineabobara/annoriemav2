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
<div class="tcr-project-slide">				
	<div class="tcr-project-thumbnail-wrapper">
		<?php
		if ( has_post_thumbnail( $post->ID ) ) {
			$post_image_id = get_post_thumbnail_id( $post->ID );
			$post_image    = wp_get_attachment_image_src( $post_image_id, 'calens-600x600' );

			if ( isset( $post_image[0] ) ) {
				$post_image_src = $post_image[0];
			}
		}
		?>
		<div class="tcr-project-image-container">
			<?php
			if ( ! empty( $post_image_src ) ) {
				?>
				<img class="project-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
				<?php
			}
			?>
		</div>
		<div class="tcr-project-content-cover">
			<div class="tcr-project-content-inner">
				<div class="tcr-project-action-icons">
					<a class="tcr-project-link" href="<?php echo esc_url( get_post_permalink( $post->ID ) ); ?>">
						<i class="fas fa-link"></i>
					</a>
				</div>
				<div class="tcr-project-title">
					<h3 class="project-title"><a class="tcr-project-link" href="<?php echo esc_url( get_post_permalink( $post->ID ) ); ?>"><?php echo esc_html( $post->post_title ); ?></a></h3>
					<?php
					$get_terms = get_the_terms( $post->ID, 'project-category' );
					if ( $get_terms ) {
						?>
						<span class="tcr-project-category">
							<?php
							$terms_data = array();
							foreach ( $get_terms as $get_term ) {
								$terms_data[ $get_term->slug ] = $get_term->name;
							}
							echo esc_html( implode( ',', $terms_data ) );
							?>
						</span>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
