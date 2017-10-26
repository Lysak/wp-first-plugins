<?php /**
 * Plugin Name: Простая капча для формы авторизации
 * Description: Плагин добавляет простую проверку на человечность к форме авторизации.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

 /*add_filter('login_errors', 'my_login_errors');

 function my_login_errors(){
     return 'Ошибка авторизации';
 }*/

/* add_action('login_form', 'dl_captcha_login');
add_action('wp_authenticate', 'dl_authenticate', 10, 2);

function dl_captcha_login(){
    echo '<p><label class="login-checked" style="font-size: 12px;" for="check"><input type="checkbox" name="check" id="check" value="check" checked> Снимите галочку</label></p>';
}

function dl_authenticate(){
    if(isset($_POST['check']) && $_POST['check'] == 'check'){
        // wp_die( '<b>Ошибка</b>: вы не прошли проверку на человечность');
        add_filter('login_errors', 'my_login_errors');
        $username = null;
    }
}

function my_login_errors(){
    return '<b>Ошибка</b>: вы не прошли проверку на человечность';
} */

add_action('login_form', 'dl_captcha_login');
add_action('authenticate', 'dl_auth_signon', 30, 3);

function dl_auth_signon($user, $username, $password){
    if(isset($_POST['check']) && $_POST['check'] == 'check'){
        $user = new WP_Error('broke', '<b>Ошибка авторизации</b>: Вы не прошли проверку на человечность');
        
    }

    if(isset($user->errors['invalid_username']) || isset($user->errors['incorrect_password'])){
        return new WP_Error('broke', '<b>Ошибка авторизации</b>: Вы ввели неверный логин или пароль');
    }
    return $user;
}

function dl_captcha_login(){
    echo '<p><label class="login-checked" style="font-size: 12px;" for="check"><input type="checkbox" name="check" id="check" value="check" checked> Снимите галочку</label></p>';
}