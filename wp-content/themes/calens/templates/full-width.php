<?php
/**
 * Template Name: Full Width
 *
 * This template display the page in full width.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package calens
 * @since   1.0.0
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
	</div>
</div>
<?php
get_footer();

