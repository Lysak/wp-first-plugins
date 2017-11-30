<?php /**
 * Plugin Name: Первый виджет
 * Description: Простой текствый виджет.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

add_action( 'widgets_init', 'dl_first_widget' );

function dl_first_widget() {
    register_widget( 'DL_Widget' );
}

class DL_Widget extends WP_Widget
{
    function __construct() {
/*         parent::__construct(
            // ID, name, args (description)
            'dl_fw',
            'Мой первый виджет',
            array( 'description' => 'Описание виджета' )
        ); */

        $args = array(
            'name' => 'Мой первый виджет',
            'description' => 'Описание виджета',
            'classname' => 'dl-test',
        );
        parent::__construct( 'dl_fw', '', $args);
    }

    function widget() {

    }

    function form($instance) {
        extract($instance);
        ?>

        <p>
            <label for="<?= $this->get_field_id('title') ?>">Заголовок: </label>
            <input type="text" name="<?= $this->get_field_name('title') ?>" id="<?= $this->get_field_id('title') ?>" value="<?php if( isset($title) ) echo esc_attr( $title ); ?>" class="widefat">
        </p>

        <?php
    }
}