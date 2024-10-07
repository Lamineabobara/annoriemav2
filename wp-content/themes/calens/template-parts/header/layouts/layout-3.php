<?php
/**
 * Template part for header layout 3.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */
global $calens_options;
$show_topbar = $calens_options['display-topbar'];
?>
<div class="header-overlay">
	<div class="site-header">
		<?php 
		if ( $show_topbar ) {
			?>
			<div class="tcr-topbar-wrapper">
				<?php get_template_part( 'template-parts/header/elements/topbar' ); ?>
			</div>
			<?php 
		}
		?>
		<div class="header-stickable-wrap">	
			<div class="header-stickable">
				<div class="site-header-top">
					<div class="header-logo-area">
						<div class="d-flex align-items-center">
							<?php
							// Site logo 
							get_template_part( 'template-parts/header/elements/logo' );
							?>
							<div class="header-right-side">
								<?php
								// Contact info
								get_template_part( 'template-parts/header/elements/contact-info' );

								// Cart
								get_template_part( 'template-parts/header/elements/cart' );
								?>
							</div>
							<div id="site-navigation-mobile"></div>
						</div>
					</div>
					<div class="header-menu-area">
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

							<div class="header-right-side">
								<?php
								// Search
								get_template_part( 'template-parts/header/elements/search' );

								// button
								get_template_part( 'template-parts/header/elements/button' );
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
