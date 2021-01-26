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
        'item_id' => $item->id,
        'seller_id' => $item->user()->id
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

    // お知らせテーブルのレコード作成
    $purchase_record = Purchase_history::find($params);
    $notification_params = [
        'user_id' => $item->user()->id,
        'notified_id' => $current_user->id,
        'item_id' => $item->id,
        'notified_type' => 'purchase',
        'purchase_id' => $purchase_record->id
    ];

    Notification::create($notification_params);

    // moneyテーブルのレコード作成
    $money_params = [
        'user_id' => $item->user()->id,
        'transaction' => $item->price
    ];
    Money::create($money_params);
}


// メールの送信処理(後日実装予定)




fnc_setData('session', 'purchase_complete', '購入完了');

header("Location: ../../view/my-bought-wallpaper.php");

?>