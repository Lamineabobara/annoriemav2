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
class Calens_Elementor_Clients_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-clients';
	}

	public function get_icon() {
		return 'eicon-user-circle-o';
	}

	public function get_title() {
		return esc_html__( 'Clients', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		/**
		 * Testimonials Settings
		 */
		$this->start_controls_section(
			'calens_section_clients_settings',
			[
				'label' => esc_html__( 'General Settings', 'calens-core' ),
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'slider',
				'options' => [
					'slider' => esc_html__( 'Slider', 'calens-core' ),
					'grid'   => esc_html__( 'Grid', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Clients Style', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'calens-core' ),
					'style-2' => esc_html__( 'Style 2', 'calens-core' ),
				],
			]
		);
		
		$this->add_control(
			'clients_column',
			[
				'label'   => esc_html__( 'Columns', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				],
			]
		);

		$this->end_controls_section();

		// Slider Settings
		$this->start_controls_section(
			'calens_section_clients_slider_settings',
			[
				'label'     => esc_html__( 'Slider Settings', 'calens-core' ),
				'condition' => [
					'layout' => 'slider',
				],
			]
		);

		$this->add_control(
			'spacebetween',
			[
				'label' => esc_html__( 'Space Between post', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
			]
		);
		
		$this->add_control(
			'enable_navigation',
			[
				'label'     => esc_html__( 'Enable navigation dots?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);

		$this->add_control(
			'enable_arrow',
			[
				'label'     => esc_html__( 'Enable Previous/Next Arrow ?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);

		$this->add_control(
			'enable_slider_loop',
			[
				'label'     => esc_html__( 'Enable Slider Loop?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);
		
		$this->add_control(
			'enable_slider_autoplay',
			[
				'label'     => esc_html__( 'Enable Slider Autoplay?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);

		$repeater = new \Elementor\Repeater();
		
		$repeater->add_control(
			'client_image',
			[
				'label'   => __( 'Clients Logo', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);
		
		$repeater->add_control(
			'client_hover_image',
			[
				'label'   => __( 'Clients Hover Logo', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
			]
		);
		
		$repeater->add_control(
			'logo_link',
			[
				'label'         => __( 'Logo Link', 'calens-core' ),
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
		
		$this->start_controls_section(
			'calens_section_clients_slides_settings',
			[
				'label' => esc_html__( 'Clients slides', 'calens-core' ),
			]
		);

		$this->add_control(
			'clients_slides',
			[
				'label'  => __( 'Clients slides', 'calens-core' ),
				'type'   => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
			]
		);
		
		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-clients-' . mt_rand();
		$calens_widget_class_unique = 'tcr_clients_wrapper';
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' client-layout-' . $settings['layout'];
		$calens_widget_classes     .= ' client-' . $settings['style'];
		$calens_widget_classes     .= ' column-' . $settings['clients_column'];
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<?php
			if ( 'grid' === $settings['layout'] ) {
				include( __DIR__ . '/layouts/grid.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			} elseif ( 'slider' === $settings['layout'] ) {
				include( __DIR__ . '/layouts/slider.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
			}
			?>
		</div>
		<?php
	}
}
