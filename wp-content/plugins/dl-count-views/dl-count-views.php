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

function dl_create_field() {
    global $wpdb;

    $query = "ALTER TABLE $wpdb->posts ADD dl_views INT NOT NULL DEFAULT '0'";
    $wpdb -> query($query);
}

