<?php
require_once(dirname(__FILE__).'/../fn_components/session_cookie.php');
require_once(dirname(__FILE__).'/../class/User.php');
require_once(dirname(__FILE__).'/../fn_components/cart_processing.php');


if(!isset($_POST['email']) || !isset($_POST['password'])){
    header("Location: login.php");
    exit();
}

$params = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
];

$errorMsg = array();

// 空文字バリデーション
if(!$_POST['email']){
    $errorMsg[] = "メールアドレスが入力されていません";
}

if(!$_POST['password']){
    $errorMsg[] = "パスワードが入力されていません";
}


if(!empty($errorMsg)){
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/login.php");
}else{
    $user = User::find($params);
    // print_r($user);
    if($user){
        // sessionのカートに商品が入っていた場合はDBのカートテーブルに移す。
        cartChangeToDB();

        fnc_setData("session", "login_userId", $user->id);
        header("Location: ../../view/index.php");
    }else{
        $errorMsg = ["メールアドレスまたはパスワードが間違っています"];
        fnc_setData("session", "errorMsg", $errorMsg);
        header("Location: ../../view/login.php");
    }

}


function cartChangeToDB(){
    global $user;
    $cart_items = get_cartItem();
    foreach($cart_items as $cart_item){
        $params = [
            'user_id' => $user->id,
            'item_id' => $cart_item->id
        ];
        if(!Purchase_history::find($params)){
            // すでに買ったことがある商品はカートに入れない
            Cart::create($params);
        }
        
    }
}


?>