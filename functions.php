<?php

define('YOUTUBE_API_KEY', 'AIzaSyCrFnyIuEoH3xQSdo9PTFALctloubzPp1k');

function register_menus() {
    register_nav_menus(
        array(
          'top' => __( 'Main Nav' ),
          'bottom' => __( 'Bottom Nav' )
        )
    );
}
add_action( 'init', 'register_menus' );

if ( function_exists ('register_sidebar')) {
    register_sidebar (array('name' => 'sidebar'));
    register_sidebar (array('name' => 'subscribe'));
}


/**
 * Based on wp_list_authors from https://codex.wordpress.org/Template_Tags/wp_list_authors
 *
 */
function custom_list_authors( $args = '' ) {
	global $wpdb;

	$defaults = array(
		'orderby' => 'name', 'order' => 'ASC', 'number' => '',
		'optioncount' => false, 'exclude_admin' => true,
		'show_fullname' => false, 'hide_empty' => true,
		'feed' => '', 'feed_image' => '', 'feed_type' => '', 'echo' => true,
		'style' => 'list', 'html' => true, 'exclude' => '', 'include' => ''
	);

	$args = wp_parse_args( $args, $defaults );

	$return = '';

	$query_args = wp_array_slice_assoc( $args, array( 'orderby', 'order', 'number', 'exclude', 'include' ) );
	$query_args['fields'] = 'ids';
	$authors = get_users( $query_args );

	$author_count = array();
	foreach ( (array) $wpdb->get_results( "SELECT DISTINCT post_author, COUNT(ID) AS count FROM $wpdb->posts WHERE " . get_private_posts_cap_sql( 'post' ) . " GROUP BY post_author" ) as $row ) {
		$author_count[$row->post_author] = $row->count;
	}

  if (count($authors) > 0) {
    echo '<ul>';
  }

	foreach ( $authors as $author_id ) {
		$author = get_userdata( $author_id );

		if ( $args['exclude_admin'] && 'admin' == $author->display_name ) {
			continue;
		}

		$posts = isset( $author_count[$author->ID] ) ? $author_count[$author->ID] : 0;

		if ( ! $posts && $args['hide_empty'] ) {
			continue;
		}
?>
  <li class="author author--item">
    <a href="<?php echo get_the_author_meta( 'user_nicename', $author->ID ); ?>">
      <img class="author__image" src="<?php bloginfo('template_directory'); ?>/pics/authors/<?php echo $author->user_nicename; ?>-thumb.png" />
      <b class="author__name">
        <?php
          if ( $args['show_fullname'] && $author->first_name && $author->last_name ) {
      			echo "$author->first_name $author->last_name";
      		} else {
      			echo $author->display_name;
      		}
        ?>
      </b>
    </a>
    <a
      href="<?php echo get_author_posts_url( $author->ID, $author->user_nicename ); ?>"
      class="author__articles-link btn btn-success btn-sm">
        Articles
    </a>
  </li>
<?php
	}

  if (count($authors) > 0) {
    echo '</ul>';
  }
}
