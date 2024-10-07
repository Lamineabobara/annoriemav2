<?php
/**
 * Clients shortcode template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$clients_slides = $settings['clients_slides'];
foreach ( $clients_slides as $client ) {
	if ( ! empty( $client['client_image']['url'] ) ) {
		?>
		<div class="client-item">
		<?php
		$logo_link = isset( $client['logo_link'] ) ? $client['logo_link'] : '';
		$img_url   = $client['client_image']['url'];
		
		if ( ! empty( $logo_link ) || ! empty( $logo_link['url'] ) ) {

			echo '<a';

			if ( isset( $client['logo_link'] ) && $client['logo_link'] ) {
				if ( ! empty( $logo_link['url'] ) ) {
					echo ' href="' . esc_url( $logo_link['url'] ) . '"';
				} else {
					echo ' href="#"';
				}

				if ( ! empty( $logo_link['is_external'] ) ) {
					echo ' target="_blank"';
				}

				if ( ! empty( $logo_link['nofollow'] ) ) {
					echo ' rel="nofollow"';
				}
			}

			echo ' >';
		}
		
		$slide_title = esc_html__( 'Client Logo Image', 'calens-core' );

		echo '<img class="img-fluid client-image" src="' . esc_url( $img_url ) . '" alt="' . esc_attr( $slide_title ) . '">';
		
		if ( ! empty( $client['client_hover_image']['url'] ) ) {
			$hover_img_url = $client['client_hover_image']['url'];
			echo '<img class="img-fluid client-hover-image" src="' . esc_url( $hover_img_url ) . '" alt="' . esc_attr( $slide_title ) . '">';
		}

		if ( ! empty( $logo_link ) || ! empty( $logo_link['url'] ) ) {
			echo '</a>';
		}
		?>
		</div>
		<?php
	}
}
