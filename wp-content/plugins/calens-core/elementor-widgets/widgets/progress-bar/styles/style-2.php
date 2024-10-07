<?php
/**
 * Progress bar shortcode style 1 template file.
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$progress_bars = $settings['progress_bars'];
if ( $progress_bars ) {
	foreach ( $progress_bars as $progress_bar ) {
		?>
		<div class="tcr-progress-bar-wrapper">
			<div class="tcr-circle-progress-bar" role="progressbar" data-goal="<?php echo esc_attr( $progress_bar['bar_value'] ); ?>" data-trackcolor="<?php echo esc_attr( $settings['bar_background_color'] ); ?>" data-barcolor="<?php echo esc_attr( $settings['bar_color'] ); ?>" data-barsize="<?php echo esc_attr( $settings['bar_height'] ); ?>" aria-valuemin="0" aria-valuemax="100">
			<?php
			if ( $progress_bar['add_icon'] ) {
				if ( 'image' === $progress_bar['icon_as'] ) {
					?>
					<div class="tcr-progress-bar-icon">
					<?php
					if ( $progress_bar['icon_image'] ) {
						$image_data = wp_get_attachment_image_src( $progress_bar['icon_image']['id'], 'thumbnail' );
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
				} elseif ( 'font' === $progress_bar['icon_as'] ) {
					if ( isset( $progress_bar['icon'] ) && $progress_bar['icon'] ) {
						?>
						<div class="tcr-counter-icon"><?php \Elementor\Icons_Manager::render_icon( $progress_bar['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
						<?php
					}
				}
			}
			?>
			</div>
			<div class="tcr-progress-bar-title-wrapper">
				<?php
				if ( isset( $progress_bar['bar_label'] ) && $progress_bar['bar_label'] ) {
					?>
					<span class="tcr-progress-bar-title"><?php echo esc_html( $progress_bar['bar_label'] ); ?></span>
					<?php
				}
				if ( isset( $progress_bar['bar_value'] ) && $progress_bar['bar_value'] && is_int( (int) $progress_bar['bar_value'] ) ) {
					?>
					<h3 class="tcr-progress-bar-value"><?php echo esc_html( $progress_bar['bar_value'] ); ?><?php echo esc_html( $settings['unit'] ); ?></h3>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}
}
?>
