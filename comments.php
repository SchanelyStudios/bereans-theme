<?php function show_comment() { ?>
<div class="comment">
  <div class="comment__head">
    <img src="http://placehold.it/30x30" class="user-image" />
    <?php if ( $args['avatar_size'] != 0 ) {
      // TODO: Provide default avatar image...
      echo get_avatar( $comment, $args['avatar_size'], null, null, array('class' => 'user-image'));
    } ?>
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
  <p class="comment__reply-link">
    <?php  comment_reply_link(
      array_merge(
        $args,
        array(
          'add_below' => $add_below,
          'depth'     => $depth,
          'max_depth' => $args['max_depth']
        )
      )
    ); ?>
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
<div class="comment-list">
  <?php
    wp_list_comments( array(
      'avatar_size' => 30,
      'style'       => 'div',
      'short_ping'  => true,
      'reply_text'  => '<p class="comment__reply-link"><a href="#"><i class="icon icon--reply icon--sm"></i> Reply</a></p>',
      'callback'    => 'show_comment',
      'end-callback' => 'show_comment_end'
    ) );
  ?>
</ol>

<?php else : ?>
<p>No comments yet.</p>

<?php endif; ?>

<?php comment_form(); ?>
