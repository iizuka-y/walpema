<?php
require_once('before_view.php');

if(!isset($_POST['item_id'])){
    header("Location: ../../view/index.php");
    exit();
}

$item = Item::findById($_POST['item_id']);

// カートに入れる直前に商品が削除されてしまった場合
if(!$item){
    header("Location: ../../view/index.php");
    exit();
}

if(isset($current_user)){
    // ログインしている場合はデータベースに保存
    $params = [
        'item_id' => $item->id,
        'user_id' => $current_user->id
    ];

    if(Cart::create($params)){
        header("Location: ../../view/cart.php");
    }else{
        header("Location: ../../view/index.php");
    }

}else{
    // ログインしていない場合はSESSIONに保存
    if(!isset($_SESSION['cart'])){
        $ser_cartItem[] = serialize($item);
        fnc_setData("session", "cart", $ser_cartItem);
        header("Location: ../../view/cart.php");
    }else{
        $ser_cartItems = fnc_getData("session", "cart"); // セッションから取り出したカート商品はシリアライズ化されているので注意
        // シリアライズを解除
        foreach($ser_cartItems as $ser_cartItem){
            $items[] = unserialize($ser_cartItem);
        }

        $items[] = $item;
        $ser_cartItems = [];

        // 再びシリアライズ化してセッションに保存
        foreach($items as $item){
            $ser_cartItems[] = serialize($item);
        }
        fnc_setData("session", "cart", $ser_cartItems);
        header("Location: ../../view/cart.php");
    }

}

?>