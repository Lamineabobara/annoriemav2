<?php
/**
 * Calens products Widget
 *
 * @package Calens Core
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Testimonials Widget.
 */
class Calens_Elementor_Products_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-products';
	}

	public function get_icon() {
		return 'calens-core-elm-icon-products';
	}

	public function get_title() {
		return esc_html__( 'Products', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		$categories_data = array();
		$categories      = get_terms(
			array(
				'taxonomy'   => 'product_cat',
				'pad_counts' => true,
				'hide_empty' => true,
			) 
		);

		$categories_data[] = 'Select';
		foreach ( $categories as $category ) {
			if ( is_object( $category ) && isset( $category->name, $category->term_id ) ) {
				$categories_data[ $category->term_id ] = $category->name . ' (' . $category->count . ')';
			}
		}

		/**
		 * Testimonials Settings
		 */
		$this->start_controls_section(
			'calens_section_products_settings',
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
			'post_per_page',
			[
				'label' => esc_html__( 'Products Count', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
			]
		);
		
		$this->add_control(
			'post_categories',
			[
				'label'    => __( 'Categories', 'calens-core' ),
				'type'     => \Elementor\Controls_Manager::SELECT2,
				'multiple' => true,
				'options'  => $categories_data,
			]
		);
		
		$this->add_control(
			'post_order',
			[
				'label'   => esc_html__( 'Order', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'DESC',
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'calens-core' ),
					'DESC' => esc_html__( 'Descending', 'calens-core' ),
				],
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label'   => esc_html__( 'Orderby', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'ID'       => esc_html__( 'ID', 'calens-core' ),
					'title'    => esc_html__( 'Title', 'calens-core' ),
					'date'     => esc_html__( 'Date', 'calens-core' ),
					'modified' => esc_html__( 'Modified Date', 'calens-core' ),
				],
			]
		);
		
		$this->end_controls_section();

		// Slider Settings
		$this->start_controls_section(
			'calens_section_products_slider_settings',
			[
				'label'     => esc_html__( 'Slider Settings', 'calens-core' ),
				'condition' => [
					'layout' => 'slider',
				],
			]
		);
		
		$this->add_control(
			'post_spacebetween',
			[
				'label' => esc_html__( 'Space Between post', 'calens-core' ),
				'type'  => \Elementor\Controls_Manager::NUMBER,
			]
		);
		
		$this->add_control(
			'post_enable_navigation',
			[
				'label'     => esc_html__( 'Enable navigation dots?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);
		
		$this->add_control(
			'post_enable_arrow',
			[
				'label'     => esc_html__( 'Enable Previous/Next Arrow ?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);

		$this->add_control(
			'post_enable_slider_loop',
			[
				'label'     => esc_html__( 'Enable Slider Loop?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);
		
		$this->add_control(
			'post_enable_slider_autoplay',
			[
				'label'     => esc_html__( 'Enable Slider Autoplay?', 'calens-core' ),
				'type'      => \Elementor\Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'calens-core' ),
				'label_off' => __( 'No', 'calens-core' ),
			]
		);
		
		$this->add_control(
			'post_slider_responsive_xl',
			[
				'label'   => esc_html__( 'Number of slides for > 992px', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				],
			]
		);
		
		$this->add_control(
			'post_slider_responsive_lg',
			[
				'label'   => esc_html__( 'Number of slides for < 992px', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'3' => '3',
					'2' => '2',
					'1' => '1',
				],
			]
		);
		
		
		$this->add_control(
			'post_slider_responsive_md',
			[
				'label'   => esc_html__( 'Number of slides for < 768px', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'3' => '3',
					'2' => '2',
					'1' => '1',
				],
			]
		);
		
		$this->end_controls_section();
		
		// Grid Settings
		$this->start_controls_section(
			'calens_section_products_grid_settings',
			[
				'label'     => esc_html__( 'Grid Settings', 'calens-core' ),
				'condition' => [
					'layout' => 'grid',
				],
			]
		);
		
		$this->add_control(
			'post_grid_responsive_xl',
			[
				'label'   => esc_html__( 'Items for >= 1200px', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'6' => '6',
					'5' => '5',
					'4' => '4',
					'3' => '3',
				],
			]
		);
		
		$this->add_control(
			'post_grid_responsive_lg',
			[
				'label'   => esc_html__( 'Items for >= 992px', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'3' => '3',
					'2' => '2',
				],
			]
		);
		
		$this->add_control(
			'post_grid_responsive_md',
			[
				'label'   => esc_html__( 'Items for >= 768px', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => '2',
				'options' => [
					'3' => '3',
					'2' => '2',
					'1' => '1',
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		$args = array(
			'post_type'           => 'product',
			'posts_per_page'      => $settings['post_per_page'],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $settings['post_order'],
			'orderby'             => $settings['post_orderby'],
		);

		if ( isset( $settings['post_categories'] ) && $settings['post_categories'] && is_array( $settings['post_categories'] ) ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'term_id',
					'terms'    => $settings['post_categories'],
				),
			);
		}
		
		$the_query = new WP_Query( $args );

		if ( ! $the_query->have_posts() ) {
			return;
		}

		$calens_widget_class_unique = 'tcr-products-' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes      = 'tcr_products_wrapper woocommerce';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' products-layout-' . $settings['layout'];

		if ( 'grid' === $settings['layout'] ) {
			$calens_widget_classes     .= ' grid-' . $settings['post_grid_responsive_xl'];
		}
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
