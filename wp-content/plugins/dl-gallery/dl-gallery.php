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
        $img_date = get_posts();
    }
    $html .= '</div>';
    return $html;
}
