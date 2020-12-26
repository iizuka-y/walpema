<?php
require_once('before_view.php');
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/Item.php');

if(!isset($_POST['name']) || !isset($_POST['price']) || !isset($_POST['explanation']) || !isset($_POST['image']) || !isset($_POST['tag'])){
    $errorMsg = ["壁紙投稿に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/post.php");
    exit();
}

$item_params = [
    'item_name' => $_POST['name'],
    'user_id' => $current_user->id,
    'price' => $_POST['price'],
    'explanation' => $_POST['explanation'],
    'image' => $_POST['image']
];


if(Item::create($item_params)){
    
    create_tag();
    header("Location: ../../view/profile.php?id=$current_user->id");

}else{
    $errorMsg = ["壁紙投稿に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/post.php");
}

function create_tag(){
    global $item_params;
    $item = Item::find($item_params);
    
    // tagの整理
    $tags = $_POST['tag'];
    $tags = explode(",", $tags); // カンマ区切りを配列にする

    foreach($tags as $tag){
        $tag_params = [
            'item_id' => $item->id,
            'tag_name' => $tag
        ];

        if(!Tag::create($tag_params)){
            return false;
        }
    }
    
    return true;
}


?>