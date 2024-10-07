<?php
/**
 * Infobox shortcode styel 1 template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="tcr-infobox-wrapper d-flex">
	<?php
	if ( $settings['add_icon'] ) {
		if ( 'image' === $settings['icon_as'] ) {
			?>
			<div class="tcr-infobox-icon">
			<?php
			if ( $settings['icon_image'] ) {
				$image_data = wp_get_attachment_image_src( $settings['icon_image']['id'], 'thumbnail' );
				$image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
				if ( $image_url ) {
					?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'calens-core' ); ?>">
					<?php
				}
			}
			?>
			</div>
			<?php
		} elseif ( 'number' === $settings['icon_as'] ) {
			if ( is_int( (int) $settings['infobox_number'] ) ) {
				?>
				<div class="tcr-infobox-icon">
					<span class="icon-number"><?php echo esc_html( $settings['infobox_number'] ); ?></span>
				</div>
				<?php
			}
		} elseif ( 'font' === $settings['icon_as'] ) {
			if ( isset( $settings['icon'] ) && $settings['icon'] ) {
				?>
				<div class="tcr-infobox-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
				<?php
			}
		}
	}
	?>
	<div class="tcr-infobox-content">
		<?php
		if ( $settings['infobox_title'] ) {
			?>
			<h3 class="tcr-infobox-title"><?php echo esc_html( $settings['infobox_title'] ); ?></h3>
			<?php
		}
		if ( $settings['infobox_content'] ) {
			?>
			<div class="tcr-infobox-text"><?php echo $settings['infobox_content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
			<?php
		}
		?>
	</div>
</div>
