<?php
/**
 * Elementor Widgets
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

final class Calens_Elementor_Widgets {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var Elementor_Test_Extension The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return Elementor_Test_Extension An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'init' ] );
	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {
		load_plugin_textdomain( 'elementor-test-extension' );
	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		do_action( 'calens_elemetor_core_init' );
		
		// Register Widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		
		// Add Categories
		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/testimonials/class-calens-elementor-testimonials-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/blog/class-calens-elementor-blog-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/clients/class-calens-elementor-clients-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/team/class-calens-elementor-team-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/services/class-calens-elementor-services-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/projects/class-calens-elementor-projects-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/progress-bar/class-calens-elementor-progress-bar-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/counter/class-calens-elementor-counter-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/custom-heading/class-calens-elementor-custom-heading-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/infobox/class-calens-elementor-infobox-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/list/class-calens-elementor-list-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/tabs/class-calens-elementor-tabs-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/pricing-table/class-calens-elementor-pricing-table-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
		require_once( trailingslashit( CALENSCORE_PATH ) . 'elementor-widgets/widgets/products/class-calens-elementor-products-widget.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Testimonials_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Blog_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Clients_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Team_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Services_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Projects_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Counter_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Custom_Heading_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Infobox_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_List_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Progress_Bar_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Tabs_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Pricing_Table_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Calens_Elementor_Products_Widget() );
	}

	/**
	 * Add widgets categories
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function add_elementor_widget_categories( $elements_manager ) {
		
		$elements_manager->add_category(
			'calens-core',
			[
				'title' => __( 'Calens Core', 'calens-core' ),
				'icon'  => 'fa fa-plug',
			]
		);
	}
}

Calens_Elementor_Widgets::instance();

add_action(
	'elementor/element/before_section_end',
	function( $element, $section_id, $args ) {
		if ( 'section' === $element->get_name() && 'section_background' === $section_id ) {
			$element->add_control(
				'cd-background-color-scheme',
				[
					'label'        => esc_html__( 'Background Color', 'calens-core' ),
					'type'         => \Elementor\Controls_Manager::SELECT,
					'default'      => 'transparent',
					'prefix_class' => 'cd-bg-color-',
					'options'      => [
						'primary'     => esc_html__( 'Primary', 'calens-core' ),
						'secondary'   => esc_html__( 'Secondary', 'calens-core' ),
						'tertiary'    => esc_html__( 'Tertiary', 'calens-core' ),
						'white'       => esc_html__( 'White', 'calens-core' ),
						'transparent' => esc_html__( 'Transparent', 'calens-core' ),
					],
				]
			);
		}

		if ( 'section' === $element->get_name() && 'section_layout' === $section_id ) {
			$element->add_control(
				'cd-section-expand',
				[
					'label'        => esc_html__( 'Section Expand', 'calens-core' ),
					'type'         => \Elementor\Controls_Manager::SELECT,
					'prefix_class' => 'cd-',
					'options'      => [
						''             => esc_html__( 'Select', 'calens-core' ),
						'left-expand'  => esc_html__( 'Left expand', 'calens-core' ),
						'right-expand' => esc_html__( 'Right expand', 'calens-core' ),
					],
				]
			);
		}
	}, 10, 3 // phpcs:ignore PEAR.Functions.FunctionCallSignature.MultipleArguments
);

add_action(
	'elementor/element/column/layout/before_section_end',
	function( $element ) {
		$element->add_control(
			'cd-column-expand',
			[
				'label'        => esc_html__( 'Colum Expand', 'calens-core' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'prefix_class' => 'cd-',
				'options'      => [
					''             => esc_html__( 'Select', 'calens-core' ),
					'left-expand'  => esc_html__( 'Left expand', 'calens-core' ),
					'right-expand' => esc_html__( 'Right expand', 'calens-core' ),
				],
			]
		);

	}
);

add_action(
	'elementor/element/column/section_style/before_section_end',
	function( $element ) {
		$element->add_control(
			'cd-column-background-color-scheme',
			[
				'label'        => esc_html__( 'Background Color', 'calens-core' ),
				'type'         => \Elementor\Controls_Manager::SELECT,
				'default'      => 'transparent',
				'prefix_class' => 'cd-bg-color-',
				'options'      => [
					'primary'     => esc_html__( 'Primary', 'calens-core' ),
					'secondary'   => esc_html__( 'Secondary', 'calens-core' ),
					'tertiary'    => esc_html__( 'Tertiary', 'calens-core' ),
					'white'       => esc_html__( 'White', 'calens-core' ),
					'transparent' => esc_html__( 'Transparent', 'calens-core' ),
				],
			]
		);
	} 
);

add_filter(
	'elementor/icons_manager/additional_tabs',
	function() {
		return [
			'flaticon' =>
			[
				'name'          => 'flaticon',
				'label'         => __( 'Flat Icons', 'calens-core' ),
				'url'           => get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css',
				'enqueue'       => [ get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css' ],
				'prefix'        => 'flaticon-',
				'displayPrefix' => '',
				'labelIcon'     => 'flaticon-calculator',
				'ver'           => '1.0.0',
				'fetchJson'     => trailingslashit( CALENSCORE_URL ) . 'assets/js/flaticons.js',
				'native'        => true,
			],
		];
	}
);

add_action( 'elementor/element/button/section_style/after_section_start', 'calens_custom_button_field', 10, 2 );

function calens_custom_button_field( $button, $args ) {
	$button->add_control(
		'custom_button_color_type',
		[
			'label'        => __( 'Button Color Type', 'calens-core' ),
			'type'         => \Elementor\Controls_Manager::SELECT,
			'default'      => 'transparent',
			'prefix_class' => 'cd-bg-color-',
			'options'      => [
				'primary'     => esc_html__( 'Primary', 'calens-core' ),
				'secondary'   => esc_html__( 'Secondary', 'calens-core' ),
				'tertiary'    => esc_html__( 'Tertiary', 'calens-core' ),
				'white'       => esc_html__( 'White', 'calens-core' ),
				'transparent' => esc_html__( 'Transparent', 'calens-core' ),
			],
		] 
	);
}

add_action( 'elementor/widget/before_render_content', 'calens_custom_render_button' );

function calens_custom_render_button( $button ) {
	if ( 'button' === $button->get_name() ) {
		$settings = $button->get_settings();
		if ( $settings['custom_button_color_type'] ) {
			$button->add_render_attribute( 'button', 'class', 'cd-color-' . $settings['custom_button_color_type'], true );
		}
	}
}
