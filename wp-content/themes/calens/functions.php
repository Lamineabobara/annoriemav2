<?php
/**
 * Calens functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Calens
 */

if ( ! function_exists( 'calens_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function calens_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on calens, use a find and replace
		 * to change 'calens' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'calens', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( 
			array(
				'primary-menu' => esc_html__( 'Primary', 'calens' ),
			) 
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) 
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'calens_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				) 
			) 
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		// Add new timage sizes.
		add_image_size( 'calens-1000x800', 1000, 800, true ); 
		add_image_size( 'calens-800x1000', 800, 1000, true ); 
		add_image_size( 'calens-800x600', 800, 600, true ); 
		add_image_size( 'calens-600x600', 600, 600, true );
		add_image_size( 'calens-600x340', 600, 340, true );
		add_image_size( 'calens-600x645', 600, 645, true );
		add_image_size( 'calens-615x750', 615, 750, true );
		add_image_size( 'calens-600x400', 600, 400, true );

	}
endif;
add_action( 'after_setup_theme', 'calens_setup' );

/*
 * Prefdefine Global variable
 */
global $calens_globals;

$calens_globals = array(
	'theme_options_slug' => 'calens-options',
	'theme_options_name' => 'calens_options',
);

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function calens_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'calens_content_width', 640 );
}
add_action( 'after_setup_theme', 'calens_content_width', 0 );

if ( ! function_exists( 'calens_scripts' ) ) {
	/**
	 * Enqueue scripts and styles.
	 */
	function calens_scripts() {

		global $calens_options;

		$theme_data = wp_get_theme();
		if ( is_child_theme() && is_object( $theme_data->parent() ) ) {
			$theme_data = wp_get_theme( $theme_data->parent()->template );
		}

		$version = $theme_data->get( 'Version' );

		if ( is_rtl() ) {
			wp_enqueue_style( 'bootstrap-rtl', get_template_directory_uri() . '/assets/css/bootstrap-rtl.min.css', array(), '4.0.0' );
		} else {
			wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0' );
		}

		wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4' );
		
		wp_enqueue_style( 'fontawesome-shims', get_template_directory_uri() . '/assets/fonts/css/v4-shims.min.css', array(), '5.11.2' );
		
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/css/all.min.css', array( 'fontawesome-shims' ), '5.11.2' );
		
		wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css', array(), $version );
		
		wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.1.0' );
		
		wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.min.css', array(), '1.0.10' );
		
		if ( ! class_exists( 'Redux' ) ) {
			$query_args = array(
				'family'  => 'Barlow+Condensed:wght@400;600;700&family=Poppins:wght@400;600;700',
				'display' => 'swap',
			);
			wp_enqueue_style( 'google-fonts', add_query_arg( $query_args, '//fonts.googleapis.com/css2' ), array(), null );
		}
		
		if ( is_rtl() ) {
			wp_enqueue_style( 'calens-style', get_stylesheet_uri(), array( 'bootstrap-rtl' ) );
			wp_enqueue_style( 'calens-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array(), $version );
		} else {
			wp_enqueue_style( 'calens-style', get_stylesheet_uri(), array( 'bootstrap' ) );
		}
		
		wp_enqueue_style( 'calens-theme-style', get_template_directory_uri() . '/assets/css/theme.css', array(), $version );
		
		wp_register_style( 'calens-responsive-style', get_template_directory_uri() . '/assets/css/responsive.css', array(), $version );
		
		$upload                   = wp_upload_dir();
		$color_customize_css      = $upload['baseurl'] . '/calens-color-customizer/color-customize.css';
		$color_customize_css_path = $upload['basedir'] . '/calens-color-customizer/color-customize.css';

		if ( file_exists( $color_customize_css_path ) && class_exists( 'Redux' ) ) {
			$color_customize_css_ver = date( 'ymd-Gis', filemtime( $color_customize_css_path ) );
			wp_register_style( 'calens-color-customizer', $color_customize_css, array( 'calens-style' ), $color_customize_css_ver );
		} else {
			wp_register_style( 'calens-color-customizer', get_template_directory_uri() . '/assets/css/color-customize.css', array( 'calens-style' ), $version );
		}

		if ( is_rtl() ) {
			wp_enqueue_script( 'bootstrap-rtl', get_template_directory_uri() . '/assets/js/bootstrap-rtl.min.js', array( 'jquery' ), '4.0.0', true );
		} else {
			wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
		}

		wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array( 'jquery' ), $version, true );

		wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '2.3.4', true );

		wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.js', array( 'jquery' ), '1.1.0', true );
		
		wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/slicknav.min.js', array( 'jquery' ), '1.0.10' );

		wp_enqueue_script( 'calens-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), $version, true );
		
		wp_register_script( 'calens-custom', get_template_directory_uri() . '/assets/js/custom.js', array( 'jquery' ), $version, true );
		
		$calens_l10n = array(
			'sticky_header' => isset( $calens_options['sticky-header'] ) ? (bool) $calens_options['sticky-header'] : true
		);

		wp_localize_script( 'calens-custom', 'calens_l10n', $calens_l10n );

		wp_enqueue_script( 'calens-custom' );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
}
add_action( 'wp_enqueue_scripts', 'calens_scripts' );

if ( ! function_exists( 'calens_enqueue_scripts_admin' ) ) {
	/**
	 * Enqueue scripts and styles for backend.
	 *
	 * @since 1.0.0
	 */
	function calens_enqueue_scripts_admin( $hook ) {

		$theme_data = wp_get_theme();
		if ( is_child_theme() && is_object( $theme_data->parent() ) ) {
			$theme_data = wp_get_theme( $theme_data->parent()->template );
		}

		$version = $theme_data->get( 'Version' );

		wp_enqueue_style( 'fontawesome-shims', get_template_directory_uri() . '/assets/fonts/css/v4-shims.min.css', array(), '4.0.0' );
		
		wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/assets/fonts/css/all.min.css', array( 'fontawesome-shims' ), '4.0.0' );
		
		wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/flaticon.css', array(), $version );
		
		wp_enqueue_style( 'calens-admin', get_template_directory_uri() . '/assets/css/admin.css', array(), $version );

	}
}
add_action( 'admin_enqueue_scripts', 'calens_enqueue_scripts_admin' );

/**
 * Enqueue scripts and styles in the bottom.
 */
if ( ! function_exists( 'calens_enqueue_color_customize_in_footer' ) ) {
	/**
	 * Function to add color customizer in footer.
	 *
	 * @since 1.0.0
	 */
	function calens_enqueue_color_customize_in_footer() {
		
		if ( wp_style_is( 'calens-responsive-style', 'registered' ) ) {
			wp_enqueue_style( 'calens-responsive-style' );
		}
		
		if ( wp_style_is( 'calens-color-customizer', 'registered' ) ) {
			wp_enqueue_style( 'calens-color-customizer' );
		}
	}
}
add_action( 'get_footer', 'calens_enqueue_color_customize_in_footer' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Functions wich provides the template html classes.
 */
require get_template_directory() . '/inc/template-classes.php';

/**
 * Color customizer css.
 */
require get_template_directory() . '/inc/color-customizer.php';

/**
 * Register sidebars.
 */
require get_template_directory() . '/inc/sidebars.php';

/**
 * Load theme options.
 */
require get_template_directory() . '/inc/redux-options/redux-config.php';

/**
 * Comment walker.
 */
require get_template_directory() . '/classes/class-calens-walker-comment.php';

/**
 * Category Widget walker.
 */
require get_template_directory() . '/classes/class-calens-walker-category.php';

/**
 * TGM plugin activation.
 */
require get_template_directory() . '/inc/tgm-plugin-activation/required-plugin.php';
