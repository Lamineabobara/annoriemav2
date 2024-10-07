<?php
/**
 * Calens Tabs Widget
 *
 * @package Calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Tabs Widget.
 */
class Calens_Elementor_Tabs_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-tabs';
	}

	public function get_icon() {
		return 'eicon-tabs';
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'tabs_settings',
			[
				'label' => esc_html__( 'General Settings', 'calens-core' ),
			]
		);

		$this->add_control(
			'tab_layout',
			[
				'label'       => esc_html__( 'Layout', 'calens-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'horizontal',
				'label_block' => false,
				'options'     => [
					'horizontal' => esc_html__( 'Horizontal', 'calens-core' ),
					'vertical'   => esc_html__( 'Vertical', 'calens-core' ),
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'tabs_content_settings',
			[
				'label' => esc_html__( 'Content', 'calens-core' ),
			]
		);


		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'tab_title',
			[
				'label'   => esc_html__( 'Tab Title', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Tab Title', 'calens-core' ),
			]
		);
		
		$repeater->add_control(
			'add_icon',
			[
				'label'     => esc_html__( 'Add icon?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);

		$repeater->add_control(
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
		
		$repeater->add_control(
			'tabs_content_type',
			[
				'label'   => esc_html__( 'Content Type', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'content',
				'options' => [
					'content'  => esc_html__( 'Content', 'calens-core' ),
					'template' => esc_html__( 'Saved Templates', 'calens-core' ),
				],
			]
		);
		
		$repeater->add_control(
			'elemetor_templates',
			[
				'label'     => esc_html__( 'Choose Template', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'content',
				'options'   => calenscore_get_elemetor_templates(),
				'condition' => [
					'tabs_content_type' => 'template',
				],
			]
		);
		
		$repeater->add_control(
			'tab_content',
			[
				'label'     => esc_html__( 'Tab Content', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::WYSIWYG,
				'default'   => 'content',
				'condition' => [
					'tabs_content_type' => 'content',
				],
			]
		);
		
		$this->add_control(
			'tabs_list',
			[
				'label'  => __( 'Tabs List', 'calens-core' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-tabs-' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes      = 'tcr_tabs_wrapper';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' tcr-layout-' . $settings['tab_layout'];
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<div class="tcr-tab-list">
				<?php
				if ( $settings['tabs_list'] ) {
					foreach ( $settings['tabs_list'] as $tabs_list ) {
						?>
						<div class="tcr-list-tab">							
							<a href="" data-tab-id="<?php echo esc_attr( 'tab-' . $tabs_list['_id'] ); ?>" >
							<?php
							if ( $tabs_list['add_icon'] ) {
								if ( isset( $tabs_list['icon'] ) && $tabs_list['icon'] ) {
									?>
									<span class="tcr-tab-icon"><?php \Elementor\Icons_Manager::render_icon( $tabs_list['icon'], [ 'aria-hidden' => 'true' ] ); ?></span>
									<?php
								}
							}
							echo $tabs_list['tab_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
							?>
							</a>
						</div>
						<?php
					}
				}
				?>
			</div>
			<div class="tcr-tab-content">
				<?php
				if ( $settings['tabs_list'] ) {
					foreach ( $settings['tabs_list'] as $tabs_list ) {
						?>
						<div class="tcr-tab-content-list" id="<?php echo esc_attr( 'tab-' . $tabs_list['_id'] ); ?>">
						<?php
						if ( 'content' === $tabs_list['tabs_content_type'] ) {
							echo $tabs_list['tab_content']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						} else {
							$template_id = $tabs_list['elemetor_templates'];
							$template    = new \Elementor\Frontend;
							echo $template->get_builder_content( $template_id, true ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						}
						?>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
		<?php
	}
}
