<?php

if( !defined('WP_UNINSTALL_PLUGIN')) exit;

include dirname(__FILE__) . '/dl-check.php';

global $wpdb;

if(!dl_check_field('dl_views')){
    $query = "ALTER TABLE $wpdb->posts DROP dl_views";
    $wpdb -> query($query);
}


