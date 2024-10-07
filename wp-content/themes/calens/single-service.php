<?php
/**
 * The template for displaying all single service posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Calens
 */

get_header();
?>
<div class="row"> 
	<div id="primary" class="<?php echo esc_attr( calens_grid_column_classes() ); ?> content-area">
		<main id="main" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
			
			the_post_navigation();

		endwhile; // End of the loop.
		?>
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar(); ?>
</div>
<?php
get_footer();
