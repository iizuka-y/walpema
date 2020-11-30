<?php
function get_cartItem(){
    global $current_user;
    $items = [];

    if(isset($current_user)){
        // ログイン中ならデータベースからカートの内容を取得
        $cart_items = Cart::where(['user_id' => $current_user->id]);
    
        // itemテーブルのデータを取得する
        foreach($cart_items as $cart_item){
            $items[] = Item::findById($cart_item->item_id);
        }
    }else if(isset($_SESSION['cart'])){
        // ログインしてなければSESSIONからカートの内容を取得(ログイン中は$_SESSION['cart']は空)
        $ser_items = fnc_getData("session", "cart"); // セッションから取り出したカート商品はシリアライズ化されているので注意
        // シリアライズを解除
        foreach($ser_items as $ser_item){
            $items[] = unserialize($ser_item);
        }
    }

    return $items;

}


function del_cartItem($del_itemId, $del_type = ''){
    global $current_user;
    // ログイン中ならデータベースの内容を削除
    // ログイン中＆カートの商品を一個だけ削除の場合
    if(isset($current_user) && $del_type != 'all' ){
    
        $delete_item = Cart::find(['item_id' => $del_itemId, 'user_id' => $current_user->id]);
        if(!Cart::delete($delete_item->id)){
            header("Location: index.php");
            exit();
        }
        return true;

    }

    // ログイン中＆カートの商品を全部削除する場合
    if(isset($current_user) && $del_type == 'all'){

        $delete_items = Cart::where(['user_id' => $current_user->id]);
        foreach($delete_items as $delete_item){
            if(!Cart::delete($delete_item->id)){
                header("Location: index.php");
                exit();
            }
        }
        return true;

    }


    // ログインしてなければセッションを削除
    // ログインしてない＆カートの商品を一個だけ削除の場合
    if(!isset($_SESSION['cart'])){
        return false;
    }

    if(!isset($current_user) && $del_type != 'all'){

        $ser_items = fnc_getData("session", "cart"); // セッションから取り出したカート商品はシリアライズ化されているので注意
        // シリアライズを解除
        foreach($ser_items as $ser_item){
            $items[] = unserialize($ser_item);
        }

        foreach($items as $item){
            if($item->id === $del_itemId) continue;
            $cartItems[] = $item;
        }
    
        if(isset($cartItems)){
            // シリアライズ化
            foreach($cartItems as $cartItem){
                $ser_cartItems[] = serialize($cartItem);
            }
            fnc_setData("session", "cart", $ser_cartItems);
        }else{
            // １つだけしかない商品をカートから削除してカートの中身が空になった場合
            fnc_delData("session", "cart");
        }
        return true;
    }

    // ログインしていない＆カートの商品を全部削除する場合
    if(!isset($current_user) && $del_type == 'all'){
        fnc_delData("session", "cart");
        return true;
    }

    return false;
}

?>