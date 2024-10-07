<?php
/**
 * Infobox shortcode styel 3 template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="tcr-infobox-wrapper">
	<div class="tcr-infobox-content">
		<?php
		if ( $settings['infobox_title'] ) {
			?>
			<h3 class="tcr-infobox-title"><?php echo esc_html( $settings['infobox_title'] ); ?></h3>
			<?php
		}

		if ( $settings['btn_link'] && $settings['btn_text'] ) {

			$link = $settings['btn_link']; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			if ( ! empty( $link ) || ! empty( $link['url'] ) ) {

				echo '<a';

				if ( ! empty( $link['url'] ) ) {
					echo ' href="' . esc_url( $link['url'] ) . '"';
				} else {
					echo ' href="#"';
				}

				if ( ! empty( $link['is_external'] ) ) {
					echo ' target="_blank"';
				}

				if ( ! empty( $link['nofollow'] ) ) {
					echo ' rel="nofollow"';
				}

				echo ' >';
			}

			echo esc_html( $settings['btn_text'] );

			if ( ! empty( $link ) || ! empty( $link['url'] ) ) {
				echo '</a>';
			}
		}
		?>
	</div>
</div>
