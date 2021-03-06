<?php
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/User.php');
require_once(dirname(__FILE__).'/../../config/validate_config.php');


if(!isset($_POST['user_name']) || !isset($_POST['email']) || !isset($_POST['password'])){
    header("Location: signup.php");
    exit();
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
if(mb_strlen($_POST['user_name']) > USER_NAME){
    $errorMsg[] = "名前は".USER_NAME."文字以内で入力してください";
}

if($_POST['password'] && mb_strlen($_POST['password']) < MIN_PASSWORD){
    $errorMsg[] = "パスワードは".MIN_PASSWORD."文字以上で入力してください";
}

if(mb_strlen($_POST['password']) > MAX_PASSWORD){
    $errorMsg[] = "パスワードは".MAX_PASSWORD."文字以下で入力してください";
}

// メールアドレス重複チェック
if(User::where(['email' => $_POST['email']])){
    $errorMsg[] = "送信されたメールアドレスは使用できません";
}



if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    fnc_setData("session", "sendData", $params);
    header("Location: ../../view/signup.php");

}else{
    fnc_setData("session", "params", $params);
    header("Location: ../../view/signup_check.php");
}


?>