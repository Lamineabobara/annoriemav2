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
			<div class="tcr-progress-bar-title-wrapper">
				<?php
				if ( isset( $progress_bar['bar_label'] ) && $progress_bar['bar_label'] ) {
					?>
					<span class="tcr-progress-bar-title"><?php echo esc_html( $progress_bar['bar_label'] ); ?></span>
					<?php
				}
				if ( isset( $progress_bar['bar_value'] ) && $progress_bar['bar_value'] && is_int( (int) $progress_bar['bar_value'] ) ) {
					?>
					<span class="tcr-progress-bar-value"><?php echo esc_html( $progress_bar['bar_value'] ); ?><?php echo esc_html( $settings['unit'] ); ?></span>
					<?php
				}
				?>
			</div>
			<?php
			if ( is_int( (int) $progress_bar['bar_value'] ) && (int) $progress_bar['bar_value'] <= 100 ) {
				$width = (int) $progress_bar['bar_value'];
			} else {
				$width = 100;
			}
			?>
			<div class="tcr-progress-bar">
				<div class="tcr-progress-bar-inner" style="height: <?php echo esc_attr( $settings['bar_height'] . 'px' ); ?>" data-bar-value="<?php echo esc_attr( $width ); ?>"></div>
			</div>
		</div>
		<?php
	}
}
