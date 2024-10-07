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
class Calens_Elementor_Counter_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-counter';
	}

	public function get_icon() {
		return 'eicon-number-field';
	}

	public function get_title() {
		return esc_html__( 'Counter', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		/**
		 * Testimonials Settings
		 */
		$this->start_controls_section(
			'calens_section_counter_settings',
			[
				'label' => esc_html__( 'General Settings', 'calens-core' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Counter Style', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'calens-core' ),
					'style-2' => esc_html__( 'Style 2', 'calens-core' ),
					'style-3' => esc_html__( 'Style 3', 'calens-core' ),
					'style-4' => esc_html__( 'Style 4', 'calens-core' ),
					'style-5' => esc_html__( 'Style 5', 'calens-core' ),
					'style-6' => esc_html__( 'Style 6', 'calens-core' ),
				],
			]
		);
		
		$this->add_control(
			'counter_number',
			[
				'label' => esc_html__( 'Counter Number', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'counter_color',
			[
				'label'     => esc_html__( 'Counter Color', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tcr-counter-number' => 'color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'counter_title',
			[
				'label' => __( 'Counter Title', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'counter_title_color',
			[
				'label'     => esc_html__( 'Title Color', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tcr-counter-title' => 'color: {{VALUE}}',
				],
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
			'icon_as',
			[
				'label'     => esc_html__( 'Icon Type', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'font',
				'options'   => [
					'font'  => esc_html__( 'Font', 'calens-core' ),
					'image' => esc_html__( 'Image', 'calens-core' ),
				],
				'condition' => [
					'add_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'icon_image',
			[
				'label'     => __( 'Image', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'default'   => [
					'url' => '',
				],
				'condition' => [
					'icon_as'  => 'image',
					'add_icon' => 'yes',
				],
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
					'icon_as'  => 'font',
					'add_icon' => 'yes',
				],
			]
		);
		
		$this->add_control(
			'add_button',
			[
				'label'     => esc_html__( 'Add button?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
				'condition' => [
					'style' => ['style-1', 'style-2', 'style-3'],
				],
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label'     => esc_html__( 'Button Text', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'add_button' => 'yes',
					'style'      => ['style-1', 'style-2', 'style-3'],
				],
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label'         => __( 'Button Link', 'calens-core' ),
				'type'          => \Elementor\Controls_Manager::URL,
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
				'condition'     => [
					'add_button' => 'yes',
					'style'      => ['style-1', 'style-2', 'style-3'],
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-counter-' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes      = 'tcr_counter_wrapper';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' counter-' . $settings['style'];
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<?php include( __DIR__ . '/styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
		</div>
		<?php
	}
}
