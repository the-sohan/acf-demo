<?php
/**
 * Plugin Name:       Column Demo
 * Plugin URI:        https://example.com/plugins/
 * Description:       This is practise plugin.
 * Version:           1.0
 * Author:            Sohan
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       column-demo
 * Domain Path:       /languages
 */

function coldemo_boostrap(){
    load_plugin_textdomain( 'column-demo', false, dirname(__FILE__) . "/languages" );
}
add_action( 'plugins_loaded', 'coldemo_boostrap' );

function coldemo_post_columns( $columns ) {
	unset( $columns['tags'] );
	unset( $columns['comments'] );
	// unset( $columns['author'] );
	// $columns['author'] = "Author";
	// unset( $columns['date'] );
	// $columns['author'] = "Date";
	$columns['id'] = __( 'Post ID', 'column-demo' );
	$columns['thumbnail'] = __( 'Thumbnail', 'column-demo' );
	return $columns;
}
add_filter('manage_posts_columns', 'coldemo_post_columns');
add_filter('manage_pages_columns', 'coldemo_post_columns');

function coldemo_post_column_data( $column, $post_id ) {
	if ( 'id' == $column ) {
		echo $post_id;
	} elseif ( 'thumbnail' == $column ) {
		$thumbnail = get_the_post_thumbnail( $post_id, array(100, 100) );
		echo $thumbnail;
	}
}

add_action( 'manage_posts_custom_column', 'coldemo_post_column_data' );