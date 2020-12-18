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

if(!$follow_record = Follow::find($params)){
    header("Location: ../../view/index.php");
    exit();
}

// favoriteテーブルから削除
if(Follow::delete($follow_record->id)){
    if(isset($_POST['from_followList'])){
        header("Location: ../../view/follow.php?type=follow&user_id=".$current_user->id);
        exit();
    }
    header("Location: ../../view/profile.php?id=".$user->id);
}


?>