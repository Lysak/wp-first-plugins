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

    if (!is_single()) return $content;

    $id = get_the_ID();
    $categories = get_the_category( $id );

    foreach ($categories as $category) {
        $cats_id[] = $category->cat_ID;
    }
    $related_posts = new WP_Query(
        array(
            'posts_per_page' => 5,
            'category__in' => $cats_id,
            'orderby' => 'rand',
            'post__not_in' => array($id)
        )
    );

    if($related_posts->have_posts()) {
        $content .= '<div class="related-posts"><h3>Возможно вас заинтересуют эти записи:</h3>';

        while ($related_posts->have_posts()) {
            $related_posts->the_post();
            $content .= '<a href="' . get_permalink() . '">' . get_the_title() . '</a></br>';
        }

        $content .= '</div>';
        wp_reset_query();
    }

    return $content;

}