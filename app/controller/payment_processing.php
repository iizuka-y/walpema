<?php
require_once('before_view.php');

if(!isset($_POST['deposit_money']) || !isset($current_user)){
    header("Location: ../../view/index.php");
    exit();
}

$transaction = - $_POST['deposit_money'];

$params = [
    'user_id' => $current_user->id,
    'transaction' => $transaction,
];

if(!Money::create($params)){
    //失敗した場合
    $errorMsg = ["入金に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/error_page.php");
    exit();
}

fnc_setData("session", "deposit_money", $_POST['deposit_money']);
header("Location: ../../view/payment_comp.php");




?>