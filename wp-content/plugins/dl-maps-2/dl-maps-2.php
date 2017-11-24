<?php /**
 * Plugin Name: Карты Google v.2
 * Description: Пример шорткода: [map cords="48.718812, 27.520369" zoom="13"].
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

// add_filter( 'the_content', 'dl_maps_2' ); //remove in 21th lesson
add_shortcode( 'map',  'dl_maps_2' );

$dl_maps_array = array();

// function dl_maps_2( $content ) { //remove in 21th lesson
// 	return $content . '<div id="map-canvas" style="width: 650px; height:400px; border:1px solid"></div>';
// }

function dl_maps_2( $atts ) {
	global $dl_maps_array;

	extract( $atts );
	/** @var $cords string */
	/** @var $zoom number */
	$cordsn = explode(", ", $cords);

	$atts = shortcode_atts(
		array(
			'cords1' => 37.35,
			'cords2' => -121.96,
			'zoom' => 12,
		), $atts
	);
	
	$dl_maps_array = array(
		'zoom' => $zoom,
		'cords1' => $cordsn[0],
		'cords2' => $cordsn[1],
	);
	
	add_action( 'wp_footer', 'dl_styles_scripts' );
	return '<div id="map-canvas" style="width:650px; height:400px;"></div>';
}

function dl_styles_scripts() { //key=AIzaSyCAxudyHIETdaY6qdJyBxQyzh2ThQHx2zM
	global $dl_maps_array;
	
	// wp_register_script( 'dl-maps-google', 'https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCAxudyHIETdaY6qdJyBxQyzh2ThQHx2zM&sensor=false' );
	wp_register_script( 'dl-maps-google', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCAxudyHIETdaY6qdJyBxQyzh2ThQHx2zM' );
	wp_register_script( 'dl-maps-2', plugins_url( 'dl-maps-2.js', __FILE__ ) );

	wp_enqueue_script( 'dl-maps-google' );
	wp_enqueue_script( 'dl-maps-2' );

	wp_localize_script( 'dl-maps-2', 'dlObj', $dl_maps_array );
}