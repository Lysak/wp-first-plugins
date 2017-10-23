<?php

if( !defined('WP_UNINSTAAL_PLUGIN')) exit;

global $wpdb;

$query = "ALTER TABLE $wpdb->posts DROP dl_views";
$wpdb -> query($query);
