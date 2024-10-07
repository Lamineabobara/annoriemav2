<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Calens
 */

global $calens_options;
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<?php
		$footer_topbar_enable   = isset( $calens_options['footer_topbar_enable'] ) ? $calens_options['footer_topbar_enable'] : '';
		$social_infos           = isset( $calens_options['footer_social_infos'] ) ? $calens_options['footer_social_infos'] : '';
		$footer_contact_infobox = isset( $calens_options['footer_contact_infobox'] ) ? $calens_options['footer_contact_infobox'] : '';

		if ( $footer_topbar_enable ) {
			?>
			<div class="footer-topbar">
				<div class="container">
						<div class="d-lg-flex align-items-center">
						<?php
						if ( $social_infos ) {
							?>
							<div class="social-info-wrapper">
								<?php
								if ( $social_infos ) {
									echo do_shortcode( $social_infos ); 
								}
								?>
							</div>
							<?php
						}
						
						if ( $footer_contact_infobox ) {
							?>
							<div class="contact-info">
								<?php
								if ( $footer_contact_infobox ) {
									echo do_shortcode( $footer_contact_infobox ); 
								}
								?>
							</div>
							<?php
						}
						?>
						</div>
				</div>
			</div>
			<?php
		}

		if ( class_exists( 'Redux' ) ) {
			get_sidebar( 'footer' );
		}
		?>
		<div class="tcr-copyright">
			<div class="container">
				<div class="footer-bottombar">
					<div class="row">
						<div class="col-lg-6 col-md-6 footer-left">
							<?php
							if ( isset( $calens_options['copyright_text_left'] ) && $calens_options['copyright_text_left'] ) {
								echo do_shortcode( $calens_options['copyright_text_left'] );
							} else {
								?>
								&copy; <?php echo esc_html( date( 'Y' ) ); ?>&nbsp;<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>.&nbsp;<?php esc_html_e( 'All rights reserved', 'calens' ); ?>
								<?php
							}
							?>
						</div>
						<div class="col-lg-6 col-md-6 footer-right">
							<?php
							if ( isset( $calens_options['copyright_text_right'] ) && $calens_options['copyright_text_right'] ) {
								echo do_shortcode( $calens_options['copyright_text_right'] );
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

	<?php 
	$scroll_to_top = isset( $calens_options['scroll_to_top'] ) ? $calens_options['scroll_to_top'] : true;
	if ( $scroll_to_top ) {
		?>
		<div id="scroll-to-top">
			<a class="top arrow" href="#"><i class="fa fa-angle-up"></i></a>
		</div>
		<?php
	}
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
