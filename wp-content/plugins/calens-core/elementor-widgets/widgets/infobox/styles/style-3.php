<?php
/**
 * Infobox shortcode styel 3 template file.
 *
 * @package tcr Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<div class="tcr-infobox-wrapper d-flex">
	<?php
		if ( $settings[ 'infobox_image' ] ) {
			$image_data1 = wp_get_attachment_image_src( $settings[ 'infobox_image' ]['id'], 'attarni-infobox' );
			$image_url1  = ( isset( $image_data1[0] ) && $image_data1[0] ) ? $image_data1[0] : '';

			if ( $image_url1 ) {
				?>
				<img src="<?php echo esc_url( $image_url1 ); ?>" alt="<?php esc_attr_e( 'Icon', 'attarni-core' ) ?>">
				<?php
			}
		}
		?>
	<?php
	if ( $settings[ 'add_icon' ] ) {
		if ( $settings[ 'icon_as' ] === 'image' ) {
			?>
			<div class="tcr-infobox-icon">
			<?php
			if ( $settings[ 'icon_image' ] ) {
				$image_data = wp_get_attachment_image_src( $settings[ 'icon_image' ]['id'], 'thumbnail' );
				$image_url  = ( isset( $image_data[0] ) && $image_data[0] ) ? $image_data[0] : '';
				if ( $image_url ) {
					?>
					<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php esc_attr_e( 'Icon', 'tcr-core' ) ?>">
					<?php
				}
			}
			?>
			</div>
		<?php
		} else if ( $settings[ 'icon_as' ] === 'number' ) {
			if ( is_int( ( int ) $settings[ 'infobox_number' ] ) ) {
				?>
				<div class="tcr-infobox-icon">
					<span class="icon-number"><?php echo esc_html( $settings[ 'infobox_number' ] ); ?></span>
				</div>
				<?php				
			}
		} else if ( $settings[ 'icon_as' ] === 'font' ) {
			if ( isset($settings['icon'] ) && $settings['icon'] ) {
				?>
				<div class="tcr-infobox-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
				<?php
			}
		}
	}
	?>
	<div class="tcr-infobox-content">
		<?php
		if ( $settings[ 'infobox_title' ] ) {
			?>
			<h3 class="tcr-infobox-title"><?php echo esc_html( $settings[ 'infobox_title' ] ); ?></h3>
			<?php
		}
		if ( $settings[ 'infobox_content' ] ) {
			?>
			<div class="tcr-infobox-text"><?php echo $settings[ 'infobox_content' ]; ?></div>
			<?php
		}
		if ( isset( $settings[ 'infobox_button_link' ] ) && $settings[ 'infobox_button_link' ] ) {
			?>
			<div class="tcr-infobox-button"><a href="<?php echo esc_url( $settings[ 'infobox_button_link' ]); ?>"><?php echo esc_html( $settings[ 'infobox_button' ]); ?></a></div>
			<?php
		}
		?>
	</div>
</div>