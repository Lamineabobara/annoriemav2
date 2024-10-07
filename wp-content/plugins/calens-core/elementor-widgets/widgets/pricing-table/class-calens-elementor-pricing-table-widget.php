<?php
/**
 * Calens testimonials Widget
 *
 * @package Calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly	
}

/**
 * Testimonials Widget.
 */
class Calens_Elementor_Pricing_Table_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-pricing-table';
	}

	public function get_icon() {
		return 'eicon-price-list';
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		/**
		 * Testimonials Settings
		 */
		$this->start_controls_section(
			'calens_pricing_table_general_settings',
			[
				'label' => esc_html__( 'General Settings', 'calens-core' ),
			]
		);
		
		$this->add_control(
			'table_title',
			[
				'label' => esc_html__( 'Title', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$this->add_control(
			'table_price',
			[
				'label' => esc_html__( 'Price', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$this->add_control(
			'table_onsale',
			[
				'label'        => esc_html__( 'On Sale?', 'calens-core' ),
				'type'         => \Elementor\Controls_Manager::SWITCHER,
				'default'      => 'no',
				'label_on'     => esc_html__( 'Yes', 'calens-core' ),
				'label_off'    => esc_html__( 'No', 'calens-core' ),
				'return_value' => 'yes',
			]
		);
		
		$this->add_control(
			'onsale_price',
			[
				'label'     => esc_html__( 'Sale Price', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'table_onsale' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'table_price_currency',
			[
				'label'   => esc_html__( 'Price Currency', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( '$', 'calens-core' ),
			]
		);

		$this->add_control(
			'table_price_currency_placement',
			[
				'label'   => esc_html__( 'Currency Placement', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'before',
				'options' => [
					'before' => esc_html__( 'Before', 'calens-core' ),
					'after'  => esc_html__( 'After', 'calens-core' ),
				],
			]
		);
		
		$this->add_control(
			'table_price_period',
			[
				'label'   => esc_html__( 'Price Period', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Monthly', 'calens-core' ),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'calens_section_feature_lists_settings',
			[
				'label' => esc_html__( 'Feature Lists', 'calens-core' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'table_feature_title',
			[
				'label' => __( 'Title', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$repeater->add_control(
			'table_feature_mark',
			[
				'label'   => esc_html__( 'Mark As', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true'  => esc_html__( 'True', 'calens-core' ),
					'false' => esc_html__( 'False', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'feature_list_items',
			[
				'label'  => __( 'Feature List details', 'calens-core' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'table_footer', 
			[
				'label' => esc_html__( 'Footer', 'calens-core' ),
			]
		);

		$this->add_control(
			'add_icon',
			[
				'label'     => esc_html__( 'Add icon?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);

		$this->add_control(
			'icon',
			[
				'label'     => __( 'Icon', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::ICONS,
				'default'   => [
					'value'   => 'fas fa-star',
					'library' => 'solid',
				],
				'condition' => [
					'add_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'table_button_icon_position',
			[
				'label'     => esc_html__( 'Icon Position', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'before',
				'options'   => [
					'before' => esc_html__( 'Before', 'calens-core' ),
					'after'  => esc_html__( 'After', 'calens-core' ),
				],
				'condition' => [
					'add_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'table_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'table_btn_link',
			[
				'label'         => __( 'Button Link', 'calens-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-list-' . mt_rand();
		$calens_widget_class_unique = 'tcr_pricing_table_wrapper';
		$calens_widget_classes      = 'tcr-elementor-widget';

		if ( 'yes' === $settings['table_onsale'] ) {
			$calens_widget_classes = 'pricing-table-onsale';
		}

		$calens_widget_classes .= ' ' . $calens_widget_class_unique;
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<div class="tcr-pricing-table-header">
				<div class="pricing-table-title-wrapper">
					<?php 
					if ( $settings['table_title'] ) {
						?>
						<div class="pricing-table-title">
							<?php echo esc_html( $settings['table_title'] ); ?>
						</div>
						<?php
					}
					
					if ( $settings['table_price_period'] ) {
						?>
						<div class="pricing-table-title-period">
							<?php echo esc_html( $settings['table_price_period'] ); ?>
						</div>
						<?php
					}
					?>
				</div>
				<div class="pricing-table-price-wrapper">
					<div class="pricing-table-base-price">
						<?php
						if ( 'before' === $settings['table_price_currency_placement'] ) {
							echo esc_html( $settings['table_price_currency'] );
						}

						echo esc_html( $settings['table_price'] ); 

						if ( 'after' === $settings['table_price_currency_placement'] ) {
							echo esc_html( $settings['table_price_currency'] );
						}
						?>
					</div>
					<?php
					if ( 'yes' === $settings['table_onsale'] ) {
						?>
						<div class="pricing-table-sale-price">
							<?php
							if ( 'before' === $settings['table_price_currency_placement'] ) {
								echo esc_html( $settings['table_price_currency'] );
							}

							echo esc_html( $settings['onsale_price'] ); 

							if ( 'after' === $settings['table_price_currency_placement'] ) {
								echo esc_html( $settings['table_price_currency'] );
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
			<div class="tcr-pricing-table-feature-list">
				<?php
				$feature_items = $settings['feature_list_items'];
				foreach ( $feature_items as $feature_item ) {
					if ( $feature_item['table_feature_title'] ) {
						?>
						<div class="feature-list-item">
						<?php
						if ( 'true' === $feature_item['table_feature_mark'] ) {
							?>
							<i class="fas fa-check"></i>
							<?php
						} else {
							?>
							<i class="fas fa-times"></i>
							<?php
						}
						echo esc_html( $feature_item['table_feature_title'] );
						?>
						</div>
						<?php
					}
				}
				?>
			</div>
			<div class="tcr-pricing-table-footer">
				<div class="tcr-pricing-table-button">
					<?php
					if ( $settings['add_icon'] && 'before' === $settings['table_button_icon_position'] ) {
						if ( isset( $settings['icon'] ) && $settings['icon'] ) {
							?>
							<div class="tcr-pricing-table-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
							<?php
						}
					}

					if ( $settings['table_btn_link'] && $settings['table_btn_text'] ) {

						$link = $settings['table_btn_link'];
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

						echo esc_html( $settings['table_btn_text'] );

						if ( ! empty( $link ) || ! empty( $link['url'] ) ) {
							echo '</a>';
						}
					}
 
					if ( $settings['add_icon'] && 'after' === $settings['table_button_icon_position'] ) {
						if ( isset( $settings['icon'] ) && $settings['icon'] ) {
							?>
							<div class="tcr-pricing-table-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}
