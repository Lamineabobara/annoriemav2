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
class Calens_Elementor_Team_Widget extends \Elementor\Widget_Base {

	public function get_name() {
		return 'calens-team';
	}

	public function get_icon() {
		return 'eicon-lock-user';
	}

	public function get_title() {
		return esc_html__( 'Team', 'calens-core' );
	}

	public function get_categories() {
		return [ 'calens-core' ];
	}

	protected function register_controls() {

		$categories_data = array();
		$categories      = get_terms(
			array(
				'taxonomy'   => 'team-category',
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
			'calens_section_team_settings',
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
				'label'   => esc_html__( 'Team Style', 'calens-core' ),
				'type'    => \Elementor\Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => [
					'style-1' => esc_html__( 'Style 1', 'calens-core' ),
					'style-2' => esc_html__( 'Style 2', 'calens-core' ),
				],
			]
		);
		
		$this->add_control(
			'post_per_page',
			[
				'label' => esc_html__( 'Team Count', 'calens-core' ),
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
			'calens_section_team_slider_settings',
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
			'calens_section_team_grid_settings',
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
				'label'   => esc_html__( 'Number of items for > 992px', 'calens-core' ),
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
				'label'   => esc_html__( 'Number of items for < 992px', 'calens-core' ),
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
				'label'   => esc_html__( 'Number of items for < 768px', 'calens-core' ),
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
			'post_type'           => 'team',
			'posts_per_page'      => $settings['post_per_page'],
			'post_status'         => array( 'publish' ),
			'ignore_sticky_posts' => true,
			'order'               => $settings['post_order'],
			'orderby'             => $settings['post_orderby'],
		);

		if ( is_array( $settings['post_categories'] ) && $settings['post_categories'] ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'team-category',
					'field'    => 'term_id',
					'terms'    => $settings['post_categories'],
				),
			);
		}

		$the_query = new WP_Query( $args );

		if ( ! $the_query->have_posts() ) {
			return;
		}

		$calens_widget_class_unique = 'tcr-team-' . mt_rand();
		$calens_widget_classes      = 'tcr-elementor-widget';
		$calens_widget_classes      = 'tcr_team_wrapper';
		$calens_widget_classes     .= ' ' . $calens_widget_class_unique;
		$calens_widget_classes     .= ' team-' . $settings['style'];
		$calens_widget_classes     .= ' team-layout-' . $settings['layout'];
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
