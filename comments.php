<div id="comments" class="comments-area">
	<?php if(have_comments()) : ?>
		<h2 class="comments-title">
			<?php
			$num_comments = get_comments_number();
			if($num_comments == 0) {
				echo 'No comments so far';
			}
			elseif($num_comments == 1) {
				echo '1 comment';
			}
			else {
				echo $num_comments, ' comments';
			}
			?>
		</h2>

		<div class="comments-list">
			<?php wp_list_comments(array('style' => 'div')); ?>
		</div>

		<?php
		if(!comments_open() && get_comments_number()) : ?>
		<p class="nocomments">Comments are closed.</p>
		<?php endif; ?>
	<?php endif; ?>
	<div class="comment-form">
		<?php
		$fields = array(
			'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" placeholder="' . __( 'Name', 'domainreference' ) . '" value="' . esc_attr($commenter['comment_author']) . '"></p>',
			'email' => '<p class="comment-form-email"><input id="email" name="email" type="text" placeholder="' . __( 'Email', 'domainreference' ) . '" value="' . esc_attr($commenter['comment_author_email']) . '"></p>',
		);
		$comments_args = array(
			'comment_notes_before' => '',
			'comment_notes_after' => '', 
			'fields' => apply_filters('comment_form_default_fields', $fields),
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="' . _x('Comment', 'noun') . '"></textarea></p>',
		);
		comment_form($comments_args);
		?>
	</div>
</div>