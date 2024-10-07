<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Calens
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div id="primary" class="content-area <?php echo esc_attr( calens_grid_column_classes() ); ?>">
			<main id="main" class="site-main">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile; // End of the loop.
			?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
<?php
get_footer();
