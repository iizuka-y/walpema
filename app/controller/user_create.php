<?php
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/User.php');

if(!isset($_POST['user_name']) || !isset($_POST['email']) || !isset($_POST['password']) ){
    header("Location: ../../view/signup.php");
    exit();
}

$params = [
    'user_name' => $_POST['user_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


if(User::create($params)){
    $user = User::find($params);
    fnc_setData("session", "login_userId", $user->id);
    header("Location: ../../view/signup_comp.php");
}else{
    $errorMsg = ["ユーザー登録に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/signup.php");
}


?>