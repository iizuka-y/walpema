<?php
require_once('before_view.php');

if(!isset($current_user) || !isset($_POST['item_id'])){
    header("Location: ../../view/index.php");
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

if(!$fav = Favorite::find($params)){
    header("Location: ../../view/index.php");
    exit();
}

// favoriteテーブルから削除
if(Favorite::delete($fav->id)){
    header("Location: ../../view/wallpaper_detail.php?id=".$item->id);
}


?>