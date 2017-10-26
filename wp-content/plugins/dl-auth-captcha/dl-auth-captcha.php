<?php /**
 * Plugin Name: Простая капча для формы авторизации
 * Description: Плагин добавляет простую проверку на человечность к форме авторизации.
 * Plugin URI: http://lysak.github.io
 * Author: Dmytrii Lysak
 * Author URI: http://lysak.github.io
 * Version: 1.0.0
 */

//  add_filter('login_errors', 'my_login_errors');

//  function my_login_errors(){
//      return 'Ошибка авторизации';
//  }

// add_action('login_form', 'dl_captcha_login');
// add_action('wp_authenticate', 'dl_authenticate', 10, 2);

// function dl_captcha_login(){
//     echo '<p><label class="login-checked" style="font-size: 12px;" for="check"><input type="checkbox" name="check" id="check" value="check" checked> Снимите галочку</label></p>';
// }

// function dl_authenticate(){
//     if(isset($_POST['check']) && $_POST['check'] == 'check'){
//         // wp_die( '<b>Ошибка</b>: вы не прошли проверку на человечность');
//         add_filter('login_errors', 'my_login_errors');
//         $username = null;
//     }
// }

// function my_login_errors(){
//     return '<b>Ошибка</b>: вы не прошли проверку на человечность';
// }