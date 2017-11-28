<?php /**
 * Plugin Name: Галерея
 * Description: Используйте шорткод вида: [gallery id="1,2,3"], где в атрибуте ids указывайте ID картинок.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

remove_shortcode('gallery');
add_shortcode( 'gallery', 'dl_gallery' );

function dl_gallery( $atts ) {
    $img_id = explode( ',', $atts['ids'] );
    if( !$img_id[0] ) return '<div class="dl_gllery">В галерее нет картинок</div>';
    $html .= '<div class="dl_gllery">';
    foreach ($img_id as $item) {
        $img_data = get_posts( array(
            'p' => $item,
            'post_type' => 'attachment',
        ) );
        // print_r($img_data);
        $img_desc    = $img_data[0]->post_content;
        $img_caption = $img_data[0]->post_excerpt;
        $img_title   = $img_data[0]->post_title;
        echo $img_desc . '|' . $img_caption . '|' . $img_title . '<br />';
    }
    $html .= '</div>';
    return $html;
}
