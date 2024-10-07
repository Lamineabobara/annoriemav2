<?php
/**
 * Blog shortcode style 2 template file.
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
	<div class="tcr-post-wrapper">				
		<div class="tcr-post-thumbnail-wrapper">
			<?php
			if ( has_post_thumbnail( $post->ID ) ) {
				$post_image_id = get_post_thumbnail_id( $post->ID );
				$post_image    = wp_get_attachment_image_src( $post_image_id, 'calens-800x600' );

				if ( isset( $post_image[0] ) ) {
					$post_image_src = $post_image[0];
				}
			}
			?>
			<div class="tcr-post-image-container">
				<?php
				if ( ! empty( $post_image_src ) ) {
					?>
					<img class="post-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( $post->post_title ); ?>">
					<?php
				}
				?>
			</div>
			<div class="tcr-post-meta">
				<div class="tcr-post-meta-inner">
					<div class="post-meta-item post-date">
						<i class="fa fa-calendar"></i>
						<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
					</div>
					<div class="post-meta-item post-comment"><i class="far fa-comment"></i><span><?php echo esc_html( 'Comments (' . get_comments_number() . ')' ); ?></span>
					</div>
				</div>
			</div>					
		</div> 
		<div class="tcr-post-title">
			<h3 class="post-title">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( $post->post_title ); ?></a>
			</h3>
		</div>
		<div class="read-more-link">
			<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'calens-core' ); ?><i class="fa fa-angle-right"></i></a>
		</div>
	</div>
</div>
