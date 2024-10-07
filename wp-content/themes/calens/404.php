<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Calens
 */

get_header();

global $calens_options;

if ( isset( $calens_options['fof_page_title'] ) && $calens_options['fof_page_title'] ) {
	$fof_page_title = $calens_options['fof_page_title'];
} else {
	$fof_page_title = esc_html__( '404', 'calens' );
}

if ( isset( $calens_options['fof_page_description'] ) && $calens_options['fof_page_description'] ) {
	$fof_page_description = $calens_options['fof_page_description'];
} else {
	$fof_page_description = esc_html__( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'calens' );
}

$fof_page_title_type = isset( $calens_options['fof_page_title_type'] ) ? $calens_options['fof_page_title_type'] : 'text';
?>
<div class="fof-page-container">
	<div class="container">
		<div class="row">
			<div id="primary" class="content-area col-lg-12">
				<main id="main" class="site-main">
					<section class="error-404 not-found">
						<header class="page-header">
							<?php
							if ( 'image' === $fof_page_title_type ) {
								if ( isset( $calens_options['fof_page_title_image']['url'] ) ) {
									$fof_page_title_image = $calens_options['fof_page_title_image']['url'];
									?>
									<img class="img-fluid" src="<?php echo esc_url( $fof_page_title_image ); ?>" alt="404"/>
									<?php
								}
							} else {
								?>
								<h1 class="page-title"><?php echo esc_html( $fof_page_title ); ?></h1>
								<?php
							}
							?>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php echo esc_html( $fof_page_description ); ?></p>
							<?php
							get_search_form();

							if ( isset( $calens_options['fof_page_back_to_home'] ) && $calens_options['fof_page_back_to_home'] ) {
								?>
								<a href="<?php echo esc_url( get_home_url(), 'calens' ); ?>" class="fof-back-buttton" role="button"><?php esc_html_e( 'Back to Home', 'calens' ); ?></a>
								<?php
							}
							?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>
<?php
get_footer();

