<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/get_senddata.php');
require_once(dirname(__FILE__).'/../config/validate_config.php');


// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}

if(isset($_SESSION["sendData"])){
    $sendData = fnc_getData("session", "sendData");
    fnc_delData("session", "sendData", "");
}


?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜アカウント作成</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/validate.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <main>

            <div id="wrap">

                <h2>アカウント作成</h2>

                <div id="login">
                
                    <ul id="errorMsg-box">
                    <?php if(isset($errorMsgs)): ?>
                        <?php foreach($errorMsgs as $errorMsg): ?>
                            <li><?php print $errorMsg?></li>
                        <?php endforeach ?>
                    <?php endif ?>
                    </ul>

                    <form action="../app/controller/signup_validate.php" method="POST">

                        <input type="text" placeholder="ユーザ名" class="user_name" name="user_name" value="<?php print get_sendData('user_name') ?>">
                        <span class="userNameMsg errorMsg"></span>

                        <input type="text" placeholder="メールアドレス" class="email" name="email" value="<?php print get_sendData('email') ?>">
                        <span class="emailMsg errorMsg"></span>

                        <input type="password" placeholder="パスワード(4文字以上)" class="password" name="password" maxlength='<?php print MAX_PASSWORD ?>'>
                        <span class="passwordMsg errorMsg"></span>

                        <input type="submit" value="登録内容確認" class="login-btn">

                    </form>

                    <a href="login.php">ログインに戻る</a>

                </div>


            </div>

        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>