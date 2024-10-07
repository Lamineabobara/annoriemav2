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
	<div class="tcr-service-content-inner">
		<div class="tcr-service-content-cover">
		<?php
		if ( $settings['infobox_title'] ) {
			?>
			<h3 class="tcr-infobox-title"><?php echo esc_html( $settings['infobox_title'] ); ?></h3>
			<?php
		}
		if ( $settings['add_icon'] ) {
			if ( 'image' === $settings['icon_as'] ) {
				?>
				<div class="tcr-infobox-icon watermark">
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
		?></div>
	</div>
	<?php
	if ( $settings['btn_link'] ) {
		?>
		<div class="tct-infobox-link">
			<?php
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

			echo '<i aria-hidden="true" class="fas fa-plus"></i>';

			if ( ! empty( $link ) || ! empty( $link['url'] ) ) {
				echo '</a>';
			}
			?>
		</div>
		<?php
	}
	?>
</div>


<div class="tcr-infobox-content">
	<?php
	if ( $settings['infobox_content'] ) {
		?>
		<div class="tcr-infobox-text"><?php echo $settings['infobox_content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></div>
		<?php
	}
	?>
</div>
