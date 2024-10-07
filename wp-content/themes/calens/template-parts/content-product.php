<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="tcr-blog-classic">
		<div class="tcr-blog-classic-inner">
			<div class="entry-content">
				<?php
				if ( is_single() ) {
					the_content();
				}
				?>
			</div><!-- .entry-content -->
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
