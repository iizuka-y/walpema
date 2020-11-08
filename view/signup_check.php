<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(isset($_SESSION["params"])){
    $params = fnc_getData("session", "params");
    fnc_delData("session", "params", "");
}else{
    header("Location: signup.php");
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜新規登録内容確認</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/login.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        
        <main>

            <div id="wrap">

                <h2>登録内容確認</h2>

                <div id="login">

                    <form action="../app/controller/user_create.php" method="POST">

                        <p>以下の内容で登録します。</p>

                        <p>ユーザ名<br><br><?php print $params['user_name'] ?></p>
                        <input type="hidden" name="user_name" value="<?php print $params['user_name'] ?>">

                        <p>メールアドレス<br><br><?php print $params['email'] ?></p>
                        <input type="hidden" name="email" value="<?php print $params['email'] ?>">

                        <input type="hidden" name="password" value="<?php print $params['password'] ?>">

                        <input type="submit" value="登録" class="login-btn">
        
                    </form>

                    <a href="signup.php">新規登録に戻る</a>

                </div>


            </div>

        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>