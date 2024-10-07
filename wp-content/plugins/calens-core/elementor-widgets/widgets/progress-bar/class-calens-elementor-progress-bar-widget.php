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
 * Projects Widget.
 */
class Calens_Elementor_Progress_Bar_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-progress-bar';
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_title() {
		return esc_html__( 'Progress Bar', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		/**
		 * Testimonials Settings
		 */
		$this->start_controls_section(
			'calens_section_progress_bar_settings',
			[
				'label' => esc_html__( 'General Settings', 'calens-core' ),
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Style', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'calens-core' ),
					'style-2' => esc_html__( 'Style 2', 'calens-core' ),
					'style-3' => esc_html__( 'Style 3', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'unit',
			[
				'label' => __( 'Unit', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$this->add_control(
			'bar_height',
			[
				'label' => __( 'Progress Bar Height', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
				'step'  => 1,
			]
		);
		
		$this->add_control(
			'bar_color',
			[
				'label'     => esc_html__( 'Bar color', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tcr-progress-bar-inner' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->add_control(
			'bar_background_color',
			[
				'label'     => esc_html__( 'Bar Background Color', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tcr-progress-bar' => 'background-color: {{VALUE}}',
				],
			]
		);
		
		$this->end_controls_section();
		
		$this->start_controls_section(
			'calens_section_progress_bars_settings',
			[
				'label' => esc_html__( 'Progress Bars', 'calens-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'bar_label',
			[
				'label'       => __( 'Label', 'calens-core' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Enter text used as title of bar.', 'calens-core' ),
			]
		);
		
		$repeater->add_control(
			'bar_value',
			[
				'label' => __( 'Value', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
				'step'  => 1,
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
		
		$repeater->add_control(
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
					'icon_as'  => 'font',
					'add_icon' => 'yes',
				],
			]
		);

		$this->add_control(
			'progress_bars',
			[
				'label'  => __( 'Progress Bars', 'calens-core' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-progressbar-' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes      = 'tcr_progress_bar_wrapper';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' progress-bar-' . $settings['style'];
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<?php include( __DIR__ . '/styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
		</div>
		<?php
	}
}
