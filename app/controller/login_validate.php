<?php
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/User.php');


if(!isset($_POST['email']) || !isset($_POST['password'])){
    header("Location: login.php");
}

$params = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$errorMsg = array();

// 空文字バリデーション
if(!$_POST['email']){
    $errorMsg[] = "メールアドレスが入力されていません";
}

if(!$_POST['password']){
    $errorMsg[] = "パスワードが入力されていません";
}


if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/login.php");
}else{
    $user = User::find($params);
    // print_r($user);
    if($user){
        fnc_setData("session", "login_userId", $user->id);
        header("Location: ../../view/index.php");
    }else{
        $errorMsg = ["メールアドレスまたはパスワードが間違っています"];
        fnc_setData("session", "errorMsg", $errorMsg);
        header("Location: ../../view/login.php");
    }

}


?>