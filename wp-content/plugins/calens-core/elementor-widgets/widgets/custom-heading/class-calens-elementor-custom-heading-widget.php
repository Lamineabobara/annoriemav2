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
class Calens_Elementor_Custom_Heading_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-custom-heading';
	}
	
	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_title() {
		return esc_html__( 'Custom Heading', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'calens_section_counter_settings',
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
				],
			]
		);
		
		$this->add_control(
			'text_white_enable',
			[
				'label'     => esc_html__( 'Enable White Text?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);
		
		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title_element',
			[
				'label'   => esc_html__( 'Title Element', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1'  => esc_html__( 'h1', 'calens-core' ),
					'h2'  => esc_html__( 'h2', 'calens-core' ),
					'h3'  => esc_html__( 'h3', 'calens-core' ),
					'h4'  => esc_html__( 'h4', 'calens-core' ),
					'h5'  => esc_html__( 'h5', 'calens-core' ),
					'h6'  => esc_html__( 'h6', 'calens-core' ),
					'div' => esc_html__( 'div', 'calens-core' ),
					'p'   => esc_html__( 'p', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'subtitle_text_transform',
			[
				'label'   => esc_html__( 'Subtitle text transform', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'    => esc_html__( 'Default', 'calens-core' ), 
					'lowercase'  => esc_html__( 'Lowercase', 'calens-core' ), 
					'uppercase'  => esc_html__( 'Uppercase', 'calens-core' ), 
					'capitalize' => esc_html__( 'Capitalize', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => __( 'Subtitle', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'subtitle_element',
			[
				'label'   => esc_html__( 'Subtitle Element Tag', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'h3',
				'options' => [
					'h1'  => esc_html__( 'h1', 'calens-core' ),
					'h2'  => esc_html__( 'h2', 'calens-core' ),
					'h3'  => esc_html__( 'h3', 'calens-core' ),
					'h4'  => esc_html__( 'h4', 'calens-core' ),
					'h5'  => esc_html__( 'h5', 'calens-core' ),
					'h6'  => esc_html__( 'h6', 'calens-core' ),
					'div' => esc_html__( 'div', 'calens-core' ),
					'p'   => esc_html__( 'p', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'title_text_transform',
			[
				'label'   => esc_html__( 'Title text transform', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default'    => esc_html__( 'Default', 'calens-core' ), 
					'lowercase'  => esc_html__( 'Lowercase', 'calens-core' ), 
					'uppercase'  => esc_html__( 'Uppercase', 'calens-core' ), 
					'capitalize' => esc_html__( 'Capitalize', 'calens-core' ),
				],
			]
		);
		
		$this->add_control(
			'heading_alighnment',
			[
				'label'   => esc_html__( 'Heading Alignment', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '',
				'options' => [
					''       => esc_html__( 'None', 'calens-core' ),
					'left'   => esc_html__( 'Left', 'calens-core' ), 
					'right'  => esc_html__( 'Right', 'calens-core' ), 
					'center' => esc_html__( 'Center', 'calens-core' ),
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-custom-heading' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes      = 'tcr_custom_heading_wrapper';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' custom-heading-' . $settings['style'];
		$calens_widget_classes     .= ' heading-alignment-' . $settings['heading_alighnment'];

		if ( $settings['text_white_enable'] ) {
			$calens_widget_classes .= ' heading-white-text';
		}
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<?php include( __DIR__ . '/styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
		</div>
		<?php
	}
}
