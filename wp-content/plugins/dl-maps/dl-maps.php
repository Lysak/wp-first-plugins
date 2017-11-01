<?php /**
 * Plugin Name: Google карты для сайта
 * Description: Для вывода карты исползуйте шорткод вида: [map center="город,область,страна" width="600" height="300" zoom="13"]Описание карты[/map].
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

/**
 * Created by PhpStorm.
 * User: lysak
 * Date: 01.11.17
 * Time: 13:57
 */

add_shortcode( 'test', 'dl_test' );

function dl_test( $atts, $content ) {
/*	$content = ! empty($content) ? $content : 'Default Тестовые данные:';
	$user = isset( $atts['user'] ) ? $atts['user'] : 'Default Name';
	$login = isset( $atts['login'] ) ? $atts['login'] : 'Default Login';*/
	$atts = shortcode_atts(
		array(
			'user'    => 'Name',
			'login'   => 'Login',
			'content' => ! empty( $content ) ? $content : 'Default Тестовые данные:'
		), $atts
	);
	extract($atts);

	/** @var $user */
	/** @var $login */
	return "<h3>{$content}</h3><p>Привет, {$user}! Ваш логин: {$login}</p>";
}