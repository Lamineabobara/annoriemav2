<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Calens
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$calens_comment_count = get_comments_number();
			if ( '1' === $calens_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'calens' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $calens_comment_count, 'comments title', 'calens' ) ),
					esc_html( number_format_i18n( $calens_comment_count ) ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new Calens_Walker_Comment(),
					'avatar_size' => 100,
					'style'       => 'ol',
					'short_ping'  => true,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'calens' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().
	
	$required      = get_option( 'require_name_email' );
	$aria_required = ( $required ? " aria-required='true'" : '' );
	$commenter     = wp_get_current_commenter();
	$consent       = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

	$comments_args = array(
		'comment_notes_after' => '',
		'fields'              => apply_filters(
			'calens_comment_form_fields',
			array(
				'author'  => '<div class="tcr-comment-form-input-wrapper"><p class="comment-form-author">' .
						'<input id="author" placeholder="' . esc_attr__( 'Name', 'calens' ) . '*" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_required . ' />' .
						'</p>',
				'email'   => '<p class="comment-form-email">' .
						'<input id="email" placeholder="' . esc_attr__( 'Email', 'calens' ) . '*" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30"' . $aria_required . ' />' .
						'</p>',
				'url'     => '<p class="comment-form-url">' .
						'<input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'calens' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /> ' .
						'</p></div>',
				'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
						'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'calens' ) . '</label></p>',
			)
		),
		'comment_field'       => '<p class="comment-form-comment">' .
			'<textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Enter your comment here...', 'calens' ) . '" cols="45" rows="8" aria-required="true"></textarea>' .
			'</p>',
	);
	comment_form( $comments_args );
	?>
</div><!-- #comments -->
