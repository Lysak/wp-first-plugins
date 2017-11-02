<?php /**
 * Plugin Name: Карты Google v.2
 * Description: Пример шорткода: [map cords="50.4447312" cords="30.526511" zoom="17"].
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

/**
 * Created by PhpStorm.
 * User: lysak
 * Date: 02.11.17
 * Time: 8:28
 */

add_filter( 'the_content', 'dl_maps_2' );
add_action( 'wp_enqueue_scripts', 'dl_styles_scripts');

function dl_maps_2( $content ) {
	return $content . '<div id="map-canvas" style="width: 650px; height:400px; border:1px solid"></div>';
}

function dl_styles_scripts() { //key=AIzaSyCAxudyHIETdaY6qdJyBxQyzh2ThQHx2zM
	wp_register_script( 'dl-maps-google', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCAxudyHIETdaY6qdJyBxQyzh2ThQHx2zM&sensor=false' );
	wp_register_script( 'dl-maps-2', plugins_url( 'dl-maps-2.js', __FILE__ ) );

	wp_enqueue_script( 'dl-maps-google' );
	wp_enqueue_script( 'dl-maps-2' );
}