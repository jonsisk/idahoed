<?php
	function gabcustom_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>

		<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
			<div id="comment-<?php comment_ID(); ?>">
				<div class="comment-author vcard">
					<?php if(get_comment_type() == "comment"){ ?><div class="avatar"><?php echo get_avatar( $comment, $args['avatar_size'] ); ?></div><?php } ?>
					<?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?>
				</div>
				<div class="comment-meta commentmetadata">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
					<?php printf(__('%1$s - %2$s'), get_comment_date(),get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)','WpAdvNewspaper'),'','') ?>
				</div>
				
				<?php if ($comment->comment_approved == '0') : ?>
         		<p><em><?php _e('Your comment is awaiting moderation.','WpAdvNewspaper'); ?></em></p>
				<?php endif; ?>

				<?php comment_text() ?>
				
				<div class="reply">
				 <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
				</div>
			</div>
		<?php } ?>