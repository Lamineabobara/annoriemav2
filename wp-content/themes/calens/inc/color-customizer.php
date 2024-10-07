<?php
/**
 * Color customizer css
 *
 * @package Calens
 * @since 1.2.0
 */

add_action( 'wp_ajax_calens_options_ajax_save', 'calens_options_ajax_save_color_customizer' );
if ( ! function_exists( 'calens_options_ajax_save_color_customizer' ) ) {
	/**
	 * Generating color customizer css based on theme colors.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	function calens_options_ajax_save_color_customizer() {
		global $calens_globals;

		$data = isset( $_POST['data'] ) ? Redux_Functions_Ex::parse_str( wp_unslash( $_POST['data'] ) ) : array(); // phpcs:ignore WordPress.Security.ValidatedSanitizedInput.InputNotSanitized

		if ( $data ) {
			$customizer_classes = calens_color_customize_classes( $data );
			calens_color_customize_css( $customizer_classes );
		}
	}
}

if ( ! function_exists( 'calens_create_color_customizer' ) ) {
	/**
	 * Generating color customizer css based on theme colors.
	 *
	 * @since  1.0.0
	 *
	 * @return void
	 */
	function calens_create_color_customizer() {
		if ( get_option( 'calens_options' ) ) {
			$data['calens_options'] = get_option( 'calens_options' );
			if ( $data ) {
				$customizer_classes = calens_color_customize_classes( $data );
				calens_color_customize_css( $customizer_classes );
			}	
		}
	}
}

if ( ! function_exists( 'calens_color_customize_css' ) ) {
	/**
	 * Color customizer css.
	 *
	 * @param  string $customizer_classes color customizer css.
	 * @return void
	 */
	function calens_color_customize_css( $customizer_classes ) {
		global $wp_filesystem;
		
		// echo "here";
		
		if ( $customizer_classes ) {
			$upload_dir     = wp_upload_dir();
			$customizer_dir = $upload_dir['basedir'] . '/calens-color-customizer';

			if ( empty( $wp_filesystem ) ) {
				require_once( ABSPATH . '/wp-admin/includes/file.php' ); // phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
				WP_Filesystem();
			}

			if ( ! is_dir( $customizer_dir ) ) {
				wp_mkdir_p( $customizer_dir );
			}

			$wp_filesystem->put_contents(
				$customizer_dir . '/color-customize.css',
				$customizer_classes,
				FS_CHMOD_FILE
			);
		}
	}
}

if ( ! function_exists( 'calens_color_customize_classes' ) ) {
	/**
	 * Get color customizer classe
	 *
	 * @param  array $data contains the css values.
	 * @return string
	 */
	function calens_color_customize_classes( $data ) {

		$primary_color           = isset( $data['calens_options']['primary_color'] ) ? $data['calens_options']['primary_color'] : '';
		$secondary_color         = isset( $data['calens_options']['secondary_color'] ) ? $data['calens_options']['secondary_color'] : '';
		$tertiary_color          = isset( $data['calens_options']['tertiary_color'] ) ? $data['calens_options']['tertiary_color'] : '';
		$tertiary_color          = isset( $data['calens_options']['tertiary_color'] ) ? $data['calens_options']['tertiary_color'] : '';
		$page_title_height       = isset( $data['calens_options']['page_title_height'] ) ? $data['calens_options']['page_title_height'] : '';
		$site_logo_height        = isset( $data['calens_options']['site-logo-height']['height'] ) ? $data['calens_options']['site-logo-height']['height'] : '';
		$sticky_site_logo_height = isset( $data['calens_options']['sticky-site-logo-height']['height'] ) ? $data['calens_options']['sticky-site-logo-height']['height'] : '';
		$ch_title_typography     = isset( $data['calens_options']['custom_heading_title_typography'] ) ? $data['calens_options']['custom_heading_title_typography'] : '';
		$ch_subtitle_typography  = isset( $data['calens_options']['custom_heading_subtitle_typography'] ) ? $data['calens_options']['custom_heading_subtitle_typography'] : '';
		$body_typography         = isset( $data['calens_options']['body_typography'] ) ? $data['calens_options']['body_typography'] : '';
		$h1_typography           = isset( $data['calens_options']['h1_typography'] ) ? $data['calens_options']['h1_typography'] : '';
		$h2_typography           = isset( $data['calens_options']['h2_typography'] ) ? $data['calens_options']['h2_typography'] : '';
		$h3_typography           = isset( $data['calens_options']['h3_typography'] ) ? $data['calens_options']['h3_typography'] : '';
		$h4_typography           = isset( $data['calens_options']['h4_typography'] ) ? $data['calens_options']['h4_typography'] : '';
		$h5_typography           = isset( $data['calens_options']['h5_typography'] ) ? $data['calens_options']['h5_typography'] : '';
		$h6_typography           = isset( $data['calens_options']['h6_typography'] ) ? $data['calens_options']['h6_typography'] : '';
		$topbar_text_color       = isset( $data['calens_options']['topbar_color'] ) ? $data['calens_options']['topbar_color'] : '';
		$topbar_bg_color         = isset( $data['calens_options']['topbar_bg_color'] ) ? $data['calens_options']['topbar_bg_color'] : '';
		$cutomizer_css           = '';

		if ( ! empty( $primary_color ) ) {
			$cutomizer_css .= '
			/*-------------------------*/
			/* You Comments */
			/*-------------------------*/
			.tcr-blog-classic .entry-meta-footer .entry-meta-container i,
			.infobox-style-9 .tcr-infobox-icon .icon-number,
			.infobox-style-11 .tcr-infobox-wrapper .tcr-infobox-icon,
			.testimonials-style-2 .tcr-testimonial-rating span,
			.testimonials-style-1 .tcr-testimonial-rating span,
			.counter-style-2 a,
			.counter-style-1 .tcr-counter-wrapper a,
			.header-layout-2 .social-info-wrapper ul li a i:hover,
			.testimonials-style-1 .testimonial-designation,
			.infobox-style-10 .tct-infobox-link a:after,
			.counter-style-1 .tcr-counter-icon i,
            .infobox-style-10 .tcr-infobox-icon i,
			.tcr-blog-classic footer .entry-meta-container>span a:hover,
			.services-style-2 .tcr-service-title-inner .tcr-service-content a:hover,
			.tcr-infobox-color .infobox-style-10 .tcr-infobox-icon i,
			.header-layout-1 .header-topbar-left .tcr-header-link li a:hover,
			.footer-topbar .tcr-footer-box .tcr-footer-icon,
			.calens-list-wrapper ul li i,
			.pricing-table-title-period,
			.header-layout-1 .header-info .contact-item i,
			.header-layout-1 .contact-info i,
			.services-style-3 .tcr-service-icon i,
			.infobox-style-8 .tcr-infobox-wrapper a:hover,
			ul.tcr-footer-menu li a:before,
			a:hover
            .counter-style-2 a, 
			.infobox-style-9 .tcr-infobox-icon i,
			.tcr-pricing-table-feature-list .feature-list-item i,
			.infobox-style-1 .tcr-infobox-icon i,
			.infobox-style-2 .tcr-infobox-icon i,
			.services-style-1 .tcr-service-date,
			.services-style-2 .tcr-service-date i,
			.services-style-2 .service-title:hover,
			.team-style-1 .tcr-teammember-social-profiles li a,
			.team-style-1 .tcr-teammember-wrapper .teammember-title:hover a,
			.team-style-2 .tcr-teammember-social-profiles li a,
			.team-style-2 .tcr-teammember-wrapper .teammember-title:hover a,
			.team-style-2 .tcr-teammember-social-profiles-container,
			.blog-style-2 .tcr-post-meta .tcr-post-meta-inner .post-date i, 
			.blog-style-2 .tcr-post-meta .tcr-post-meta-inner .post-comment i,
			.blog-style-2 .tcr-post-wrapper .read-more-link i,
			.blog-style-2 .tcr-post-wrapper .read-more-link a,
			.custom-heading-style-1 .heading-subtitle,
			.tcr-list-tab .tcr-tab-icon,
			.header-layout-1 .header-info-content a,
			.header-layout-1 .header-stickable.tcr-sticky-header div>ul>li>a:hover,
			.header-layout-3 .header-right-side .search-wrapper a,
			.header-layout-3 .header-stickable.tcr-sticky-header div>ul>li>a:hover,
			.counter-style-5 .tcr-counter-icon i,
			.infobox-style-4 .tcr-infobox-icon i,
			.infobox-style-7 .tcr-infobox-icon i,
			.projects-style-1 .tcr-project-content-inner .tcr-project-title .project-title a:hover,
			.widget_recent_services ul li:hover a, 
			.widget_recent_services ul li a[aria-current="page"],
			.widget_recent_services ul li:hover a:after, 
			.widget_recent_services ul li a[aria-current="page"]:after,
			ul.wp-block-categories li>a::before, 
			.widget.widget_categories ul li > a:before,
			.widget.widget_meta ul li > a:before,
			.widget.widget_recent_entries ul li:before,
			.widget.widget_recent_comments ul li:before,
			.widget.widget_archive ul li a:before,
			ul.wp-block-archives li > a:before,
			.tcr-blog-classic .entry-title a:hover,
            .services-style-1 .tcr-service-title h3 a:hover,
            .team-style-1 .teammember-title a:hover,
            .blog-style-2 .tcr-post-wrapper .tcr-post-title h3 a:hover,
            .services-style-2 .service-title a:hover,
            .blog-style-1 .tcr-post-slide h3 a:hover,
			.team-style-2 .tcr-teammember-title h3 a:hover,
			.widget_tcr_recent_entries li .tcr-post-date,
            widget_tcr_recent_entries ul li:hover a,
			widget_tcr_recent_entries ul li a[aria-current="page"],
			widget_tcr_recent_entries ul li:hover a:after,
			widget_tcr_recent_entries ul li a[aria-current="page"]:after,
            .tcr-copyright .social-icons li a:hover,
			.tcr-action-box a,					
			.comment-list .comment-date a,
			.tcr-blog-classic .social-share-button i,
			.tcr-blog-classic .entry-meta-footer .entry-meta-container i,
			.site-header .main-navigation div > ul >li.current-menu-parent > a,
			.site-header .main-navigation div > ul >li>a:hover,
			.site-header .main-navigation div > ul >li.current-menu-item > a,
			widget_tcr_recent_entries li .tcr-post-date,			
			a:hover,
			.skincolor,
			.services-style-2 .tcr-post-category a,
			.tcr-footer-widgets-wrapper .menu li a:before,
			.tcr-footer-widgets-wrapper .widget_contact i,
			.tcr-page-title .breadcrumb i,
			section.error-404 a.fof-back-buttton:hover,
			.your-class,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,
			.woocommerce .single-product .type-product .entry-summary .product_meta span.posted_in a:hover,
			.woocommerce-info::before,
			.woocommerce-message::before,
			.woocommerce-error::before,
			.woocommerce-account .woocommerce-MyAccount-navigation li a:hover,
			.woocommerce-account .woocommerce-MyAccount-navigation li.is-active a,
			.elementor-widget-wp-widget-archives li a::before,
			.woocommerce ul.products li.product .woocommerce-loop-product__title:hover,
			.woocommerce .woocommerce-cart-form table tbody td.product-name a:hover,
			.elementor-widget-wp-widget-pages .elementor-widget-container ul li a:hover,
			.elementor-widget-wp-widget-recent-comments li a:hover,
			.elementor-widget-wp-widget-tag_cloud .tagcloud a::before,
			.elementor-widget-wp-widget-recent-services ul li span,
			.elementor-widget-wp-widget-calens-recent-posts .elementor-widget-container ul li span,
			.elementor-widget-wp-widget-woocommerce_product_categories ul li a:before,
			.elementor-widget-wp-widget-woocommerce_product_categories ul li a:hover,
			.elementor-widget-wp-widget-recent-posts ul li a:hover,
			.elementor-widget-wp-widget-akismet_widget .a-stats strong:hover,
			.elementor-widget-wp-widget-woocommerce_products ul li a:hover,
			.elementor-widget-wp-widget-woocommerce_top_rated_products ul li a:hover,
			.elementor-widget-wp-widget-woocommerce_widget_cart ul a:hover,
			.elementor-widget-wp-widget-categories ul li a:hover,
			.elementor-widget-wp-widget-tag_cloud .tagcloud a:hover,
			.woocommerce.widget_shopping_cart .cart_list li a:hover,
			.wc-block-components-price-slider__range-input-progress,
			.is-large .wc-block-components-sidebar .wc-block-components-totals-coupon a{color: ' . $primary_color . '; }
            
            .tcr_progress_bar_wrapper .tcr-progress-bar-inner,
            .widget_archive ul li span,
            .widget_categories ul li span,
            .tcr-contact-info .wpcf7-submit,
            .related-posts.blog-style-1 .tcr-post-date,
            .tcr-blog-classic footer ul.social-share-icons a.icon-link,
            .tcr-blog-classic .posted-on,
			.progress-bar-style-3 .tcr-progress-bar-wrapper:before,
            .infobox-style-6 .tcr-infobox-wrapper .tcr-infobox-icon,
            .infobox-style-5 .tcr-infobox-icon .icon-number,
            .infobox-style-5 .tcr-infobox-icon i,
            .counter-style-1 .tcr-counter-number:before,
            .owl-nav button.owl-prev:hover,
            .owl-nav button.owl-next:hover,
            .infobox-style-7 .tcr-infobox-icon .icon-number,
            .infobox-style-1 .tcr-infobox-icon .icon-number,
            .infobox-style-4 .tcr-infobox-icon .icon-number,
            .infobox-style-3 .tcr-infobox-icon .icon-number,
            .infobox-style-2 .tcr-infobox-icon .icon-number,
            .infobox-style-10 .tcr-infobox-icon .icon-number,
            .blockquote-01 blockquote p:after, 
			.counter-style-border:before, 
			.infobox-style-10 .tcr-infobox-wrapper:before,
            .infobox-style-10 .tcr-infobox-wrapper:after,
			.infobox-style-9 .tcr-infobox-wrapper a,
			.infobox-style-9:hover .tcr-service-content-inner:before,
			.services-style-3 .tcr-service-link a,
		     .progress-bar-style-1 .tcr-progress-bar-value,
            .services-style-2 .tcr-service-slide:hover .tcr-service-thumbnail-wrapper .tcr-service-date i, 
            .counter-style-2,
			.counter-style-3 .tcr-counter-wrapper,
			.projects-style-1 .tcr-project-content-inner .tcr-project-action-icons a,
			.team-style-1 .tcr-teammember-social-profiles li a:hover,
			.team-style-1 .tcr-teammember-content-cover .tcr-teammember-share,
			.team-style-2 .tcr-teammember-social-profiles li a:hover,			
			.infobox-style-4:hover .tcr-infobox-inner:after,
			.blog-style-1 .tcr-post-date:after,
			.blog-style-2 .tcr-post-meta .tcr-post-meta-inner .post-date:after,
			.projects-style-2 .tcr-project-content-cover .tcr-project-content-inner .tcr-project-action-icons,
			.calens_progress_bar_wrapper .tcr-progress-bar-inner,
			.pricing-table-onsale .pricing-table-price-wrapper:after,
			.appointment-form-2 .input-button input[type=submit],
			.social-info-wrapper ul li a i:hover,
			.arrow-full-right .projects-style-2 .owl-carousel .owl-nav button.owl-next:hover,
			.arrow-full-right .projects-style-2 .owl-carousel .owl-nav button.owl-prev:hover,
			.tcr-form.contact-form .wpcf7-form-control.wpcf7-submit,
			.tcr-blog-classic blockquote,
			blockquote,
			.tcr-form.contact-form .wpcf7-form-control.wpcf7-submit:hover,

			.header-layout-1 .header-topbar-right .calens-header-button a,
			.services-style-3 .tcr-service-service-wrapper:hover .tcr-service-content-inner:before,
            .pricing-table-onsale .tcr-pricing-table-button a,
            .single-service .item-download a:hover,   
			.elementor-section.cd-bg-color-primary,
			.cd-right-expand.cd-bg-color-primary .elementor-column-wrap:after,
			.cd-left-expand.cd-bg-color-primary .elementor-column-wrap:after,
			.cd-right-expand.elementor-top-section.cd-bg-color-primary:after,
			.cd-left-expand.elementor-top-section.cd-bg-color-primary:after,
			.cd-bg-color-primary.elementor-column > .elementor-column-wrap,
			.cd-bg-color-primary.elementor-column > .elementor-widget-wrap,
			.tcr-form.appointment-form input[type=submit],
			.cd-color-primary.elementor-button.elementor-size-sm,
			.cd-color-secondary:hover.elementor-button.elementor-size-sm,
			.cd-color-tertiary:hover.elementor-button.elementor-size-sm,
			.tcr-pricing-table-button a:hover,
			.time-line-lable .elementor-widget-container,
			.site-footer .social-info-wrapper ul li a:hover i,
			.tcr-project-detail-title:before,
			.tcr-sticky-header,
			.header-layout-1 .header-nav-left-side,
			.header-layout-1 .header-nav-left-side:before,
			.widget_recent_services h2.widget-title,
			.widget_recent_services ul li:hover a:after,
			.widget_recent_services ul li:hover a[aria-current="page"]:after,
			.widget_recent_services ul li a[aria-current="page"]:after,
			.comment-navigation .nav-next a:after,
			.posts-navigation .nav-next a:after,
			.post-navigation .nav-next a:after,
			.comment-navigation .nav-previous a:before, 
			.posts-navigation .nav-previous a:before, 
			.post-navigation .nav-previous a:before,
			.blockquote-01 blockquote p:after,
            
            #scroll-to-top a,
			.site-footer a.footer-button-link,
			.site-footer .calens-footer-newslatter button[type=submit],
            .testimonials-style-1 .tcr-testimonial-image-container:before,
            .arrow-middle-left-right .owl-nav button.owl-prev:hover, 
            .arrow-middle-left-right .owl-nav button.owl-next:hover,
            .widget_tag_cloud a:hover,
			.widget_archive ul li:hover span,
			.widget_categories ul li:hover span,
			widget_tcr_recent_entries h2.widget-title,
			body .elementor-element .elementor-widget-accordion .elementor-accordion .elementor-tab-title.elementor-active,
            .tcr-teammember-link-profiles li a:hover,
			input[type=submit]:hover,
			.comment-list a.comment-reply-link, 		
			.wpb-js-composer .tcr-accordion-style-1 .vc_tta.vc_general .vc_tta-panel.vc_active .vc_tta-panel-title>a:before,
			.owl-dots .owl-dot.active,
			.tcr-year,
			.tcr-about-introbox:before,
			.tcr-blog-classic footer ul.social-share-icons a.icon-link,
			.tcr-blog-classic .posted-on:after,
			.site-header .main-navigation div > ul ul a:hover:before,
			.col-extend-right.extend-with-primary-bg:after,
			.vc_row.tcr-bg-color-primary,
			.wpb_column.tcr-bg-color-primary > .vc_column-inner,
			.site-header .tcr-header-button a,
			.post.sticky .tcr-blog-classic-inner:after,
			.wp-block-tag-cloud a:hover,
			.wp-block-calendar table th,
			.wp-block-search button,
			body.search input.search-submit,
			.nav-links .page-numbers:hover,
			.nav-links .page-numbers.current,
			.comment-respond .comment-form input[type=submit],
			section.error-404 .search-form .search-submit:hover,
			.site-header .main-navigation div > ul ul li:hover.current_page_item > a,
			.site-header .main-navigation div > ul ul li.current_page_item > a,
			.site-header .main-navigation div > ul ul li a:hover,
			.services-style-2 .tcr-service-slide .tcr-service-thumbnail-wrapper .tcr-service-date i,
			section.error-404 a.fof-back-buttton,
			.infobox-style-7 .tcr-infobox-content:after,
			.wp-block-button__link:hover,
			.woocommerce ul.products li.product .button,
			.woocommerce .type-product .added_to_cart:hover,
			.woocommerce .single-product .type-product .entry-summary .cart button.button,
			.woocommerce .cart .button,
			.woocommerce-cart .wc-proceed-to-checkout a.checkout-button,
			.woocommerce form.checkout_coupon button.button,
			.woocommerce button.button.alt,
			.woocommerce .woocommerce-message .button,
			 .woocommerce .woocommerce-error .button,
			 .woocommerce #respond input#submit,
			 .woocommerce nav.woocommerce-pagination ul li span.current,
			 .woocommerce nav.woocommerce-pagination ul li a:hover,
			 .woocommerce .return-to-shop a,
			 .woocommerce .cart .coupon .button:hover,
			 .woocommerce-page .woocommerce-info .button,
			 .woocommerce-account .addresses .title .edit,
			 .woocommerce-account .woocommerce-MyAccount-content p button,
			 .woocommerce .woocommerce-form-login .woocommerce-form-login__submit,
			 .woocommerce form.lost_reset_password button.button,
			 .elementor-widget-wp-widget-meta .elementor-widget-container ul li a:hover,
			 .elementor-widget-wp-widget-tag_cloud .tagcloud a span,
			 .elementor-widget-wp-widget-woocommerce_product_search button:hover, 
			 .elementor-widget-wp-widget-woocommerce_widget_cart .buttons a.checkout:hover,
			 .elementor-widget-wp-widget-woocommerce_widget_cart .buttons a,
			 .cart-items .woocommerce.widget_shopping_cart .buttons a,
			 .cart-items .woocommerce.widget_shopping_cart .buttons a.checkout:hover,
			 .header-layout-2 .tcr-mini-cart-wrapper .tcr-cart-count,
			 .header-layout-1 .tcr-mini-cart-wrapper .tcr-cart-count,
			 .woocommerce-cart .woocommerce-shipping-calculator button,
			 .woocommerce-MyAccount-content a.button,
			 .woocommerce.widget_product_search .woocommerce-product-search button,
			 .woocommerce.widget_price_filter .price_slider_amount .button,
			 .woocommerce.widget_shopping_cart .buttons a,
			 .woocommerce.widget_shopping_cart .buttons a.checkout:hover,
			 .wc-block-active-filters .wc-block-active-filters__clear-all,
			 .wc-blocks-filter-wrapper .wc-block-components-filter-reset-button,
			 .widget_block .wp-block-woocommerce-mini-cart .wc-block-mini-cart__button,
			 .wp-block-woocommerce-mini-cart-contents .wc-block-mini-cart__footer-actions .components-button,
			 .wp-block-woocommerce-mini-cart-contents .wc-block-mini-cart__footer-actions .components-button.wc-block-mini-cart__footer-checkout:hover,
			 .widget.widget_block .wp-block-button .wp-block-button__link,
			 .widget_block .wc-block-product-categories .wc-block-product-categories-list-item .wc-block-product-categories-list-item-count,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			 .woocommerce .widget_layered_nav.woocommerce-widget-layered-nav ul li span,
			 .wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link,  
			 .site-header .main-navigation div>ul ul li.current-menu-item,
			 body:not(.woocommerce-block-theme-has-button-styles) .wc-block-components-button:not(.is-link),
			 .wc-block-components-order-summary .wc-block-components-order-summary-item__quantity,
			 .wc-block-components-checkout-return-to-cart-button:hover{background-color: ' . $primary_color . '; }

			.tcr-teammember-thumbnail,
			.woocommerce-info,
			.woocommerce-message, 
			.woocommerce-error {border-top-color:' . $primary_color . ';}

			.mfp-close,
			.header-layout-1 .social-info-wrapper ul li a:hover i{background-color: ' . $primary_color . ' !important; }

			.services-style-2 .tcr-service-title-inner .tcr-service-content a:hover,
			.post.sticky .tcr-blog-classic-inner{border-color:' . $primary_color . ';}
			.progress-bar-style-1 .tcr-progress-bar-value:after{border-color:' . $primary_color . ' ' . $primary_color . ' transparent transparent;}
			.tcr-list-tab.cd-active-tab-link a,
			.tcr-action-box a {border-bottom-color:' . $primary_color . ';}
			.tcr-teammember-thumbnail{border-top-color:' . $primary_color . ';}
			input:focus,select:focus,textarea:focus,
			.woocommerce-account .woocommerce-MyAccount-navigation li.is-active,
			.wc-block-components-price-slider__range-input-wrapper:before,
			.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content,
			.wc-block-components-text-input input[type=text]:focus,
			.wc-block-checkout__add-note .wc-block-components-textarea:focus{border-color:' . $primary_color . ';}


					 
			.infobox-style-1 .tcr-infobox-icon svg,
			.infobox-style-2 .tcr-infobox-icon svg,
			.infobox-style-4 .tcr-infobox-icon svg,
			.infobox-style-5 .tcr-infobox-icon svg,
			.infobox-style-7 .tcr-infobox-wrapper svg,
			.infobox-style-9 .tcr-infobox-icon svg,
			.infobox-style-10 .tcr-infobox-icon svg,
			.infobox-style-11 .tcr-infobox-wrapper .tcr-infobox-icon svg,			
			.calens-list-wrapper ul li .calens-list-icon svg,
			.counter-style-1 .tcr-counter-icon svg,
			.counter-style-5 .tcr-counter-icon svg {fill: ' . $primary_color . ';}
			
			';

			
			

		}

		if ( ! empty( $secondary_color ) ) {
			$cutomizer_css .= '
			.progress-bar-style-2 .tcr-progress-bar-title-wrapper .tcr-progress-bar-title,
			.progress-bar-style-3 .tcr-progress-bar-title,
			.counter-style-4 .tcr-counter-number:before,
			.counter-style-4 .tcr-counter-title, 
			.comment-navigation .nav-next a:hover,
			.posts-navigation .nav-next a:hover,
			.post-navigation .nav-next a:hover,
			.comment-navigation .nav-previous a:hover,
			.posts-navigation .nav-previous a:hover,
			.post-navigation .nav-previous a:hover,
			.site-header .main-navigation div>ul ul a,
			.tcr-list-tab.cd-active-tab-link a,
			.blockquote-01 blockquote,
			.blockquote-01 blockquote cite,
			.header-layout-3 .site-header .main-navigation div > ul >li>a:hover,
			.header-layout-1 .social-info-wrapper ul li a i,
			.header-layout-3 .site-header .main-navigation div > ul >li.current-menu-parent > a,

			.calens-form.appointment-form input[type=submit]:hover,
			.tcr-blog-classic footer .entry-meta-container>span a,
			.widget_recent_services ul li a:after,
			.team-style-1 .teammember-title a,
			.site-footer a.footer-button-link:hover,
			.infobox-style-9:hover .tcr-infobox-wrapper a,
			.cd-color-white.elementor-button.elementor-size-sm,
			.progress-bar-style-2 .tcr-counter-icon,
			.blog-style-1 .tcr-post-category a,			
			.header-layout-1 .header-stickable.tcr-sticky-header div>ul>li>a,
			.header-layout-3 .header-stickable.tcr-sticky-header div>ul>li>a,
			.arrow-full-right .projects-style-2 .owl-carousel .owl-nav button.owl-prev,
			.arrow-full-right .projects-style-2 .owl-carousel .owl-nav button.owl-next,
			.text-black .progress-bar-style-1 .tcr-progress-bar-title,
			a,a:visited,
			.is-large .wc-block-components-sidebar .wc-block-components-totals-coupon a:hover {color: ' . $secondary_color . '; }	

			.header-layout-3 .site-header .tcr-header-button a:hover{color: ' . $secondary_color . ' !important; }	
            
			.progress-bar-style-3.tcr_progress_bar_wrapper .tcr-progress-bar-inner,
            .pricing-table-price-wrapper .pricing-table-sale-price,
            body .owl-dots .owl-dot,
			.owl-nav button.owl-prev,
            .owl-nav button.owl-next,
			.progress-bar-style-3 .tcr-progress-bar-value,
			.calens-form.appointment-form input[type=submit],
			.cd-color-white.elementor-button:hover.elementor-size-sm,
            .arrow-middle-left-right .owl-nav button.owl-prev, 
            .arrow-middle-left-right .owl-nav button.owl-next,
			.infobox-style-8 .tcr-infobox-wrapper,
   			.counter-style-2 a:hover,
			.infobox-style-4 .tcr-infobox-inner:after,
			.tcr-project-details,
            .pricing-table-onsale .tcr-pricing-table-button a:hover,
			.widget.widget_recent_services,
			.services-style-2 .tcr-service-slide:hover .tcr-service-thumbnail-wrapper .tcr-service-date i,
			.infobox-style-3 .tcr-infobox-icon, 
			.header-layout-3 .header-right-side .search-wrapper a:hover,

			.elementor-section.cd-bg-color-secondary,
			.cd-right-expand.cd-bg-color-secondary .elementor-column-wrap:after,
			.cd-left-expand.cd-bg-color-secondary .elementor-column-wrap:after,
			.cd-right-expand.elementor-top-section.cd-bg-color-secondary:after,
			.cd-left-expand.elementor-top-section.cd-bg-color-secondary:after,
			.tcr-list-tab.cd-active-tab-link a,
			.cd-bg-color-secondary.elementor-column > .elementor-column-wrap,
			.cd-bg-color-secondary.elementor-column > .elementor-widget-wrap,
			.cd-color-primary:hover.elementor-button.elementor-size-sm,
			.cd-color-secondary.elementor-button.elementor-size-sm,
			.tcr-pricing-table-button a,
			.appointment-form-2 .input-button input[type=submit]:hover,
			.social-info-wrapper ul li a i,
			.header-layout-1 .contact-info,
			.header-layout-1 .header-topbar-right .calens-header-button a:hover,
			.header-layout-3 .site-header .tcr-header-button a,
			.tcr-form.contact-form .input-group input[type=submit],
            .progress-bar-style-3.tcr_progress_bar_wrapper .tcr-progress-bar-inner,
			.comment-navigation .nav-next a:hover:after,
			.posts-navigation .nav-next a:hover:after,
			.post-navigation .nav-next a:hover:after,
			.comment-navigation .nav-previous a:hover:before,
			.posts-navigation .nav-previous a:hover:before,
			.post-navigation .nav-previous a:hover:before,
			
			#scroll-to-top a:hover,
			widget_tcr_recent_entries,
			.tcr-teammember-wrapper-content,
			widget_tcr_recent_entries ul li:hover a:before,
			widget_tcr_recent_entries ul li a[aria-current="page"]:before,
			.single-service .item-download a span,
			.comment-list a.comment-reply-link:hover,			
			.tcr-contact-info .wpcf7-submit:hover,			
			.site-header .tcr-header-button a:hover,
			.site-header .tcr-bg-color-secondary,
			body.search input.search-submit:hover,
			section.error-404 .search-form .search-submit,
			.comment-respond .comment-form input[type=submit]:hover,
			.woocommerce ul.products li.product .onsale,
			.woocommerce ul.products li.product .button:hover,
			.woocommerce .type-product .added_to_cart,
			.woocommerce .single-product .type-product .entry-summary .cart button.button:hover,
			.woocommerce .cart .button:hover,
			.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover,
			.woocommerce form.checkout_coupon button.button:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce .woocommerce-message .button:hover, 
			.woocommerce .woocommerce-error .button:hover,
			.woocommerce #respond input#submit:hover,
			.woocommerce .type-product span.onsale,
			.woocommerce .return-to-shop a:hover,
			.woocommerce .cart .coupon .button,
			.woocommerce-page .woocommerce-info .button:hover,
			.woocommerce-account .addresses .title .edit:hover,
			.woocommerce-account .woocommerce-MyAccount-content p button:hover,
			.woocommerce .woocommerce-form-login .woocommerce-form-login__submit:hover,
			.woocommerce form.lost_reset_password button.button:hover,
			.elementor-widget-wp-widget-woocommerce_widget_cart .buttons a.checkout,
			.elementor-widget-wp-widget-woocommerce_widget_cart .buttons a:hover,
			.cart-items .woocommerce.widget_shopping_cart .buttons a:hover,
			.cart-items .woocommerce.widget_shopping_cart .buttons a.checkout,
			.woocommerce-cart .woocommerce-shipping-calculator button:hover,
			.woocommerce.widget_product_search .woocommerce-product-search button:hover,
			.woocommerce.widget_price_filter .price_slider_amount .button:hover,
			.woocommerce.widget_shopping_cart .buttons a.checkout,
			.woocommerce.widget_shopping_cart .buttons a:hover,
			.wc-block-grid__product-onsale,
			.wc-block-active-filters .wc-block-active-filters__clear-all:hover,
			.wc-blocks-filter-wrapper .wc-block-components-filter-reset-button:hover,
			.widget_block .wp-block-woocommerce-mini-cart .wc-block-mini-cart__button:hover,
			.wp-block-woocommerce-mini-cart-contents .wc-block-mini-cart__footer-actions .components-button:hover,
			.wp-block-woocommerce-mini-cart-contents .wc-block-mini-cart__footer-actions .components-button.wc-block-mini-cart__footer-checkout,
			.wc-block-grid__product-add-to-cart.wp-block-button .wp-block-button__link:hover,
			.widget.widget_block .wp-block-button .wp-block-button__link:hover,
			.widget_block .wp-block-woocommerce-price-filter .wc-block-price-filter__controls input,
			.wp-block-woocommerce-cart .wc-block-grid .wc-block-grid__product-onsale,
			.wc-block-grid .wc-block-grid__product-onsale,
			 body:not(.woocommerce-block-theme-has-button-styles) .wc-block-components-button:not(.is-link):hover,
			 .wc-block-components-checkout-return-to-cart-button  {background-color: ' . $secondary_color . '; }

			.mfp-bg{background-color: ' . $secondary_color . '; !important } 
			

			';
		}

		if ( ! empty( $tertiary_color ) ) {
			$cutomizer_css .= '
			.header-layout-1 .social-info-wrapper ul li a i,
			.tcr-list-tab.cd-active-tab-link a,
            .tcr_tabs_wrapper.tcr-layout-vertical .tcr-list-tab a,
			.tcr_progress_bar_wrapper .tcr-progress-bar,
			 
			.cd-left-expand.elementor-top-section.cd-bg-color-tertiary:after,			
			.cd-right-expand.elementor-top-section.cd-bg-color-tertiary:after,			
			.cd-right-expand.cd-bg-color-tertiary .elementor-column-wrap:after,
			.cd-left-expand.cd-bg-color-tertiary .elementor-column-wrap:after,
			.elementor-section.cd-bg-color-tertiary,
			.calens_progress_bar_wrapper .tcr-progress-bar,
			.cd-bg-color-tertiary.elementor-column > .elementor-column-wrap,
			.cd-color-tertiary.elementor-button.elementor-size-sm,

			.infobox-style-7 .tcr-infobox-content:before,
			.widget,
			.comment-list .reply:after,
			.post-author-box,
			.tcr-contact-info .infobox-style-3 i:after,
			.woocommerce-account .woocommerce-MyAccount-navigation li.is-active,
			#add_payment_method #payment div.payment_box {background-color: ' . $tertiary_color . '; }';
		}
		
		if ( ! empty( $topbar_text_color ) ) {
			$cutomizer_css .= '
			.tcr-topbar-wrapper {color: ' . $topbar_text_color . '; }';
		}
		if ( ! empty( $topbar_bg_color ) ) {
			$cutomizer_css .= '
			.header-layout-1 .tcr-topbar-wrapper .header-topbar,
			.header-layout-1 .header-topbar:after,
			.header-layout-2 .tcr-topbar-wrapper,
			.header-layout-3 .tcr-topbar-wrapper {background-color: ' . $topbar_bg_color . '; }';
		}
		
		if ( ! empty( $page_title_height ) ) {
			$cutomizer_css .= '
			.tcr-page-title {height: ' . $page_title_height . 'px; }';
		}

		if ( ! empty( $site_logo_height ) ) {
			$cutomizer_css .= '
			.site-header .site-logo img {min-height: ' . $site_logo_height . '; }';
		}
		
		if ( ! empty( $sticky_site_logo_height ) ) {
			$cutomizer_css .= '
			.site-header .sticky-site-logo img {min-height: ' . $sticky_site_logo_height . '; }';
		}

		if ( isset( $ch_title_typography ) && ! empty( $ch_title_typography ) ) {
			$ch_title_typography_css = '';

			if ( isset( $ch_title_typography['font-family'] ) && ! empty( $ch_title_typography['font-family'] ) ) {
				$ch_title_typography_css .= 'font-family: ' . $ch_title_typography['font-family'] . ';';
			}

			if ( isset( $ch_title_typography['font-style'] ) && ! empty( $ch_title_typography['font-style'] ) ) {
				$ch_title_typography_css .= 'font-style: ' . $ch_title_typography['font-style'] . ';';
			}

			if ( isset( $ch_title_typography['font-weight'] ) && ! empty( $ch_title_typography['font-weight'] ) ) {
				$ch_title_typography_css .= 'font-weight: ' . $ch_title_typography['font-weight'] . ';';
			}

			if ( isset( $ch_title_typography['letter-spacing'] ) && ! empty( $ch_title_typography['letter-spacing'] ) ) {
				$ch_title_typography_css .= 'letter-spacing: ' . $ch_title_typography['letter-spacing'] . ';';
			}

			if ( isset( $ch_title_typography['line-height'] ) && ! empty( $ch_title_typography['line-height'] ) ) {
				$ch_title_typography_css .= 'line-height: ' . $ch_title_typography['line-height'] . ';';
			}

			if ( isset( $ch_title_typography['font-size'] ) && ! empty( $ch_title_typography['font-size'] ) ) {
				$ch_title_typography_css .= 'font-size: ' . $ch_title_typography['font-size'] . ';';
			}
			
			if ( $ch_title_typography_css ) {
				$cutomizer_css .= '.tcr_custom_heading_wrapper .tcr-heading-title-wrapper .heading-title { ' . $ch_title_typography_css . ' }';
			}
		}
		
		if ( isset( $ch_subtitle_typography ) && ! empty( $ch_subtitle_typography ) ) {
			$ch_subtitle_typography_css = '';

			if ( isset( $ch_subtitle_typography['font-family'] ) && ! empty( $ch_subtitle_typography['font-family'] ) ) {
				$ch_subtitle_typography_css .= 'font-family: ' . $ch_subtitle_typography['font-family'] . ';';
			}

			if ( isset( $ch_subtitle_typography['font-style'] ) && ! empty( $ch_subtitle_typography['font-style'] ) ) {
				$ch_subtitle_typography_css .= 'font-style: ' . $ch_subtitle_typography['font-style'] . ';';
			}

			if ( isset( $ch_subtitle_typography['font-weight'] ) && ! empty( $ch_subtitle_typography['font-weight'] ) ) {
				$ch_subtitle_typography_css .= 'font-weight: ' . $ch_subtitle_typography['font-weight'] . ';';
			}

			if ( isset( $ch_subtitle_typography['letter-spacing'] ) && ! empty( $ch_subtitle_typography['letter-spacing'] ) ) {
				$ch_subtitle_typography_css .= 'letter-spacing: ' . $ch_subtitle_typography['letter-spacing'] . ';';
			}

			if ( isset( $ch_subtitle_typography['line-height'] ) && ! empty( $ch_subtitle_typography['line-height'] ) ) {
				$ch_subtitle_typography_css .= 'line-height: ' . $ch_subtitle_typography['line-height'] . ';';
			}

			if ( isset( $ch_subtitle_typography['font-size'] ) && ! empty( $ch_subtitle_typography['font-size'] ) ) {
				$ch_subtitle_typography_css .= 'font-size: ' . $ch_subtitle_typography['font-size'] . ';';
			}
			
			if ( $ch_subtitle_typography_css ) {
				$cutomizer_css .= '.tcr_custom_heading_wrapper .tcr-heading-subtitle-wrapper .heading-subtitle { ' . $ch_subtitle_typography_css . ' }';
			}
		}
		
		if ( isset( $body_typography ) && ! empty( $body_typography ) ) {
			$body_typography_css = '';

			if ( isset( $body_typography['font-family'] ) && ! empty( $body_typography['font-family'] ) ) {
				$body_typography_css .= 'font-family: ' . $body_typography['font-family'] . ';';
			}

			if ( isset( $body_typography['font-style'] ) && ! empty( $body_typography['font-style'] ) ) {
				$body_typography_css .= 'font-style: ' . $body_typography['font-style'] . ';';
			}

			if ( isset( $body_typography['font-weight'] ) && ! empty( $body_typography['font-weight'] ) ) {
				$body_typography_css .= 'font-weight: ' . $body_typography['font-weight'] . ';';
			}

			if ( isset( $body_typography['letter-spacing'] ) && ! empty( $body_typography['letter-spacing'] ) ) {
				$body_typography_css .= 'letter-spacing: ' . $body_typography['letter-spacing'] . ';';
			}

			if ( isset( $body_typography['line-height'] ) && ! empty( $body_typography['line-height'] ) ) {
				$body_typography_css .= 'line-height: ' . $body_typography['line-height'] . ';';
			}

			if ( isset( $body_typography['font-size'] ) && ! empty( $body_typography['font-size'] ) ) {
				$body_typography_css .= 'font-size: ' . $body_typography['font-size'] . ';';
			}
			
			if ( $body_typography_css ) {
				$cutomizer_css .= 'body { ' . $body_typography_css . ' }';
			}
		}

		if ( isset( $h1_typography ) && ! empty( $h1_typography ) ) {
			$h1_typography_css = '';

			if ( isset( $h1_typography['font-family'] ) && ! empty( $h1_typography['font-family'] ) ) {
				$h1_typography_css .= 'font-family: ' . $h1_typography['font-family'] . ';';
			}

			if ( isset( $h1_typography['font-style'] ) && ! empty( $h1_typography['font-style'] ) ) {
				$h1_typography_css .= 'font-style: ' . $h1_typography['font-style'] . ';';
			}

			if ( isset( $h1_typography['font-weight'] ) && ! empty( $h1_typography['font-weight'] ) ) {
				$h1_typography_css .= 'font-weight: ' . $h1_typography['font-weight'] . ';';
			}

			if ( isset( $h1_typography['letter-spacing'] ) && ! empty( $h1_typography['letter-spacing'] ) ) {
				$h1_typography_css .= 'letter-spacing: ' . $h1_typography['letter-spacing'] . ';';
			}

			if ( isset( $h1_typography['line-height'] ) && ! empty( $h1_typography['line-height'] ) ) {
				$h1_typography_css .= 'line-height: ' . $h1_typography['line-height'] . ';';
			}

			if ( isset( $h1_typography['font-size'] ) && ! empty( $h1_typography['font-size'] ) ) {
				$h1_typography_css .= 'font-size: ' . $h1_typography['font-size'] . ';';
			}
			
			if ( $h1_typography_css ) {
				$cutomizer_css .= 'h1 { ' . $h1_typography_css . ' }';
			}
		}
		
		if ( isset( $h2_typography ) && ! empty( $h2_typography ) ) {
			$h2_typography_css = '';

			if ( isset( $h2_typography['font-family'] ) && ! empty( $h2_typography['font-family'] ) ) {
				$h2_typography_css .= 'font-family: ' . $h2_typography['font-family'] . ';';
			}

			if ( isset( $h2_typography['font-style'] ) && ! empty( $h2_typography['font-style'] ) ) {
				$h2_typography_css .= 'font-style: ' . $h2_typography['font-style'] . ';';
			}

			if ( isset( $h2_typography['font-weight'] ) && ! empty( $h2_typography['font-weight'] ) ) {
				$h2_typography_css .= 'font-weight: ' . $h2_typography['font-weight'] . ';';
			}

			if ( isset( $h2_typography['letter-spacing'] ) && ! empty( $h2_typography['letter-spacing'] ) ) {
				$h2_typography_css .= 'letter-spacing: ' . $h2_typography['letter-spacing'] . ';';
			}

			if ( isset( $h2_typography['line-height'] ) && ! empty( $h2_typography['line-height'] ) ) {
				$h2_typography_css .= 'line-height: ' . $h2_typography['line-height'] . ';';
			}

			if ( isset( $h2_typography['font-size'] ) && ! empty( $h2_typography['font-size'] ) ) {
				$h2_typography_css .= 'font-size: ' . $h2_typography['font-size'] . ';';
			}
			
			if ( $h2_typography_css ) {
				$cutomizer_css .= 'h2,.elementor-widget-heading h2.elementor-heading-title { ' . $h2_typography_css . ' }';
			}
		}
		
		if ( isset( $h3_typography ) && ! empty( $h3_typography ) ) {
			$h3_typography_css = '';

			if ( isset( $h3_typography['font-family'] ) && ! empty( $h3_typography['font-family'] ) ) {
				$h3_typography_css .= 'font-family: ' . $h3_typography['font-family'] . ';';
			}

			if ( isset( $h3_typography['font-style'] ) && ! empty( $h3_typography['font-style'] ) ) {
				$h3_typography_css .= 'font-style: ' . $h3_typography['font-style'] . ';';
			}

			if ( isset( $h3_typography['font-weight'] ) && ! empty( $h3_typography['font-weight'] ) ) {
				$h3_typography_css .= 'font-weight: ' . $h3_typography['font-weight'] . ';';
			}

			if ( isset( $h3_typography['letter-spacing'] ) && ! empty( $h3_typography['letter-spacing'] ) ) {
				$h3_typography_css .= 'letter-spacing: ' . $h3_typography['letter-spacing'] . ';';
			}

			if ( isset( $h3_typography['line-height'] ) && ! empty( $h3_typography['line-height'] ) ) {
				$h3_typography_css .= 'line-height: ' . $h3_typography['line-height'] . ';';
			}

			if ( isset( $h3_typography['font-size'] ) && ! empty( $h3_typography['font-size'] ) ) {
				$h3_typography_css .= 'font-size: ' . $h3_typography['font-size'] . ';';
			}
			
			if ( $h3_typography_css ) {
				$cutomizer_css .= 'h3 { ' . $h3_typography_css . ' }';
			}
		}
		
		if ( isset( $h4_typography ) && ! empty( $h4_typography ) ) {
			$h4_typography_css = '';

			if ( isset( $h4_typography['font-family'] ) && ! empty( $h4_typography['font-family'] ) ) {
				$h4_typography_css .= 'font-family: ' . $h4_typography['font-family'] . ';';
			}

			if ( isset( $h4_typography['font-style'] ) && ! empty( $h4_typography['font-style'] ) ) {
				$h4_typography_css .= 'font-style: ' . $h4_typography['font-style'] . ';';
			}

			if ( isset( $h4_typography['font-weight'] ) && ! empty( $h4_typography['font-weight'] ) ) {
				$h4_typography_css .= 'font-weight: ' . $h4_typography['font-weight'] . ';';
			}

			if ( isset( $h4_typography['letter-spacing'] ) && ! empty( $h4_typography['letter-spacing'] ) ) {
				$h4_typography_css .= 'letter-spacing: ' . $h4_typography['letter-spacing'] . ';';
			}

			if ( isset( $h4_typography['line-height'] ) && ! empty( $h4_typography['line-height'] ) ) {
				$h4_typography_css .= 'line-height: ' . $h4_typography['line-height'] . ';';
			}

			if ( isset( $h4_typography['font-size'] ) && ! empty( $h4_typography['font-size'] ) ) {
				$h4_typography_css .= 'font-size: ' . $h4_typography['font-size'] . ';';
			}
			
			if ( $h4_typography_css ) {
				$cutomizer_css .= 'h4 { ' . $h4_typography_css . ' }';
			}
		}
		
		if ( isset( $h5_typography ) && ! empty( $h5_typography ) ) {
			$h5_typography_css = '';

			if ( isset( $h5_typography['font-family'] ) && ! empty( $h5_typography['font-family'] ) ) {
				$h5_typography_css .= 'font-family: ' . $h5_typography['font-family'] . ';';
			}

			if ( isset( $h5_typography['font-style'] ) && ! empty( $h5_typography['font-style'] ) ) {
				$h5_typography_css .= 'font-style: ' . $h5_typography['font-style'] . ';';
			}

			if ( isset( $h5_typography['font-weight'] ) && ! empty( $h5_typography['font-weight'] ) ) {
				$h5_typography_css .= 'font-weight: ' . $h5_typography['font-weight'] . ';';
			}

			if ( isset( $h5_typography['letter-spacing'] ) && ! empty( $h5_typography['letter-spacing'] ) ) {
				$h5_typography_css .= 'letter-spacing: ' . $h5_typography['letter-spacing'] . ';';
			}

			if ( isset( $h5_typography['line-height'] ) && ! empty( $h5_typography['line-height'] ) ) {
				$h5_typography_css .= 'line-height: ' . $h5_typography['line-height'] . ';';
			}

			if ( isset( $h5_typography['font-size'] ) && ! empty( $h5_typography['font-size'] ) ) {
				$h5_typography_css .= 'font-size: ' . $h5_typography['font-size'] . ';';
			}
			
			if ( $h5_typography_css ) {
				$cutomizer_css .= 'h5 { ' . $h5_typography_css . ' }';
			}
		}

		if ( isset( $h6_typography ) && ! empty( $h6_typography ) ) {
			$h6_typography_css = '';

			if ( isset( $h6_typography['font-family'] ) && ! empty( $h6_typography['font-family'] ) ) {
				$h6_typography_css .= 'font-family: ' . $h6_typography['font-family'] . ';';
			}

			if ( isset( $h6_typography['font-style'] ) && ! empty( $h6_typography['font-style'] ) ) {
				$h6_typography_css .= 'font-style: ' . $h6_typography['font-style'] . ';';
			}

			if ( isset( $h6_typography['font-weight'] ) && ! empty( $h6_typography['font-weight'] ) ) {
				$h6_typography_css .= 'font-weight: ' . $h6_typography['font-weight'] . ';';
			}

			if ( isset( $h6_typography['letter-spacing'] ) && ! empty( $h6_typography['letter-spacing'] ) ) {
				$h6_typography_css .= 'letter-spacing: ' . $h6_typography['letter-spacing'] . ';';
			}

			if ( isset( $h6_typography['line-height'] ) && ! empty( $h6_typography['line-height'] ) ) {
				$h6_typography_css .= 'line-height: ' . $h6_typography['line-height'] . ';';
			}

			if ( isset( $h6_typography['font-size'] ) && ! empty( $h6_typography['font-size'] ) ) {
				$h6_typography_css .= 'font-size: ' . $h6_typography['font-size'] . ';';
			}
			
			if ( $h6_typography_css ) {
				$cutomizer_css .= 'h6 { ' . $h6_typography_css . ' }';
			}
		}

		return $cutomizer_css;
	}
}

