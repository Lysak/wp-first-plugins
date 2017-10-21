<?php /**
 * Plugin Name: Похожие записи
 * Description: Плагин выводит ссылки на похожие записи.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: text-domain
 * Domain Path: domain/path
 */

add_filter( 'the_content', 'dl_related_posts');

function dl_related_posts($content) {

    $id = get_the_ID();
    $categories = get_the_category( $id );

    foreach ($categories as $category) {
        $cats_id[] = $category->cat_ID;
    }
    print_r($cats_id);

    return $content;

}