<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/sales_management.php');

// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}

if(!$current_user){
    header("Location: index.php");
    exit();
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜売上金入金</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/manage-payment.css">

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
                    <ul id="errorMsg-box">
                        <?php if(isset($errorMsgs)): ?>
                            <?php foreach($errorMsgs as $errorMsg): ?>
                                <li><?php print $errorMsg ?></li>
                            <?php endforeach ?>
                        <?php endif ?>
                    </ul>
                    <div class="shozikin">
                        <p class="setumei">
                            現在所持している売上金
                        </p>
                        <p class="uriagekin">￥<?php print get_possession_money() ?></p>
                    </div>

                    <form action="payment_check.php" method="post">
                        <div class="sentaku">
                            <label class="radio-1">
                                <input type="radio" name="deposit_money" value="<?php print get_possession_money() ?>" checked="" />
                                売上金全額(￥<?php print get_possession_money() ?>)を入金する
                            </label><br>
                            <label class="radio-2">
                                <input type="radio" name="deposit_money" value=""/>
                                売上金の一部を入金する
                            </label>
                            ￥
                            <input class="number-in" type="number" onkeydown="return event.keyCode !== 69" name="part-of-money" minlength="3" maxlength="6" min="1" value="1"/><b>00</b>
                        </div>
                        <br>
                        <input class="button" type="submit" value="入金" />
                    </form>
                    
                    <div class="return-link">
                        <a class="tourokugamen" href="#">
                            口座登録・確認・編集
                        </a>
                        <a class="return" href="sales_management.php">
                            売上金確認画面に戻る
                        </a>
                    </div>
                </div>
            </div>
        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>