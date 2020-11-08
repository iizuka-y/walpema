<?php
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/User.php');

if(isset($_SESSION['login_userId'])){
    $user_id = fnc_getData("session", "login_userId");
    $current_user = User::findById($user_id);
}
?>