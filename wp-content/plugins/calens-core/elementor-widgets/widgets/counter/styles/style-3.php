<?php
/**
 * Counter shortcode styel 3 template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $settings['counter_number'] ) {
	?>
	<div class="tcr-counter-wrapper">
		<?php
		if ( $settings['add_icon'] ) {
			if ( 'image' === $settings['icon_as'] ) {
				?>
				<div class="tcr-counter-icon">
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
			} elseif ( 'font' === $settings['icon_as'] ) {
				if ( isset( $settings['icon'] ) && $settings['icon'] ) {
					?>
					<div class="tcr-counter-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
					<?php
				}
			}
		}
		?>
		<div class="tcr-counter-content">
			<div class="tcr-counter">
				<h3 class="tcr-counter-number"><?php echo esc_attr( $settings['counter_number'] ); ?></h3>
			</div>
			<?php
			if ( $settings['counter_title'] ) {
				?>
				<div class="tcr-counter-title"><?php echo esc_html( $settings['counter_title'] ); ?></div>
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
		<span class="h-one"></span>
		<span class="h-two"></span>
		<span class="h-three"></span>
		<span class="h-four"></span>
	</div>
	<?php
}
