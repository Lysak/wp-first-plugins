<?php /**
 * Plugin Name: Простая капча для формы комментирования
 * Description: Плагин удаляет поле для сайта и добавляет чекбокс для проверки на человечность.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 * License: GPL2
 * Text Domain: text-domain
 * Domain Path: domain/path
 */

add_filter('comment_form_default_fields', 'dl_captcha');
add_filter('preprocess_comment', 'dl_check_captcha');
add_filter('comment_form_field_comment', 'dl_captcha2');

function dl_captcha($fields){
    unset($fields['url']);
    /*$fields['captcha'] = '<p>
    <label for="captcha">Капча <span class="required">*</span></label>
    <input type="checkbox" name="captcha" id="captcha">
    </p>';*/
    return $fields;
}

function dl_check_captcha($comment_data){
    if(is_user_logged_in()) return $comment_data;
    if(!isset($_POST['captcha'])){
        wp_die('<b>Ошибка</b>: вы не прошли проверку на человечность');
    }
    return $comment_data;
}

function dl_captcha2($comment_fields){
    $comment_fields .= '<p>
    <label for="captcha">Капча <span class="required">*</span></label>
    <input type="checkbox" name="captcha" id="captcha">
    </p>';
    return $comment_fields;
}