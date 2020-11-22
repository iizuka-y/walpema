<?php
require_once('before_view.php');
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/Item.php');

if(!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['explanation']) || !isset($_POST['image'])){
    header("Location: ../../view/index.php");
    exit();
}

$params = [
    'item_name' => $_POST['name'],
    'user_id' => $current_user->id,
    'price' => $_POST['price'],
    'explanation' => $_POST['explanation'],
    'image' => $_POST['image']
];

if(Item::create($params)){
    
    header("Location: ../../view/profile.php?id=$current_user->id");

}else{
    $errorMsg = ["壁紙投稿に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/post.php");
}


?>