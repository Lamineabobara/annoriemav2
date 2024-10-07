<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */

global $calens_options;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="tcr-blog-classic">
		<?php calens_post_thumbnail(); ?>	
		<?php
		if ( 'post' === get_post_type() ) {
			?>
			<div class="entry-meta">
				<?php
				calens_posted_on();
				?>
			</div><!-- .entry-meta -->
			<?php
		}
		?>
		<div class="tcr-blog-classic-inner">
			<header class="entry-header">
				<?php
				if ( is_singular() ) {
					if ( ! isset( $calens_options['display_page_title'] ) || ! $calens_options['display_page_title'] ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					}
				} else {
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				}

				if ( is_single() ) {
					?>
					<footer class="entry-footer">
						<?php calens_entry_footer(); ?>
					</footer><!-- .entry-footer -->
					<?php
				}
				?>				
			</header><!-- .entry-header -->

			<div class="entry-content">
				<?php
				if ( is_single() ) {
					the_content(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'calens' ),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							get_the_title()
						) 
					);
				} else {
					the_excerpt();
				}

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'calens' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->

			<?php
			if ( ! is_single() ) {
				?>
				<footer class="entry-footer">
					<?php calens_entry_footer(); ?>
				</footer><!-- .entry-footer -->
				<?php
			}
			?>

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
