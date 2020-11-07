<?php
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');

if(!isset($_POST['user_name']) && !isset($_POST['email']) && !isset($_POST['password']) ){
    header("Location: signup.php");
}

$params = [
    'user_name' => $_POST['user_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$errorMsg = array();

// 空文字バリデーション
if(!$_POST['user_name']){
    $errorMsg[] = "名前が入力されていません";
}

if(!$_POST['email']){
    $errorMsg[] = "メールアドレスが入力されていません";
}

if(!$_POST['password']){
    $errorMsg[] = "パスワードが入力されていません";
}

// 文字数バリデーション
if(mb_strlen($_POST['user_name']) > 10){
    $errorMsg[] = "名前は10文字以内で入力してください";
}



if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/signup.php");
}else{
    fnc_setData("session", "params", $params);
    header("Location: ../../view/signup_check.php");
}


?>