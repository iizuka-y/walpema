<?php
require_once(dirname(__FILE__).'/../class/User.php');

if(!isset($_POST['user_name']) && !isset($_POST['email']) && !isset($_POST['password']) ){
    header("Location: ../../view/signup.php");
}

$params = [
    'user_name' => $_POST['user_name'],
    'email' => $_POST['email'],
    'password' => $_POST['password']
];


if(User::create($params)){
    header("Location: ../../view/signup_comp.php");
}else{
    $errorMsg = ["ユーザー登録に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/signup.php");
}


?>