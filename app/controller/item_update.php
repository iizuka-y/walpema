<?php
require_once('before_view.php');
require_once('../../config/validate_config.php');
require_once('../fn_components/file_upload.php');

$errorMsg = array();

if(!isset($_POST) || !isset($current_user)){
    header("Location: ../../view/index.php");
    exit();
}

if(!$item = Item::findById($_POST['item_id'])){
    header("Location: ../../view/wallpaper_edit.php");
    $errorMsg[] = "ユーザー情報の更新に失敗しました";
    fnc_setData("session", "errorMsg", $errorMsg);
    exit();
}

$errorMsg = array();

// 送信された画像を取り扱う処理
$img_path = file_upload($_FILES['upfile']);

if(!$img_path){
    $img_path = $item->image;
    $imgChangeFlg = false;
}else{
    $imgChangeFlg = true;
    $oldImg = $item->image;
}


$params = [
    'id' => $item->id,
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

if(!$_POST['tag']){
    $errorMsg[] = "タグが入力されていません";
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

if(!preg_match('/^[0-9]+$/', $_POST['price'])){

    $errorMsg[] = "価格の値が不正です";

}


if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/wallpaper_edit.php");
}else{
    
    if(Item::update($params)){
        // 商品画像が更新された場合、uploadフォルダ内の前の画像は削除
        if(file_exists('../../'.$oldImg) && $imgChangeFlg){
            unlink('../../'.$oldImg);
        }

        update_tag(); // タグの更新をする

        header("Location: ../../view/wallpaper_detail.php?id=$item->id");

    }else{
        $errorMsg = ["ユーザー情報の更新に失敗しました"];
        fnc_setData("session", "errorMsg", $errorMsg);
        header("Location: ../../view/wallpaper_edit.php");
    }

}


// タグの更新処理
// 壁紙についていたタグを全て削除して新しく作成する
function update_tag(){
    global $item;
    $current_tags = $item->tags();

    $tags = $_POST['tag'];
    $tags = explode(",", $tags); // カンマ区切りを配列にする

    // タグが更新されているかのチェック(更新されてないのにタグを削除してまた作るのは無駄なので)
    if(!tag_update_check()){
        return false;
    }

    // 現在のタグの削除
    foreach($current_tags as $current_tag){
        Tag::delete($current_tag->id);
    }

    // 新しくタグを作成
    foreach($tags as $tag){
        $tag_params = [
            'item_id' => $item->id,
            'tag_name' => $tag
        ];

        Tag::create($tag_params);
    }
    
}

// タグが更新されているかのチェック
function tag_update_check(){
    global $item;
    $current_tags = $item->tags();
    $current_tagNames = [];
    foreach($current_tags as $current_tag){
        $current_tagNames[] = $current_tag->name;
    }

    $current_tagNamesCsv = implode(",", $current_tagNames); // 配列をCSVに変換


    if($_POST['tag'] === $current_tagNamesCsv){
        return false; // 変更されていなければfalse
    }

    return true; // 変更されていたらtrueを返す

}




?>