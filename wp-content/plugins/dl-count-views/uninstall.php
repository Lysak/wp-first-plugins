<?php

if( !defined('WP_UNINSTALL_PLUGIN')) exit;

include(__FILE__, 'dl_create_field');

global $wpdb;

if(!dl_check_field('dl_views')){
    $query = "ALTER TABLE $wpdb->posts DROP dl_views";
    $wpdb -> query($query);
}


