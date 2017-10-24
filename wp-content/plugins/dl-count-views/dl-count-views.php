<?php /**
 * Plugin Name: Количество просмотров статей
 * Description: Плагин считает и выводит количество просмотров статей.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: text-domain
 * Domain Path: domain/path
 */

register_activation_hook( __FILE__, 'dl_create_field' );
add_filter('the_content', 'dl_post_views');
add_action('wp_head', 'dl_add_view');

function dl_create_field() {
    global $wpdb;

    $query = "ALTER TABLE $wpdb->posts ADD dl_views INT NOT NULL DEFAULT '0'";
    $wpdb -> query($query);
}

function dl_post_views($content){
    if (is_page()) return $content;
    global $post;
    $views = $post->dl_views;
    if ( is_single() ) $views += 1;
    return $content . "<b>Количество просмотров: </b>" . $views;
}

function dl_add_view() {
    if(!is_single()) return;
    global $post, $wpdb;
    $dl_id = $post->ID;
    $views = $post->dl_views + 1;
    $wpdb->update(
        $wpdb->posts,
        array('dl_views' => $views),
        array('ID' => $dl_id)
    );
}
