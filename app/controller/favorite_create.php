<?php
require_once('before_view.php');

if(!isset($current_user) || !isset($_POST['item_id'])){
    header("Location: ../../view/login.php");
    exit();
}

$item = Item::find(['id' => $_POST['item_id']]);

if(!$item){
    header("Location: ../../view/index.php");
    exit();
}

$params = [
    'user_id' => $current_user->id,
    'item_id' => $item->id
];

// favoriteテーブルに保存
if(!Favorite::create($params)){

    //失敗した場合
    $errorMsg = ["お気に入り登録に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/error_page.php");
    exit();
}


// お知らせテーブルのレコード作成(ただし自分の投稿以外なら)
if($item->user_id != $current_user->id){
    
    $fav_record = Favorite::find($params);
    $notification_params = [
        'user_id' => $item->user()->id,
        'notified_id' => $current_user->id,
        'item_id' => $item->id,
        'notified_type' => 'fav',
        'fav_id' => $fav_record->id
    ];

    Notification::create($notification_params);
}


header("Location: ../../view/wallpaper_detail.php?id=".$item->id);


?>