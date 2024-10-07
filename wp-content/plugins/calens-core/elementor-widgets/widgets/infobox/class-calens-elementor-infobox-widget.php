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
class Calens_Elementor_Infobox_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-infobox';
	}

	public function get_icon() {
		return 'eicon-icon-box';
	}

	public function get_title() {
		return esc_html__( 'Infobox', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'calens_section_infobox_settings',
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
					'style-4' => esc_html__( 'Style 4', 'calens-core' ),
					'style-5' => esc_html__( 'Style 5', 'calens-core' ),
					'style-6' => esc_html__( 'Style 6', 'calens-core' ),
					'style-7' => esc_html__( 'Style 7', 'calens-core' ),
					'style-8' => esc_html__( 'Style 8', 'calens-core' ),
					'style-9' => esc_html__( 'Style 9', 'calens-core' ),
					'style-10' => esc_html__( 'Style 10', 'calens-core' ),
					'style-11' => esc_html__( 'Style 11', 'calens-core' ),
				],
			]
		);
		
		$this->add_control(
			'infobox_title',
			[
				'label' => __( 'Infobox Title', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::TEXT,
			]
		);
		
		$this->add_control(
			'infobox_content',
			[
				'label'       => __( 'Text', 'calens-core' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'rows'        => 10,
				'default'     => __( 'Text', 'calens-core' ),
				'condition' => [
					'style!'      => [ 'style-8' ],
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
				'condition' => [
					'style!'      => [ 'style-8' ],
				],
			]
		);
		
		$this->add_control(
			'icon_as',
			[
				'label'     => esc_html__( 'Icon Type', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'default'   => 'font',
				'options'   => [
					'font'   => esc_html__( 'Font', 'calens-core' ),
					'image'  => esc_html__( 'Image', 'calens-core' ),
					'number' => esc_html__( 'Number', 'calens-core' ),
				],
				'condition' => [
					'add_icon' => 'yes',
					'style!'   => [ 'style-8' ],
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
					'style!'   => [ 'style-8' ],
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
					'style!'   => [ 'style-8' ],
				],
			]
		);
		
		$this->add_control(
			'infobox_number',
			[
				'label'     => esc_html__( 'Infobox Number', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'icon_as'  => 'number',
					'add_icon' => 'yes',
					'style!'   => [ 'style-8' ],
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
					'style'      => [ 'style-8', 'style-9', 'style-10' ],
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
					'style'      => [ 'style-8', 'style-10' ],
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
					'style'      => [ 'style-8', 'style-9', 'style-10' ],
				],
			]
		);

		$this->add_control(
			'infobox_image',
			[
				'label' => __( 'Image', 'kontra-core' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => '',
				],
				'condition' => [
					'style' => 'style-3',
				]
			]
		);


		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$calens_widget_class_unique = 'tcr-infobox' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes     .= 'tcr_infobox_wrapper';
		$calens_widget_classes     .= ' infobox-' . $settings['style'];
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;

		if ( $settings['add_icon'] && $settings['icon_as'] ) {
			$calens_widget_classes .= ' icon-type-' . $settings['icon_as'];
		}
		?>
		<div class="<?php echo esc_attr( $calens_widget_classes ); ?>">
			<?php include( __DIR__ . '/styles/' . $settings['style'] . '.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound ?>
		</div>
		<?php
	}
}
