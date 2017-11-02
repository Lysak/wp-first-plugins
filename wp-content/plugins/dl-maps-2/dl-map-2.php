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
add_action( 'wp_enqueue_script', 'dl_styles_scripts');

function dl_maps_2( $content ) {
	return $content . '<div id="map-canvas" style="width: 650px; height:400px"></div>';
}

function dl_styles_scripts() {
	
}