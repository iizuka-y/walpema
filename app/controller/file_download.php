<?php
require_once(dirname(__FILE__).'/before_view.php');
require_once(dirname(__FILE__).'/../fn_components/file_download.php');

if(!isset($current_user)){
    header("Location: ../../view/index.php");
    exit();
}

if(!isset($_POST['item_id'])){
    header("Location: ../../view/index.php");
    exit();
}

$params = [
    'user_id' => $current_user->id,
    'item_id' => $_POST['item_id']
];
if(!Purchase_history::find($params)){
    header("Location: ../../view/index.php");
    exit();
}

$item = Item::findById($_POST['item_id']);

// $itemをダウンロード
file_download($item);


?>