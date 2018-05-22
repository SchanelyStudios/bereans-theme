<?php function show_comment() { ?>
<div class="comment">
  <div class="comment__head">
    <?php echo get_avatar( $comment, $args['avatar_size'], null, null, array('class' => 'user-image')); ?>
    <p class="user-name">
      <?php echo get_comment_author_link(); ?>
    </p>
    <p class="comment__post-date">
      <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php printf(
          __('%1$s at %2$s'),
          get_comment_date(),
          get_comment_time()
        ); ?>
        </a>
        <?php edit_comment_link( __( '(Edit)' ), '  ', '' ); ?>
    </p>
  </div>
  <div class="comment__body">
    <?php if ( $comment->comment_approved == '0' ) { ?>
        <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br/>
    <?php } ?>
    <?php comment_text(); ?>
  </div>
  <p class="comment__reply-link reply">
    <?php comment_reply_link(); ?>
  </p>
  <div class="comment__replies">
<?php } ?>

<?php function show_comment_end() { ?>
  </div>
</div>
<?php } ?>
<?php
// You can start editing here -- including this comment!
if ( have_comments() ) : ?>
<ul class="comment-list">
  <?php wp_list_comments(); ?>
</ul>

<?php else : ?>
<p>No comments yet.</p>

<?php endif; ?>

<?php comment_form(); ?>
