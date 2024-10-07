<?php 
global $calens_options;

$topbar_info_left  = isset( $calens_options['topbar_info_left'] ) ? $calens_options['topbar_info_left'] : '';
$topbar_info_right = isset( $calens_options['topbar_info_right'] ) ? $calens_options['topbar_info_right'] : '';
$header_layout     = ( isset( $calens_options['header-layout'] ) && $calens_options['header-layout'] ) ? $calens_options['header-layout'] : 'layout-2';

?>
<div class="header-topbar"> 
	<div class="d-flex justify-content-between header-topbar-content">
		<div class="header-topbar-left">
			<?php
			if ( $topbar_info_left ) {
				echo do_shortcode( $topbar_info_left ); 
			}
			?>
		</div>
		<div class="header-topbar-right"> 
			<?php
			if ( $topbar_info_right ) {
				echo do_shortcode( $topbar_info_right ); 
			}
			
			if ( 'layout-3' !== $header_layout ) {
				// Cart
				get_template_part( 'template-parts/header/elements/cart' );
			}
			?>
		</div>
	</div>
</div>


