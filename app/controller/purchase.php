<?php
require_once('before_view.php');
require_once('../fn_components/cart_processing.php');

// もしもログインできていない場合
if(!isset($current_user)){
    header("Location: ../../view/index.php");
}

// カート内の商品を取得
$items = get_cartItem();

// カートに一つしか商品が入ってなくて購入直前に商品が出品者に消された場合
if(empty($items)){
    $errorMsg = ["カートの中身が空です。"];
    fnc_setData('session', 'errorMsg', $errorMsg);
    header("Location: ../../view/error_page.php");
    exit();
}


// purchase_historyテーブルに保存
foreach($items as $item){
    $params = [
        'user_id' => $current_user->id,
        'item_id' => $item->id
    ];

    if(!Purchase_history::create($params)){
        // 購入が失敗したときの処理
        $errorMsg = ["購入処理に失敗しました。"];
        fnc_setData('session', 'errorMsg', $errorMsg);
        header("Location: ../../view/error_page.php");
        exit();
    }

    // 購入に成功した商品から順にカートから商品を削除する
    del_cartItem('an_item', $item->id);
}


// メールの送信処理(後日実装予定)






header("Location: ../../view/my-bought-wallpaper.php");

?>