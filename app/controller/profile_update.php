<?php
require_once('before_view.php');
require_once('../../config/validate_config.php');
require_once('../fn_components/file_upload.php');


if(!isset($_POST) || !isset($current_user)){
    header("Location: ../../view/index.php");
}

$errorMsg = array();

// 送信された画像を取り扱う処理
$img_path = file_upload($_FILES['upfile']);



$params = [
    'id' => $current_user->id,
    'user_name' => $_POST['name'],
    'image' => $img_path,
    'self_introduction' => $_POST['self_introduction']
];


if(!$_POST['name']){
    $errorMsg[] = "ユーザー名が入力されていません";
}

if(mb_strlen($_POST['name']) > USER_NAME){

    $errorMsg[] = "ユーザー名は".USER_NAME."文字までです";

}


if(mb_strlen($_POST['self_introduction']) > SELF_INTRODUCTION){

    $errorMsg[] = "コメントは".SELF_INTRODUCTION."文字までです";

}


if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/profile_edit.php");
}else{
    
    if(User::update($params)){
        header("Location: ../../view/profile.php?id=$current_user->id");

    }else{
        $errorMsg = ["ユーザー情報の更新に失敗しました"];
        fnc_setData("session", "errorMsg", $errorMsg);
        header("Location: ../../view/profile_edit.php");
    }

}




?>