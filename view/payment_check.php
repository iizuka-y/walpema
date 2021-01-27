<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/sales_management.php');

function return_error(){
    $errorMsg[] = "入力値が不正です";
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: manage_payment.php");
    exit();
}

if(!$current_user){
    header("Location: index.php");
    exit();
}

if(!isset($_POST['deposit_money'])){
    header("Location: index.php");
    exit();
}

if(!isset($_POST['part-of-money'])){
    header("Location: index.php");
    exit();
}


if(!preg_match('/^[0-9]+$/', $_POST['part-of-money'])){
    return_error();
}

if($_POST['deposit_money']){
    if(!preg_match('/^[0-9]+$/', $_POST['deposit_money'])){
        return_error();
    }
    $deposit_money = $_POST['deposit_money'];
}else{
    $deposit_money = $_POST['part-of-money'] * 100;
}

$balance = get_possession_money() - $deposit_money;

if($balance < 0){
    return_error();
}



?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜壁紙投稿</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/payment_check.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        
    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <main>
            <div class="first">
                <h2>売上金入金</h2>
            
                <div class="uriage-box">
                    <div class="left-box">
                        <div class="shozikin">
                            <p class="setumei">
                                現在所持している売上金
                            </p>
                            <p class="uriagekin">
                                ￥<?php print get_possession_money() ?>
                            </p>
                        </div>
                        <div class="shozikin">
                            <p class="setumei">入金する売上金</p><p class="uriagekin">￥<?php print $deposit_money ?></p>
                        </div>
                        <div class="shozikin">
                            <p class="setumei">売上金残高</p><p class="uriagekin">￥<?php print $balance ?></p>
                        </div>
                    </div>
                    <p class="hurikomi">上記の金額を以下の口座に振り込みます。</p>



                    <table border="1">
                    　<tr>
                    　　<td>金融機関名</td>
                    　　<td>三井</td>
                    　</tr>
                    　<tr>
                    　　<td>支店</td>
                    　　<td>東京</td>
                    　</tr>
                    　<tr>
                    　　<td>口座種別</td>
                    　　<td>普通</td>
                    　</tr>
                    　<tr>
                    　　<td>名義人名（カナ）</td>
                    　　<td>ウォル・ペマ</td>
                    　</tr>
                    　<tr>
                    　　<td>口座番号</td>
                    　　<td>０００００</td>
                    　</tr>
                    </table>


                    <form action="../app/controller/payment_processing.php" method="post">
                        <input type="hidden" value="<?php print $deposit_money ?>" name="deposit_money">
                        <input class="button" type="submit" value="入金を確定" />
                    </form>
                    <div class="return-link">
                        <a class="tourokugamen" href="#">口座登録・確認・編集</a>
                        <a class="return" href="sales_management.php">売上金確認画面に戻る</a>
                    </div>
                </div>
            </div>
        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>