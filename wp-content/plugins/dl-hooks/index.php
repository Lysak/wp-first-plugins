<?php /**
 * !Plugin Name: Пример работы хуков 
 * Description: Несколько примеров работы хуков
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

// Для unicode строк, з підтримкою кирилиці
/*add_filter( 'the_title', 'dl_title');

function dl_title($title) {
    if (is_admin()) return $title;
    return mb_convert_case($title, MB_CASE_TITLE, "UTF-8");
}*/

// Якщо все латиниця, не обовязково описувати фцію
/*add_filter('the_title', 'ucwords');*/

/*add_filter('the_content', 'dl_content');

function dl_content($content){
    if(is_user_logged_in()) return $content;
    if(is_page()) return $content;
    return '<div class="dl-access"><a href="' . home_url() . '/wp-login.php">Авторизуйтесь для просмотра контента</a></div>';
}*/

/*add_action('comment_post', 'dl_comment_post');

function dl_comment_post() {
    wp_mail( get_bloginfo( 'admin_email' ), 'Новый комментарий на сайте', 'На сайте появился новый коммнентарий' );
}*/