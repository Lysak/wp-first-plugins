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
add_action( 'wp_enqueue_scripts', 'dl_styles_scripts_g' ); 

function dl_styles_scripts_g() {
    wp_register_script( 'dl-lightbox-js', plugins_url( 'js/lightbox.min.js', __FILE__ ), array('jquery') );
    wp_register_style( 'dl-lightbox', plugins_url( 'css/lightbox.css', __FILE__ ) );
    wp_register_style( 'dl-lightbox-style', plugins_url( 'css/lightbox-style.css', __FILE__ ) );

    wp_enqueue_script( 'dl-lightbox-js' );
    wp_enqueue_style( 'dl-lightbox' );
    wp_enqueue_style( 'dl-lightbox-style' );
}

function dl_gallery( $atts ) {
    $img_id = explode( ',', $atts['ids'] );
    if( !$img_id[0] ) return '<div class="dl-gallery">В галерее нет картинок</div>';
    $html .= '<div class="dl-gallery">';
    foreach ($img_id as $item) {
        $img_data = get_posts( array(
            'p' => $item,
            'post_type' => 'attachment',
        ) );
        // print_r($img_data);
        $img_desc    = $img_data[0]->post_content;
        $img_caption = $img_data[0]->post_excerpt;
        $img_title   = $img_data[0]->post_title;
        // echo $img_desc . '|' . $img_caption . '|' . $img_title . '<br />';
        $img_thumb = wp_get_attachment_image_src( $item );
        // var_dump($img_full);
        $img_full = wp_get_attachment_image_src( $item, 'full' );
        $html .= "<a href='{$img_full[0]}' data-lightbox='gallery' data-title='{$img_caption}'><img src='{$img_thumb[0]}' width='{$img_thumb[1]}' height='{$img_thumb[2]}' alt='{$img_title}'></a>";
    }
    $html .= '</div>';

    return $html;
}
