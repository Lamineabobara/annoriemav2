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
class Calens_Elementor_List_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-list';
	}

	public function get_icon() {
		return 'eicon-editor-list-ul';
	}

	public function get_title() {
		return esc_html__( 'List', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		/**
		 * Testimonials Settings
		 */
		$this->start_controls_section(
			'calens_section_list_settings',
			[
				'label' => esc_html__( 'General Settings', 'calens-core' ),
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
		
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'calens_section_lists_settings',
			[
				'label' => esc_html__( 'Lists', 'calens-core' ),
			]
		);
		
		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'list_title',
			[
				'label' => __( 'Title', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$repeater->add_control(
			'list_link',
			[
				'label'         => __( 'Title Link', 'calens-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);
		
		$this->add_control(
			'list_items',
			[
				'label'  => __( 'List details', 'calens-core' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-list-' . mt_rand();
		$calens_widget_class_unique = 'tcr_list_wrapper';
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<?php
			$list_items = $settings['list_items'];
			?>
			<div class="calens-list-wrapper">
				<ul class="calens-list">
					<?php
					if ( ! empty( $list_items ) ) {
						foreach ( $list_items as $list_item ) {
							if ( isset( $list_item['list_title'] ) && ! empty( $list_item['list_title'] ) ) {
								?>
								<li class="list-item">
									<?php
									if ( $settings['add_icon'] ) {
										if ( isset( $settings['icon'] ) && $settings['icon'] ) {
											?>
											<div class="calens-list-icon"><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></div>
											<?php
										}
									}
									?>
									<?php if ( isset( $list_item['list_link'] ) && $list_item['list_link'] ) { ?>
										<p class="calens-list-info" >
										<?php
										
										$list_link = $list_item['list_link'];
										if ( ! empty( $list_link ) || ! empty( $list_link['url'] ) ) {

											echo '<a';

											if ( ! empty( $list_link['url'] ) ) {
												echo ' href="' . esc_url( $list_link['url'] ) . '"';
											} else {
												echo ' href="#"';
											}

											if ( ! empty( $list_link['is_external'] ) ) {
												echo ' target="_blank"';
											}

											if ( ! empty( $list_link['nofollow'] ) ) {
												echo ' rel="nofollow"';
											}

											echo ' >';
										}

										echo esc_html( $list_item['list_title'] );

										if ( ! empty( $list_link ) || ! empty( $list_link['url'] ) ) {
											echo '</a>';
										}
										?>
										</p>

									<?php } else { ?>
										<p class="calens-list-info ">
										<?php echo esc_html( $list_item['list_title'] ); ?>
										</p>
									<?php } ?>
								</li>
								<?php
							}
						}
					}
					?>
				</ul>
			</div>
		</div>
		<?php
	}
}
