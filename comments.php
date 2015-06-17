<?php
if ( post_password_required() ) {
	return;
}
?>

	<?php if ( have_comments() ) : ?>

		<section class="commentlist">
			<?php
				wp_list_comments( array(
					'style'             => 'div',
					'short_ping'        => true,
					'avatar_size'       => 0,
					'callback'          => 'bones_comments',
					'type'              => 'all',
					'reply_text'        => 'Reply',
					'page'              => '',
					'per_page'          => '',
					'reverse_top_level' => true,
					'reverse_children'  => ''
				) );
			?>
		</section>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<nav class="navigation comment-navigation" role="navigation">
				<div class="comment-nav-prev"><?php previous_comments_link( __( '&larr; Previous Comments', 'bonestheme' ) ); ?></div>
				<div class="comment-nav-next"><?php next_comments_link( __( 'More Comments &rarr;', 'bonestheme' ) ); ?></div>
			</nav>
		<?php endif; ?>

		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php _e( 'Comments are closed.' , 'bonestheme' ); ?></p>
		<?php endif; ?>

	<?php endif; ?>

	<?php $form_args = array(
		'title_reply' => 'Comment',
		'logged_in_as' => '',
		'comment_notes_after' => '',
		'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>'
	) ?>

	<?php comment_form($form_args); ?>

