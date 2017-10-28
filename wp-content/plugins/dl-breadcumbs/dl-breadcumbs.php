<?php /**
 * Plugin Name: Хлебные крошки в "title"
 * Description: Добавляет полный путь в "title" страниц. Для корректной роботы плагина, тег &lt;title&gt; шаблона header.php должен выглядеть так: &lt;title&gt;&lt;?php wp_title(); ?&gt;&lt;/title&gt;.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

// &lt;title&gt - мнемоники
// is_home() - условные теги

add_filter( 'wp_title', 'dl_title', 100 );

function dl_title($title){
    $title = null;
    // var_dump($title);
    // $sep = ' - ';
    // $site = get_bloginfo( 'name' );

    // // главная страница
    // if( is_home() || is_front_page() ){
    //     $title = array($site);
    //     var_dump($title);
    //     // $title[] = 'test';
    // }

    // $title = implode($sep, $title);
    return $title;
}