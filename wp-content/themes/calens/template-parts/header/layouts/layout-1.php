<?php
/**
 * Template part for header layout 2.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */
global $calens_options;
$show_topbar    = isset( $calens_options['display-topbar'] ) ? $calens_options['display-topbar'] : '';
$office_address = isset( $calens_options['office_address'] ) ? $calens_options['office_address'] : '';
$contact_email  = isset( $calens_options['contact_email'] ) ? $calens_options['contact_email'] : '';
?>
	<div class="site-header">
		<?php
		if ( $show_topbar ) {
			?>
			<div class="tcr-topbar-wrapper">
				<div class="container">
				<?php get_template_part( 'template-parts/header/elements/topbar' ); ?>
				</div>
			</div>
			<?php
		} 
		?>
		<div class="site-header-top container">
			<div class="d-flex align-items-center">
				<?php
				// Site logo 
				get_template_part( 'template-parts/header/elements/logo' );
				?>
				<div class="tcr-header-info ml-auto d-flex">
					<div class="header-info d-flex">
						<?php
						if ( $office_address ) {
							?>
							<div class="contact-phone contact-item d-flex align-items-center">
								<i class="flaticon-pin"></i>
								<div class="contact-list">
									<?php
									$office_address_label = apply_filters( 'calens_office_address_title', esc_html__( 'Office Address', 'calens' ) );
									?>
									<span class="contact-label"><?php echo esc_html( $office_address_label ); ?></span>
									<span class="contact-value">
										<a href="#"><?php echo esc_html( $office_address ); ?></a>
									</span>
								</div>
							</div>
							<?php
						}
						if ( $contact_email ) {
							?>
							<div class="contact-phone contact-item d-flex align-items-center">
								<i class="flaticon-email"></i>
								<div class="contact-list">
									<?php
									$contact_mail = apply_filters( 'calens_contact_mail_title', esc_html__( 'Contact Mail', 'calens' ) );
									?>
									<span class="contact-label"><?php echo esc_html( $contact_mail ); ?></span>
									<span class="contact-value">
										<a href="<?php echo esc_attr( 'mailto:' . sanitize_email( $contact_email ) ); ?>"><?php echo esc_html( $contact_email ); ?></a>
									</span>
								</div>
							</div>
							<?php
						}
						?>
					</div>
					<?php 
					if ( shortcode_exists( 'calens-social-links' ) ) {
						echo do_shortcode( '[calens-social-links]' );
					}
					?>
				</div>
				<div id="site-navigation-mobile"></div>
			</div>
		</div>
		<div class="header-stickable-wrap">	
			<div class="header-stickable">
				<div class="container">
					<div class="d-flex">
						<div class="header-nav-left-side">
							<div class="d-flex align-items-center">
							<nav id="site-navigation" class="main-navigation">
								<?php
								wp_nav_menu(
									array(
										'theme_location' => 'primary-menu',
										'menu_id'        => 'primary-menu',
									)
								);
								?>
							</nav> 
							<?php
							// Search
							get_template_part( 'template-parts/header/elements/search' );
							?>
						</div>
						</div>
						<div class="header-nav-right-side">
							<?php
							// Contact info
							get_template_part( 'template-parts/header/elements/contact-info' );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
