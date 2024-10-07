<?php
/**
 * Custom heading shortcode styel 1 template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="tcr-custom-heading-wrapper">
	<?php 
	if ( $settings['subtitle'] ) {
		?>
		<div class="tcr-heading-subtitle-wrapper <?php echo esc_attr( 'subtitle-text-' . $settings['subtitle_text_transform'] ); ?>">
			<<?php echo esc_attr( $settings['subtitle_element'] ); ?> class="heading-subtitle">
				<?php
				echo wp_kses(
					$settings['subtitle'],
					wp_kses_allowed_html( 'post' )
				);
				?>
			</<?php echo esc_attr( $settings['subtitle_element'] ); ?>>
		</div>
		<?php
	}
	if ( $settings['title'] ) {
		?>
		<div class="tcr-heading-title-wrapper <?php echo esc_attr( 'title-text-' . $settings['title_text_transform'] ); ?>">
			<<?php echo esc_attr( $settings['title_element'] ); ?> class="heading-title">
				<?php
				echo wp_kses(
					$settings['title'],
					wp_kses_allowed_html( 'post' )
				);
				?>
			</<?php echo esc_attr( $settings['title_element'] ); ?>>
		</div>
		<?php
	}
	?>
</div>
