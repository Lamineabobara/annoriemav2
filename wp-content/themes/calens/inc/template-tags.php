<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Calens
 */

if ( ! function_exists( 'calens_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time with the social icons.
	 */
	function calens_posted_on() {
		?>	
		<span class="posted-on"><a href="<?php echo esc_url( get_day_link( get_the_time( 'Y' ), get_the_time( 'm' ), get_the_time( 'd' ) ) ); ?>" rel="bookmark">
			<time class="entry-date published updated" datetime="<?php echo esc_attr( get_the_date( DATE_W3C ) ); ?>">
			<?php echo esc_html( get_the_date( 'd' ) ); ?>
			<span><?php echo esc_html( get_the_date( 'M' ) ); ?></span></time></a>
		</span>
		<?php
	}
}

if ( ! function_exists( 'calens_entry_footer' ) ) {
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function calens_entry_footer() {
		global $post, $calens_options;
		?>
		<div class="entry-meta-footer">
			<div class="entry-meta-container">
				<span class="author vcard">
					<i class="fas fa-user"></i>
					<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<?php echo esc_html( get_the_author() ); ?>
					</a>
				</span>
				<?php
				if ( 'post' === get_post_type() ) {

					$categories_list = get_the_category_list( esc_html__( ', ', 'calens' ) );
					if ( ! empty( $categories_list ) ) {
						?>
						<span class="categories-list">
							<i class="far fa-folder-open"></i>
							<?php print_r( $categories_list ); ?>	
						</span>
						<?php
					}
					
					$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'calens' ) );
					if ( ! empty( $tags_list ) ) {
						?>
						<span class="tag-list">
							<i class="fas fa-tags"></i>
							<?php print_r( $tags_list ); ?>	
						</span>
						<?php
					}
					if ( comments_open() ) {
						?>
						<span class="meta-comment">
							<i class="far fa-comment"></i>
							<?php
							$comment_template = '<span class="comment-count">%s</span> <span class="comment-count-label">%s</span>';
							comments_popup_link( 
								sprintf( $comment_template, '0', esc_html__( 'comments', 'calens' ) ),
								sprintf( $comment_template, '1', esc_html__( 'comment', 'calens' ) ),
								sprintf( $comment_template, '%', esc_html__( 'comments', 'calens' ) )
							);
							?>
						</span>
						<?php
					}
				}
				?>
			</div>
			<?php
			if ( class_exists( 'redux' ) ) {
				$social_icons = array();
				$social_share = array(
					'facebook'  => array(
						'class'      => 'facebook',
						'icon_class' => 'fab fa-facebook-f',
						'link'       => 'https://www.facebook.com/sharer/sharer.php?u=%%url%%',
					),
					'twitter'   => array(
						'class'      => 'twitter',
						'icon_class' => 'fab fa-twitter',
						'link'       => 'http://twitter.com/intent/tweet?text=%%title%%&%%url%%',
					),
					'linkedin'  => array(
						'class'      => 'linkedin',
						'icon_class' => 'fab fa-linkedin-in',
						'link'       => 'https://www.linkedin.com/shareArticle?mini=true&url=%%url%%&title=%%title%%&summary=%%text%%',
					),
					'pinterest' => array(
						'class'      => 'pinterest',
						'icon_class' => 'fab fa-pinterest-p',
						'link'       => 'http://pinterest.com/pin/create/button/?url=%%url%%',
					),
					'tumblr'    => array(
						'class'      => 'tumblr',
						'icon_class' => 'fab fa-tumblr',
						'link'       => 'https://www.tumblr.com/widgets/share/tool?canonicalUrl=%%url%%&title=%%title%%&caption=%%text%%',
					),
					'skype'     => array(
						'class'      => 'skype',
						'icon_class' => 'fab fa-skype',
						'link'       => 'https://web.skype.com/share?url=%%url%%&text=%%text%%',
					),
				);

				foreach ( $social_share as $key => $value ) {
					$social_share_status = isset( $calens_options[ $key . '_share' ] ) ? $calens_options[ $key . '_share' ] : true;

					$icon_link = $social_share[ $key ]['link'];
					$icon_link = str_replace( '%%url%%', get_permalink(), $icon_link );
					$icon_link = str_replace( '%%title%%', get_the_title(), $icon_link );
					$icon_link = str_replace( '%%text%%', get_the_excerpt(), $icon_link );

					if ( $social_share_status ) {
						$social_icons[ $key ] = array(
							'class'      => $social_share[ $key ]['class'],
							'icon_class' => $social_share[ $key ]['icon_class'],
							'link'       => $icon_link,
						);
					}
				}

				if ( ! empty( $social_icons ) ) {
					?>
					<div class="social-icon-share">
						<a href="javascript:void(0)" class="social-share-button">
							<i class="fas fa-share-alt mr-1"></i>
						</a>
						<ul class="social-share-icons">
							<?php
							foreach ( $social_icons as $icon ) {
								?>
								<li class="social-share-icon">
									<a href="<?php echo esc_url( $icon['link'] ); ?>" class="icon-link" target="popup" onclick="window.open('<?php echo esc_url( $icon['link'] ); ?>','popup','width=600,height=600'); return false;">
										<i class="<?php echo esc_attr( $icon['icon_class'] ); ?>"></i>
									</a>
								</li>
								<?php
							}
							?>
						</ul>
					</div>
					<?php
				}
			}
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'calens_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function calens_post_thumbnail( $size = '' ) {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {
			?>
			<div class="post-thumbnail">
				<?php 
				if ( $size ) {
					the_post_thumbnail( $size );
				} else {
					the_post_thumbnail();
				}
				?>
			</div><!-- .post-thumbnail -->
			<?php
		} else {
			?>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					) 
				);
				?>
			</a>
			<?php
		}
	}
}

if ( ! function_exists( 'calens_post_authorbox' ) ) {
	/**
	 * Displays an post authorbox.
	 */
	function calens_post_authorbox() {
		if ( get_the_author_meta( 'description' ) ) {
			?>
			<div class="post-author-box">
				<div class="post-author-image">
					<?php echo get_avatar( get_the_author_meta( 'ID' ), 150 ); ?>
				</div>
				<div class="post-author-details">
					<?php
					if ( ! is_author() ) {
						?>
						<h3 class="author-title">
							<?php
							/* translators: 1: get the author name*/
							printf( esc_html__( 'About %s', 'calens' ), get_the_author() );
							?>
						</h3>
						<?php
					}
					?>
					<div class="post-author-description">
						<p class="author-description"><?php the_author_meta( 'description' ); ?></p>
					</div>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'calens_related_post' ) ) {
	/**
	 * Displays an related post in single page.
	 */
	function calens_related_post() {
		
		$related_category_ids = wp_get_post_categories( get_the_ID() );

		if ( empty( $related_category_ids ) ) {
			return;
		}

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 2,
			'post__not_in'   => array( get_the_ID() ),
			'tax_query'      => array(
				array(
					'taxonomy' => 'category',
					'field'    => 'id',
					'terms'    => $related_category_ids,
				),
			),
		);

		$related_post_query = new WP_Query( $args );
		
		if ( $related_post_query->have_posts() ) {
			$post_grid_responsive_xl = 2;
			$post_grid_responsive_lg = 2;
			$post_grid_responsive_md = 1;
			$post_grid_responsive_sm = 1;

			$classes [] = 'col-xl-' . ( 12 / $post_grid_responsive_xl );
			$classes [] = 'col-lg-' . ( 12 / $post_grid_responsive_lg );
			$classes [] = 'col-md-' . ( 12 / $post_grid_responsive_md );
			$classes [] = 'col-sm-' . ( 12 / $post_grid_responsive_sm );
			$classes    = implode( ' ', array_filter( array_unique( $classes ) ) );
			?>
			<div class="row related-posts calens_blog_wrapper tcr-shortcode-wrapper blog-style-2 blog-layout-grid">
				<?php
				while ( $related_post_query->have_posts() ) {
					$related_post_query->the_post();
					$post_image_src = '';
					$slide_classes  = 'tcr-post-slide';
					if ( ! has_post_thumbnail( get_the_ID() ) ) {
						$slide_classes .= ' without-image';
					}
					?>
					<div class="<?php echo esc_attr( $classes ); ?>">
						<div class="<?php echo esc_attr( $slide_classes ); ?>">
							<div class="tcr-post-wrapper">				
								<div class="tcr-post-thumbnail-wrapper">
									<?php
									if ( has_post_thumbnail( get_the_ID() ) ) {
										$post_image_id = get_post_thumbnail_id( get_the_ID() );
										$post_image    = wp_get_attachment_image_src( $post_image_id, 'calens-800x600' );

										if ( isset( $post_image[0] ) ) {
											$post_image_src = $post_image[0];
										}
									}
									?>
									<div class="tcr-post-image-container">
										<?php
										if ( ! empty( $post_image_src ) ) {
											?>
											<img class="post-image" src="<?php echo esc_url( $post_image_src ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
											<?php
										}
										?>
									</div>
									<div class="tcr-post-meta">
										<div class="tcr-post-meta-inner">
											<div class="post-meta-item post-date">
												<i class="fa fa-calendar"></i>
												<span><?php echo esc_html( get_the_date( 'M d, Y' ) ); ?></span>
											</div>
											<div class="post-meta-item post-comment"><i class="far fa-comment"></i><span><?php echo esc_html( 'Comments (' . get_comments_number() . ')' ); ?></span>
											</div>
										</div>
									</div>					
								</div> 
								<div class="tcr-post-title">
									<h3 class="post-title">
										<a href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html( get_the_title() ); ?></a>
									</h3>
								</div>
								<div class="read-more-link">
									<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'Read More', 'calens' ); ?><i class="fa fa-angle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
				wp_reset_postdata();
				?>
			</div>
			<?php
		}
	}
}

