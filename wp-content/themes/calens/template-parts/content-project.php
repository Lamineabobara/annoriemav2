<?php
/**
 * Template part for displaying project posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package calens
 */

$project_details = get_post_meta( get_the_ID(), 'calens_project_details', true );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'row' ); ?>>
	<div class="col-lg-12">
		<div class="tcr-project-thumbnail">
			<?php calens_post_thumbnail(); ?>
		</div>
	</div>
	<div class="tcr-project-content col-md-12">
		<div class="row">
			<div class="col-lg-7">
				<h3><?php echo esc_html__( 'Project Details', 'calens' ); ?></h3>
				<?php
				if ( has_excerpt( get_the_ID() ) ) {
					?>
					<div class="tcr-project-detail-des"><?php the_excerpt(); ?></div>
					<?php
				}
				?>
			</div>
			<div class="col-lg-5">
				<div class="tcr-project-details">				
				<div class="tcr-project-detail tcr-project_phone-number">
					<div class="tcr-project-detail-title"><?php echo esc_html__( 'Project Name', 'calens' ); ?></div>
					<div class="tcr-project-detail-value"><?php the_title(); ?></div>					
				</div>
				<?php
				if ( isset( $project_details['tcr_project_client_name'] ) && $project_details['tcr_project_client_name'] ) {
					?>
					<div class="tcr-project-detail tcr-project-client-name">
						<div class="tcr-project-detail-title"><?php echo esc_html__( 'Client', 'calens' ); ?></div>
						<div class="tcr-project-detail-value"><?php echo esc_html( $project_details['tcr_project_client_name'] ); ?></div>
					</div>
					<?php
				}
				$get_terms = get_the_terms( get_the_ID(), 'project-category' );
				if ( $get_terms ) {
					?>
					<span class="tcr-service-category">
						<?php
						$terms_data = array();
						foreach ( $get_terms as $get_term ) {
							$terms_data[ $get_term->slug ] = $get_term->name;
						}
						?>
					</span>
					<div class="tcr-project-detail tcr-project-category">
						<div class="tcr-project-detail-title"><?php echo esc_html__( 'Category', 'calens' ); ?></div>
						<div class="tcr-project-detail-value"><?php echo esc_html( implode( ',', $terms_data ) ); ?></div>
					</div>
					<?php
				}
				if ( isset( $project_details['tcr_project_location'] ) && $project_details['tcr_project_location'] ) {
					?>
					<div class="tcr-project-detail tcr-project-location">
						<div class="tcr-project-detail-title"><?php echo esc_html__( 'Location', 'calens' ); ?></div>
						<div class="tcr-project-detail-value"><?php echo esc_html( $project_details['tcr_project_location'] ); ?></div>
					</div>
					<?php
				}
				if ( isset( $project_details['tcr_project_year'] ) && $project_details['tcr_project_year'] ) {
					?>
					<div class="tcr-project-detail tcr-project-year">
						<div class="tcr-project-detail-title"><?php echo esc_html__( 'Year', 'calens' ); ?></div>
						<div class="tcr-project-detail-value"><?php echo esc_html( $project_details['tcr_project_year'] ); ?></div>
					</div>
					<?php
				}
				?>
			</div>
			</div>
		</div>
		<?php the_content(); ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
