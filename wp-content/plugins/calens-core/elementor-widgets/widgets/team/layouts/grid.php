<?php
/**
 * Blog shortcode gird layout file.
 *
 * @package calens Core
 */


if ( ! defined( 'ABSPATH' ) ) { // Or some other WordPress constant
	exit;
}

$post_grid_responsive_xl = ( $settings['post_grid_responsive_xl'] ) ? (int) $settings['post_grid_responsive_xl'] : 3;
$post_grid_responsive_lg = ( $settings['post_grid_responsive_lg'] ) ? (int) $settings['post_grid_responsive_lg'] : 3;
$post_grid_responsive_md = ( $settings['post_grid_responsive_md'] ) ? (int) $settings['post_grid_responsive_md'] : 2;
$post_grid_responsive_sm = 1;

if ( 5 === (int) $post_grid_responsive_xl ) {
	$classes [] = 'col-xl-five';
} else {
	$classes [] = 'col-xl-' . ( 12 / $post_grid_responsive_xl );
}

$classes [] = 'col-lg-' . ( 12 / $post_grid_responsive_lg );
$classes [] = 'col-md-' . ( 12 / $post_grid_responsive_md );
$classes [] = 'col-sm-' . ( 12 / $post_grid_responsive_sm );
$classes    = implode( ' ', array_filter( array_unique( $classes ) ) );
?>
<div class="row">
	<?php
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		?>
		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php include( __DIR__ . '/../styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
		</div>
		<?php
	}
	/* Restore original Post Data */
	wp_reset_postdata();
	?>
</div>
