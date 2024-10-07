<?php
/**
 * Template part for displaying service posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calens
 */

?>
<div class="tcr-service-thumbnail-container">
	<?php calens_post_thumbnail(); ?>
</div>
<div class="tcr-service-entry-content">
	<?php the_content(); ?>
</div><!-- .entry-content -->
