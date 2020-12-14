<?php
require_once('before_view.php');

if(!isset($current_user) || !isset($_POST['user_id'])){
    header("Location: ../../view/login.php");
    exit();
}

$user = User::findById($_POST['user_id']);

if(!$user){
    header("Location: ../../view/index.php");
    exit();
}

$params = [
    'following_id' => $current_user->id,
    'followed_id' => $user->id
];

// followテーブルに保存
if(Follow::create($params)){
    header("Location: ../../view/profile.php?id=".$user->id);
}


?>