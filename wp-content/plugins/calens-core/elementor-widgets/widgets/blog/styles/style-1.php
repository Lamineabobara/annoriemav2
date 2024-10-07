<?php
/**
 * Blog shortcode style 1 template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
global $post;

$slide_classes = 'tcr-post-slide';
if ( ! has_post_thumbnail( $post->ID ) ) {
	$slide_classes .= ' without-image';
}
?>
<div class="<?php echo esc_attr( $slide_classes ); ?>">
	<div class="tcr-post-post-wrapper d-xl-flex">				
		<div class="tcr-post-post-thumbnail-wrapper">
			<?php
			if ( has_post_thumbnail( $post->ID ) ) {
				$post_image_id = get_post_thumbnail_id( $post->ID );
				$post_image    = wp_get_attachment_image_src( $post_image_id, 'calens-615x750' );

				if ( isset( $post_image[0] ) ) {
					$post_image_src = $post_image[0];
				}
			}
			?>
			<?php
			if ( ! empty( $post_image_src ) ) {
				?>
				<img class="post-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
				<?php
			}
			?>
			<div class="tcr-post-date"><span><?php echo esc_html( get_the_date( 'd' ) ); ?></span><?php echo esc_html( get_the_date( 'M' ) ); ?></div>				
		</div>
		<div class="tcr-post-content-cover">			
			<div class="tcr-post-title">
				<div class="tcr-post-category">
					<?php echo get_the_category_list( ', ' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
				<h3 class="post-title">
					<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post->post_title ); ?></a>
				</h3>
				<?php
				if ( has_excerpt() ) {
					the_excerpt();
				}
				?>
			</div>
		</div>
	</div>
</div>
