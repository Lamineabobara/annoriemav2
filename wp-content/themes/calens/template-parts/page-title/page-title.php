<?php // phpcs:ignore WPThemeReview.Templates.ReservedFileNamePrefix.ReservedTemplatePrefixFound
/**
 * Page title layout.
 *
 * @package Calens
 */

global $calens_options, $post;

if ( is_404() ) {
	return;
}

if ( is_home() ) {
	$current_id = get_option( 'page_for_posts' );
} else {
	$current_id = isset( $post->ID ) ? $post->ID : '';
}

if ( $current_id ) {
	$page_settings          = get_post_meta( $current_id, 'calens_page_settings', true );
	$tcr_page_title_disable = isset( $page_settings['tcr_page_title_disable'] ) ? (bool) $page_settings['tcr_page_title_disable'] : '';

	if ( $tcr_page_title_disable ) {
		return;
	}
}

$page_title_alignment  = isset( $calens_options['page_title_alignment'] ) ? $calens_options['page_title_alignment'] : 'left';
$page_title_text_color = isset( $calens_options['page_title_text_color'] ) ? $calens_options['page_title_text_color'] : 'light';

if ( ! isset( $calens_options['display_page_title'] ) || ! $calens_options['display_page_title'] || is_front_page() ) {
	return;
}
?>
<div class="tcr-page-title d-flex align-items-center <?php echo esc_attr( 'title-align-' . $page_title_alignment ); ?> <?php echo esc_attr( 'title-color-' . $page_title_text_color ); ?>">
	<div class="tcr-page-title-layer container">
		<div class="row">
			<div class="col-md-12">			
				<h1 class="page-title">
					<?php 
					if ( is_archive() ) {
						the_archive_title();
					} elseif ( is_search() ) {
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'calens' ), '<span>' . get_search_query() . '</span>' );
					} else {
						echo esc_html( get_the_title( $current_id ) );
					}
					?>
				</h1>
				<?php
				if ( isset( $calens_options['display_breadcrumb'] ) && $calens_options['display_breadcrumb'] ) {
					?>
					<div class="page-breadcrumbs">
					<?php echo calens_get_breadcrumbs(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</div>
					<?php
				}
				?>
			</div>				
		</div>
	</div>
</div>

