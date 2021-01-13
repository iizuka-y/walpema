<?php
require_once('before_view.php');

if(!isset($current_user)){
    header("Location: ../../view/index.php");
    exit();
}

if(!isset($_POST['item_id'])){
    header("Location: ../../view/index.php");
    exit();
}

if(!$item = Item::findById($_POST['item_id'])){
    header("Location: ../../view/index.php");
    exit();
}

if($item->user_id != $current_user->id){
    header("Location: ../../view/index.php");
    exit();
}

$params = [
    'id' => $item->id,
    'sale' => 0 // false
];

if(Item::update($params)){
    header("Location: ../../view/wallpaper_detail.php?id=$item->id");
}else{
    $errorMsg = ["出品の取り消しに失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/error_page.php");
}

?>