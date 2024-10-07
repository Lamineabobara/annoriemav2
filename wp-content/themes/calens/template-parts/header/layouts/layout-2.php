<?php
/**
 * Template part for header layout 2.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */
global $calens_options;
$show_topbar = isset( $calens_options['display-topbar'] ) ? $calens_options['display-topbar'] : '';
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
	<div class="header-stickable-wrap">	
		<div class="header-stickable">
			<div class="site-header-top container">
				<div class="d-flex align-items-center">
					<?php
					// Site logo 
					get_template_part( 'template-parts/header/elements/logo' );
					?>

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
						
						// Contact info
						get_template_part( 'template-parts/header/elements/contact-info' );
						?>
					</div>
					<div id="site-navigation-mobile"></div>
				</div>
			</div>
		</div>
	</div>
</div>
