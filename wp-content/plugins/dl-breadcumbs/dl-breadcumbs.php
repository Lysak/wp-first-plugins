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

add_filter( 'wp_title', 'dl_title', 20 );

function dl_title($title){
	$title = null;
	$sep = ' - ';
	$site = get_bloginfo( 'name' );

	// главная страница
	if( is_home() || is_front_page() ){
	 $title = array($site);
	}

	// постоянная страница
	elseif( is_page() ){
		$title = array(get_the_title(), $site);
	}

	// метка
	elseif( is_tag() ){
		$title = array( single_tag_title('Метка: ', false ), $site);
	}

	// поиск
	elseif( is_search() ){
		$title = array( 'Результат поиска по запросу: ' . get_search_query() );
	}

	// 404
	elseif( is_404() ){
		$title = array( 'Страница не найдена' );
	}

	// архив
	elseif ( is_archive() ){
		$title = array( 'Архив за: ' . get_the_time("F Y"), $site );
	}

	$title = implode($sep, $title);
    return $title;
}