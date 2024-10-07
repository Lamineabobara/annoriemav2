<?php
/**
 * Get elementor templates
 */
if ( ! function_exists( 'calenscore_get_elemetor_templates' ) ) {

	function calenscore_get_elemetor_templates() {
		$page_templates = get_posts(
			array(
				'post_type'      => 'elementor_library',
				'posts_per_page' => -1, // phpcs:ignore WPThemeReview.CoreFunctionality.PostsPerPage.posts_per_page_posts_per_page
			)
		);

		$options = array();

		if ( ! empty( $page_templates ) && ! is_wp_error( $page_templates ) ) {
			foreach ( $page_templates as $post ) {
				$options[ $post->ID ] = $post->post_title;
			}
		}

		return $options;
	}
}

/**
 * Get the social icons.
 */
if ( ! function_exists( 'calenscore_get_social_icons' ) ) {
	/*
	 * Funtion to get the social icons.
	 */
	function calenscore_get_social_icons() {
		$social_icons = array(
			array( 'fab fa-creative-commons' => 'Creative Commons' ),
			array( 'fab fa-twitter-square' => 'Twitter Square (social network,tweet)' ),
			array( 'fab fa-facebook-square' => 'Facebook Square (social network)' ),
			array( 'fab fa-linkedin' => 'LinkedIn (linkedin-square)' ),
			array( 'fab fa-github-square' => 'GitHub Square (octocat)' ),
			array( 'fab fa-twitter' => 'Twitter (social network,tweet)' ),
			array( 'fab fa-facebook-f' => 'Facebook F (facebook)' ),
			array( 'fab fa-github' => 'GitHub (octocat)' ),
			array( 'fab fa-pinterest' => 'Pinterest' ),
			array( 'fab fa-pinterest-square' => 'Pinterest Square' ),
			array( 'fab fa-google-plus-square' => 'Google Plus Square (social network)' ),
			array( 'fab fa-google-plus-g' => 'Google Plus G (google-plus,social network)' ),
			array( 'fab fa-linkedin-in' => 'LinkedIn In (linkedin)' ),
			array( 'fab fa-github-alt' => 'Alternate GitHub (octocat)' ),
			array( 'fab fa-maxcdn' => 'MaxCDN' ),
			array( 'fab fa-html5' => 'HTML 5 Logo' ),
			array( 'fab fa-css3' => 'CSS 3 Logo (code)' ),
			array( 'fab fa-youtube-square' => 'YouTube Square' ),
			array( 'fab fa-xing' => 'Xing' ),
			array( 'fab fa-xing-square' => 'Xing Square' ),
			array( 'fab fa-dropbox' => 'Dropbox' ),
			array( 'fab fa-stack-overflow' => 'Stack Overflow' ),
			array( 'fab fa-instagram' => 'Instagram' ),
			array( 'fab fa-flickr' => 'Flickr' ),
			array( 'fab fa-adn' => 'App.net' ),
			array( 'fab fa-bitbucket' => 'Bitbucket (atlassian,bitbucket-square,git)' ),
			array( 'fab fa-tumblr' => 'Tumblr' ),
			array( 'fab fa-tumblr-square' => 'Tumblr Square' ),
			array( 'fab fa-apple' => 'Apple (fruit,ios,mac,operating system,os,osx)' ),
			array( 'fab fa-windows' => 'Windows (microsoft,operating system,os)' ),
			array( 'fab fa-android' => 'Android (robot)' ),
			array( 'fab fa-linux' => 'Linux (tux)' ),
			array( 'fab fa-dribbble' => 'Dribbble' ),
			array( 'fab fa-skype' => 'Skype' ),
			array( 'fab fa-foursquare' => 'Foursquare' ),
			array( 'fab fa-trello' => 'Trello (atlassian)' ),
			array( 'fab fa-gratipay' => 'Gratipay (Gittip) (favorite,heart,like,love)' ),
			array( 'fab fa-vk' => 'VK' ),
			array( 'fab fa-weibo' => 'Weibo' ),
			array( 'fab fa-renren' => 'Renren' ),
			array( 'fab fa-pagelines' => 'Pagelines (eco,flora,leaf,leaves,nature,plant,tree)' ),
			array( 'fab fa-stack-exchange' => 'Stack Exchange' ),
			array( 'fab fa-vimeo-square' => 'Vimeo Square' ),
			array( 'fab fa-slack' => 'Slack Logo (anchor,hash,hashtag)' ),
			array( 'fab fa-wordpress' => 'WordPress Logo' ),
			array( 'fab fa-openid' => 'OpenID' ),
			array( 'fab fa-yahoo' => 'Yahoo Logo' ),
			array( 'fab fa-google' => 'Google Logo' ),
			array( 'fab fa-reddit' => 'reddit Logo' ),
			array( 'fab fa-reddit-square' => 'reddit Square' ),
			array( 'fab fa-stumbleupon-circle' => 'StumbleUpon Circle' ),
			array( 'fab fa-stumbleupon' => 'StumbleUpon Logo' ),
			array( 'fab fa-delicious' => 'Delicious' ),
			array( 'fab fa-digg' => 'Digg Logo' ),
			array( 'fab fa-pied-piper-pp' => 'Pied Piper PP Logo (Old)' ),
			array( 'fab fa-pied-piper-alt' => 'Alternate Pied Piper Logo' ),
			array( 'fab fa-drupal' => 'Drupal Logo' ),
			array( 'fab fa-joomla' => 'Joomla Logo' ),
			array( 'fab fa-behance' => 'Behance' ),
			array( 'fab fa-behance-square' => 'Behance Square' ),
			array( 'fab fa-deviantart' => 'deviantART' ),
			array( 'fab fa-vine' => 'Vine' ),
			array( 'fab fa-codepen' => 'Codepen' ),
			array( 'fab fa-jsfiddle' => 'jsFiddle' ),
			array( 'fab fa-rebel' => 'Rebel Alliance' ),
			array( 'fab fa-empire' => 'Galactic Empire' ),
			array( 'fab fa-git-square' => 'Git Square' ),
			array( 'fab fa-git' => 'Git' ),
			array( 'fab fa-hacker-news' => 'Hacker News' ),
			array( 'fab fa-tencent-weibo' => 'Tencent Weibo' ),
			array( 'fab fa-qq' => 'QQ' ),
			array( 'fab fa-weixin' => 'Weixin (WeChat)' ),
			array( 'fab fa-slideshare' => 'Slideshare' ),
			array( 'fab fa-yelp' => 'Yelp' ),
			array( 'fab fa-lastfm' => 'last.fm' ),
			array( 'fab fa-lastfm-square' => 'last.fm Square' ),
			array( 'fab fa-ioxhost' => 'ioxhost' ),
			array( 'fab fa-angellist' => 'AngelList' ),
			array( 'fab fa-font-awesome' => 'Font Awesome (meanpath)' ),
			array( 'fab fa-buysellads' => 'BuySellAds' ),
			array( 'fab fa-connectdevelop' => 'Connect Develop' ),
			array( 'fab fa-dashcube' => 'DashCube' ),
			array( 'fab fa-forumbee' => 'Forumbee' ),
			array( 'fab fa-leanpub' => 'Leanpub' ),
			array( 'fab fa-sellsy' => 'Sellsy' ),
			array( 'fab fa-shirtsinbulk' => 'Shirts in Bulk' ),
			array( 'fab fa-simplybuilt' => 'SimplyBuilt' ),
			array( 'fab fa-skyatlas' => 'skyatlas' ),
			array( 'fab fa-facebook' => 'Facebook (facebook-official,social network)' ),
			array( 'fab fa-pinterest-p' => 'Pinterest P' ),
			array( 'fab fa-whatsapp' => 'What\'s App' ),
			array( 'fab fa-viacoin' => 'Viacoin' ),
			array( 'fab fa-medium' => 'Medium' ),
			array( 'fab fa-y-combinator' => 'Y Combinator' ),
			array( 'fab fa-optin-monster' => 'Optin Monster' ),
			array( 'fab fa-opencart' => 'OpenCart' ),
			array( 'fab fa-expeditedssl' => 'ExpeditedSSL' ),
			array( 'fab fa-tripadvisor' => 'TripAdvisor' ),
			array( 'fab fa-odnoklassniki' => 'Odnoklassniki' ),
			array( 'fab fa-odnoklassniki-square' => 'Odnoklassniki Square' ),
			array( 'fab fa-get-pocket' => 'Get Pocket' ),
			array( 'fab fa-wikipedia-w' => 'Wikipedia W' ),
			array( 'fab fa-safari' => 'Safari (browser)' ),
			array( 'fab fa-chrome' => 'Chrome (browser)' ),
			array( 'fab fa-firefox' => 'Firefox (browser)' ),
			array( 'fab fa-opera' => 'Opera' ),
			array( 'fab fa-internet-explorer' => 'Internet-explorer (browser,ie)' ),
			array( 'fab fa-contao' => 'Contao' ),
			array( 'fab fa-500px' => '500px' ),
			array( 'fab fa-amazon' => 'Amazon' ),
			array( 'fab fa-houzz' => 'Houzz' ),
			array( 'fab fa-vimeo-v' => 'Vimeo (vimeo)' ),
			array( 'fab fa-black-tie' => 'Font Awesome Black Tie' ),
			array( 'fab fa-fonticons' => 'Fonticons' ),
			array( 'fab fa-reddit-alien' => 'reddit Alien' ),
			array( 'fab fa-edge' => 'Edge Browser (browser,ie)' ),
			array( 'fab fa-codiepie' => 'Codie Pie' ),
			array( 'fab fa-modx' => 'MODX' ),
			array( 'fab fa-fort-awesome' => 'Fort Awesome (castle)' ),
			array( 'fab fa-usb' => 'USB' ),
			array( 'fab fa-product-hunt' => 'Product Hunt' ),
			array( 'fab fa-mixcloud' => 'Mixcloud' ),
			array( 'fab fa-scribd' => 'Scribd' ),
			array( 'fab fa-gitlab' => 'GitLab (Axosoft)' ),
			array( 'fab fa-wpbeginner' => 'WPBeginner' ),
			array( 'fab fa-wpforms' => 'WPForms' ),
			array( 'fab fa-envira' => 'Envira Gallery (leaf)' ),
			array( 'fab fa-glide' => 'Glide' ),
			array( 'fab fa-glide-g' => 'Glide G' ),
			array( 'fab fa-viadeo' => 'Video' ),
			array( 'fab fa-viadeo-square' => 'Video Square' ),
			array( 'fab fa-snapchat' => 'Snapchat' ),
			array( 'fab fa-snapchat-ghost' => 'Snapchat Ghost' ),
			array( 'fab fa-snapchat-square' => 'Snapchat Square' ),
			array( 'fab fa-pied-piper' => 'Pied Piper Logo' ),
			array( 'fab fa-first-order' => 'First Order' ),
			array( 'fab fa-yoast' => 'Yoast' ),
			array( 'fab fa-themeisle' => 'ThemeIsle' ),
			array( 'fab fa-google-plus' => 'Google Plus (google-plus-circle,google-plus-official)' ),
			array( 'fab fa-linode' => 'Linode' ),
			array( 'fab fa-quora' => 'Quora' ),
			array( 'fab fa-free-code-camp' => 'Free Code Camp' ),
			array( 'fab fa-telegram' => 'Telegram' ),
			array( 'fab fa-bandcamp' => 'Bandcamp' ),
			array( 'fab fa-grav' => 'Grav' ),
			array( 'fab fa-etsy' => 'Etsy' ),
			array( 'fab fa-imdb' => 'IMDB' ),
			array( 'fab fa-ravelry' => 'Ravelry' ),
			array( 'fab fa-sellcast' => 'Sellcast (eercast)' ),
			array( 'fab fa-superpowers' => 'Superpowers' ),
			array( 'fab fa-wpexplorer' => 'WPExplorer' ),
			array( 'fab fa-meetup' => 'Meetup' ),
		);
		
		$social_icons = apply_filters( 'calenscore_get_social_icons', $social_icons );

		return $social_icons;
	}
}

add_filter( 'vc_iconpicker-type-flaticon', 'calens_vc_iconpicker_type_flaticon' );

/**
 * Flaticon icons from Flaticon
 *
 * @param $icons - taken from filter - vc_map param field settings['source']
 *     provided icons (default empty array). If array categorized it will
 *     auto-enable category dropdown
 *
 * @since 1.0.0
 * @return array - of icons for iconpicker, can be categorized, or not.
 */
function calens_vc_iconpicker_type_flaticon( $icons ) {
	$new_icons = array(
		array( 'flaticon-headset' => 'flaticon headset' ),
		array( 'flaticon-facebook' => 'flaticon facebook' ),
		array( 'flaticon-twitter' => 'flaticon twitter' ),
		array( 'flaticon-linkedin' => 'flaticon linkedin' ),
		array( 'flaticon-google-plus' => 'flaticon google plus' ),
		array( 'flaticon-google-plus-1' => 'flaticon google plus 1' ),
		array( 'flaticon-instagram' => 'flaticon instagram' ),
		array( 'flaticon-pinterest' => 'flaticon pinterest' ),
		array( 'flaticon-whatsapp' => 'flaticon whatsapp' ),
		array( 'flaticon-youtube' => 'flaticon youtube' ),
		array( 'flaticon-tumblr' => 'flaticon tumblr' ),
		array( 'flaticon-vimeo' => 'flaticon vimeo' ),
		array( 'flaticon-reddit' => 'flaticon reddit' ),
		array( 'flaticon-behance' => 'flaticon behance' ),
		array( 'flaticon-pin' => 'flaticon pin' ),
		array( 'flaticon-email' => 'flaticon email' ),
		array( 'flaticon-search' => 'flaticon search' ),
		array( 'flaticon-play' => 'flaticon play' ),
		array( 'flaticon-call' => 'flaticon call' ),
		array( 'flaticon-phone-call' => 'flaticon phone call' ),
		array( 'flaticon-email-1' => 'flaticon email 1' ),
		array( 'flaticon-placeholder' => 'flaticon placeholder' ),
		array( 'flaticon-calendar' => 'flaticon calendar' ),
		array( 'flaticon-chat-comment-oval-speech-bubble-with-text-lines' => 'flaticon chat comment oval speech bubble with text lines' ),
		array( 'flaticon-user' => 'flaticon user' ),
		array( 'flaticon-folder' => 'flaticon folder' ),
		array( 'flaticon-tag' => 'flaticon tag' ),
		array( 'flaticon-paper-plane' => 'flaticon paper plane' ),
		array( 'flaticon-up-chevron' => 'flaticon up chevron' ),
		array( 'flaticon-share' => 'flaticon share' ),
		array( 'flaticon-check-mark' => 'flaticon check-mark' ),
		array( 'flaticon-customer-service' => 'flaticon customer service' ),
		array( 'flaticon-headset-1' => 'flaticon headset 1' ),
		array( 'flaticon-call-center' => 'flaticon call center' ),
		array( 'flaticon-call-center-agent' => 'flaticon call center agent' ),
		array( 'flaticon-24-hours' => 'flaticon 24 hours' ),
		array( 'flaticon-call-center-1' => 'flaticon call center 1' ),
		array( 'flaticon-call-center-2' => 'flaticon call center 2' ),
		array( 'flaticon-call-center-3' => 'flaticon call center 3' ),
		array( 'flaticon-call-center-service' => 'flaticon call center service' ),
		array( 'flaticon-call-center-4' => 'call center 4' ),
		array( 'flaticon-call-center-5' => 'flaticon call center 5' ),
		array( 'flaticon-data-analysis' => 'flaticon data analysis' ),
		array( 'flaticon-mail' => 'flaticon mail' ),
		array( 'flaticon-shopping-cart' => 'flaticon shopping cart' ),
		array( 'flaticon-insurance' => 'flaticon insurance' ),
		array( 'flaticon-car' => 'flaticon car' ),
		array( 'flaticon-pdf-file' => 'flaticon pdf file' ),
		array( 'flaticon-file' => 'flaticon file' ),
		array( 'flaticon-right-arrow' => 'flaticon right arrow' ),
		array( 'flaticon-left-arrow' => 'flaticon left arrow' ),
		array( 'flaticon-call-center-6' => 'flaticon call center 6' ),
	);

	return array_merge( $icons, $new_icons );
}

if ( ! function_exists( 'calenscore_remove_redux_demo_link' ) ) {
	/**
	 * Removes the demo link for redux plugin
	 */
	function calenscore_remove_redux_demo_link() {
		if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
			remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::instance(), 'plugin_metalinks' ), null, 2 );
			remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
		}
	}
}
add_action( 'redux/loaded', 'calenscore_remove_redux_demo_link' );

function calenscore_ocdi_import_files() {
	return array(
		array(
			'import_file_name'         => 'Demo 1',
			'categories'               => array( 'Demo 1' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-1.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-01.jpg',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens',
		),
		array(
			'import_file_name'         => 'Demo 2',
			'categories'               => array( 'Demo 2' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-2.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-02.jpg',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens/homepage-02',
		),
		array(
			'import_file_name'         => 'Demo 3',
			'categories'               => array( 'Demo 3' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-3.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-03.jpg',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens/homepage-03',
		),
		array(
			'import_file_name'         => 'Demo 4',
			'categories'               => array( 'Demo 4' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-4.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-04.png',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens/homepage-04',
		),
		array(
			'import_file_name'         => 'Demo 5',
			'categories'               => array( 'Demo 5' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-5.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-05.png',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens/homepage-05',
		),
		array(
			'import_file_name'         => 'Demo 6',
			'categories'               => array( 'Demo 6' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-6.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-06.png',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens/homepage-06',
		),
		array(
			'import_file_name'         => 'Demo 7',
			'categories'               => array( 'Demo 7' ),
			'local_import_file'        => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/content.xml',
			'local_import_widget_file' => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/widget.wie',
			'local_import_redux'       => array(
				array(
					'file_path'   => trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/redux-7.json',
					'option_name' => 'calens_options',
				),
			),
			'import_preview_image_url' => trailingslashit( CALENSCORE_URL ) . 'includes/sample-demos/image/demo-07.jpg',
			'import_notice'            => __( 'Make sure you have installed all the required plugin.', 'calens-core' ),
			'preview_url'              => 'https://themecrafter.com/calens/homepage-07',
		),
	);
}
add_filter( 'pt-ocdi/import_files', 'calenscore_ocdi_import_files' );

function calenscore_ocdi_after_import_setup( $selected_import ) {
	global $wpdb;

	if ( 'Demo 1' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 01' );		
	} else if ( 'Demo 2' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 02' );
	} else if ( 'Demo 3' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 03' );
	} else if ( 'Demo 4' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 04' );
	} else if ( 'Demo 5' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 05' );
	} else if ( 'Demo 6' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 06' );
	} else if ( 'Demo 7' === $selected_import['import_file_name'] ) {
		$front_page_id = calens_get_page_by_title( 'Homepage 07-shop' );
	}

	$blog_page_id  = calens_get_page_by_title( 'Blog Classic' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

	$main_menu = get_term_by( 'name', 'Top Menu', 'nav_menu' );
	set_theme_mod(
		'nav_menu_locations',
		array(
			'primary-menu' => $main_menu->term_id,
		)
	);

	if ( $main_menu->term_id ) {
		$primary_data = wp_get_nav_menu_items( $main_menu->term_id );

		$shop_menu_id             = '';
		$products_list_menu_id    = '';
		$cart_menu_id             = '';
		$account_menu_id          = '';
		$shop_menu_order          = '';
		$cart_menu_order          = '';
		$checkout_menu_order      = '';
		$account_menu_order       = '';
		$products_list_menu_order = '';

		if ( $primary_data && is_array( $primary_data ) ) {
			foreach ( $primary_data as $nav ) {
				if ( isset( $nav->title ) ) {
					if ( $nav->title == 'Shop' ) {
						$shop_menu_id    = $nav->ID;
						$shop_menu_order = $nav->menu_order;
					}
					
					if ( $nav->title == 'Products List' ) {
						$products_list_menu_id    = $nav->ID;
						$products_list_menu_order = $nav->menu_order;
					}
					
					if ( $nav->title == 'Cart' ) {
						$cart_menu_id    = $nav->ID;
						$cart_menu_order = $nav->menu_order;
					}
					
					if ( $nav->title == 'Checkout' ) {
						$checkout_menu_id    = $nav->ID;
						$checkout_menu_order = $nav->menu_order;
					}
					
					if ( $nav->title == 'My account' ) {
						$account_menu_id    = $nav->ID;
						$account_menu_order = $nav->menu_order;
					}
					
				}
			}
		}

		$shop_id      = get_option( 'woocommerce_shop_page_id' );
		$cart_id      = get_option( 'woocommerce_cart_page_id' );
		$checkout_id  = get_option( 'woocommerce_checkout_page_id' );
		$myaccount_id = get_option( 'woocommerce_myaccount_page_id' );

		if ( $shop_menu_id && $shop_id && $shop_menu_order ) {
			wp_update_nav_menu_item( $main_menu->term_id, $shop_menu_id, array(
				'menu-item-title'     => 'Shop',
				'menu-item-object-id' => $shop_id,
				'menu-item-object'    => 'page',
				'menu-item-position'  => $shop_menu_order,
				'menu-item-status'    => 'publish',
				'menu-item-type'      => 'post_type',
			));
		}
		
		if ( $cart_menu_id && $cart_id && $cart_menu_order ) {
			wp_update_nav_menu_item( $main_menu->term_id, $cart_menu_id, array(
				'menu-item-title'     => 'Cart',
				'menu-item-parent-id' => $shop_menu_id,
				'menu-item-object-id' => $cart_id,
				'menu-item-object'    => 'page',
				'menu-item-position'  => $cart_menu_order,
				'menu-item-status'    => 'publish',
				'menu-item-type'      => 'post_type',
			));
		}
		
		if ( $checkout_menu_id && $checkout_id && $checkout_menu_order ) {
			wp_update_nav_menu_item( $main_menu->term_id, $checkout_menu_id, array(
				'menu-item-title'     => 'Checkout',
				'menu-item-parent-id' => $shop_menu_id,
				'menu-item-object-id' => $checkout_id,
				'menu-item-object'    => 'page',
				'menu-item-position'  => $checkout_menu_order,
				'menu-item-status'    => 'publish',
				'menu-item-type'      => 'post_type',
			));
		}

		if ( $account_menu_id && $myaccount_id && $account_menu_order ) {
			wp_update_nav_menu_item( $main_menu->term_id, $account_menu_id, array(
				'menu-item-title'     => 'My account',
				'menu-item-parent-id' => $shop_menu_id,
				'menu-item-object-id' => $myaccount_id,
				'menu-item-object'    => 'page',
				'menu-item-position'  => $account_menu_order,
				'menu-item-status'    => 'publish',
				'menu-item-type'      => 'post_type',
			));
		}
	}

	if ( class_exists( 'RevSlider' ) ) {
		$slider_array = array(
			trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/sliders/calens-slider-1.zip',
			trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/sliders/calens-slider-2.zip',
			trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/sliders/calens-slider-3.zip',
			trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/sliders/calens-slider-5.zip',
			trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/sliders/calens-slider-6.zip',
			trailingslashit( CALENSCORE_PATH ) . 'includes/sample-demos/sliders/calens-slider-7.zip',
		);

		$slider = new RevSlider();
		foreach ( $slider_array as $filepath ) {
			$slider->importSliderFromPost( true, true, $filepath );  
		}

		esc_html_e( ' Slider processed', 'calens-core' );
	}
	
	$post_types   = get_option( 'elementor_cpt_support', array( 'page', 'post' ) );
	$post_types[] = 'service';
	$post_types[] = 'project';
	$post_types[] = 'team';

	update_option( 'elementor_cpt_support', $post_types );
	update_option( 'elementor_disable_color_schemes', 'yes' );
	update_option( 'elementor_disable_typography_schemes', 'yes' );
	update_option( 'elementor_experiment-e_dom_optimization', 'inactive' );

	$default_kit = $wpdb->get_var( "SELECT ID FROM $wpdb->posts WHERE post_title = 'Default Kit' AND post_type ='elementor_library'" );
	if ( $default_kit ) {
		update_option( 'elementor_active_kit', $default_kit );
	}

	calens_create_color_customizer();
}
add_action( 'pt-ocdi/after_import', 'calenscore_ocdi_after_import_setup' );

/**
 * shortcode [calens-social-links]
 */
if ( ! function_exists( 'calens_sc_social_links' ) ) {
	function calens_sc_social_links() {
		global $calens_options;

		$social_infos = array(
			'facebook',
			'twitter',
			'dribbble',
			'vimeo',
			'pinterest',
			'linkedin',
			'youtube',
			'instagram',
		);

		if ( ! $social_infos ) {
			return;
		}

		ob_start();
		?>
		<div class="social-info-wrapper">
			<ul class="social-info">
			<?php
			foreach ( $social_infos as $social_info ) {
				if ( isset( $calens_options[ $social_info . '_link' ] ) && $calens_options[ $social_info . '_link' ] ) {
					?>
					<li class="social-facebook">
						<a class="social-icon" href="<?php echo esc_url( $calens_options[ $social_info . '_link' ] ); ?>" rel="nofollow"><i class="fab fa-<?php echo esc_attr( $social_info ); ?>"></i></a>
					</li>
					<?php
				}
			}
			?>
			</ul>
		</div>
		<?php
		$social_content = ob_get_contents();
		ob_end_clean();

		return $social_content;
	}
}
add_shortcode( 'calens-social-links', 'calens_sc_social_links' );

/**
 * Replace the get_page_by_title with this function.
 */
if ( ! function_exists( 'calens_get_page_by_title' ) ) {
	function calens_get_page_by_title( $title ){
		$posts = get_posts(
			array(
				'post_type'              => 'page',
				'title'                  => $title,
				'post_status'            => 'all',
				'numberposts'            => 1,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,           
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);

		if ( ! empty( $posts ) ) {
			$page_got_by_title = $posts[0];
		} else {
			$page_got_by_title = null;
		}

		return $page_got_by_title;
	}
}