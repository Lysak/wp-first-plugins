<?php

if( !defined('WP_UNINSTALL_PLUGIN')) exit;

global $wpdb;

$query = "ALTER TABLE $wpdb->posts DROP dl_views";
$wpdb -> query($query);
