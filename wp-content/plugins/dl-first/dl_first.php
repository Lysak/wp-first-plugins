<?php /**
 * !Plugin Name: Первый плагин   
 * Description: Описание первого плагина
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: text-domain
 * Domain Path: domain/path
 */

/*
    Copyright (C) Year  Author  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

include dirname(__FILE__) . '/deactivate.php';

register_activation_hook( __FILE__, 'dl_activate' );
register_deactivation_hook( __FILE__, 'dl_deactivate' );
// register_uninstall_hook( __FILE__, 'dl_uninstall' );

function dl_uninstall() {
    wp_mail( get_bloginfo( 'admin_email' ), 'Плагин удален', 'Произошла успешное удаление' );
}

function dl_activate() {
    wp_mail( get_bloginfo( 'admin_email' ), 'Плагин активирован', 'Произошла успешная активация' );
}


// Анонімна фція
// register_activation_hook( __FILE__, function() {
//     wp_mail( get_bloginfo( 'admin_email' ), 'Плагин активирован', 'Произошла успешная активация' );
// } );

// Перевірка версії PHP
// register_activation_hook( __FILE__, 'dl_activate' );

// function dl_activate() {
//     if (version_compare(PHP_VERSION, '7.0', '<')) {
//         // а цьому випадку не потрібно, для виправлення кодировки
//         //header("Content-type: text/html; Charset=utf-8");
//         exit('Для работы плагина нужна версия PHP => 7.0');
//     }
// }

// Class
// class DLAactivate{
//     function __construct() {
//         register_activation_hook( __FILE__, array($this, 'dl_activate') );
//     }

//     function dl_activate() {
//         $date = "[" . date("Y-m-d H:i:s") . "]";
//         error_log($date . " " ."Плагин активирован". "\r\n", 3, dirname(__FILE__) . '/dl_errors_log.log');
//     }
// }

// $dl_activate = new DLAactivate();

// Без конструктора 

// class  DLActivate {
//     static function dl_activate() {
//         $date = "[" . date("Y-m-d H:i:s") . "]";
//         error_log($date . " " ."Плагин активирован". "\r\n", 3, dirname(__FILE__) . '/dl_errors_log.log');
//     }
// }

// register_activation_hook( __FILE__, array( 'DLActivate', 'dl_activate') );