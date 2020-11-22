<?php
require_once('before_view.php');
require_once('../../config/validate_config.php');
require_once('../fn_components/file_upload.php');

if(!isset($_POST) || !isset($current_user)){
    header("Location: ../../view/index.php");
    exit();
}

$errorMsg = array();

// 送信された画像を取り扱う処理
$img_path = file_upload($_FILES['upfile']);

if(!$img_path){
    $errorMsg[] = "壁紙がアップロードされていません";
}

$params = [
    'item_name' => $_POST['name'],
    'price' => $_POST['price'],
    'explanation' => $_POST['explanation'],
    'image' => $img_path
];


if(!$_POST['name']){
    $errorMsg[] = "商品名が入力されていません";
}

if(!$_POST['explanation']){
    $errorMsg[] = "商品情報が入力されていません";
}

if(!$_POST['price']){
    $errorMsg[] = "価格が入力されていません";
}

if(mb_strlen($_POST['name']) > ITEM_NAME){

    $errorMsg[] = "商品名は".ITEM_NAME."文字までです";

}

if(mb_strlen($_POST['explanation']) > ITEM_EXPLANATION){

    $errorMsg[] = "商品情報は".ITEM_EXPLANATION."文字までです";

}

if($_POST['price'] > MAX_PRICE){

    $errorMsg[] = "価格の上限は".MAX_PRICE."円までです";

}

if($_POST['price'] < 0){

    $errorMsg[] = "価格の値が不正です";

}


if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    // アップロードした画像は削除
    if(file_exists('../../'.$img_path)){
        unlink('../../'.$img_path);
    }
    header("Location: ../../view/post.php");
}else{
    fnc_setData("session", "params", $params);
    header("Location: ../../view/post_check.php");
}



?>