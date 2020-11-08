<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');


// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜ログイン</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <!-- <script type="text/javascript" src="../js/validate.js"></script> -->

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <main>

            <div id="wrap">

                <h2>サイトログイン</h2>

                <div id="login">

                    <ul id="errorMsg-box">
                    <?php foreach($errorMsgs as $errorMsg): ?>
                        <li><?php print $errorMsg?></li>
                    <?php endforeach ?>
                    </ul>

                    <form action="../app/controller/login_validate.php" method="POST">

                        <input type="text" placeholder="メールアドレス" class="email" name="email">
                        <span class="emailMsg"></span>

                        <input type="password" placeholder="パスワード" class="password" name="password">
                        <span class="passwordMsg"></span>

                        <input type="submit" value="ログイン" class="login-btn">

                    </form>

                    <a href="signup.php">新規登録</a>

                </div>


            </div>

        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>