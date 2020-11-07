<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜アカウント作成成功</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/new-login-comp.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <main>

            <div id="wrap">

                <h2>アカウントを作成しました</h2>

                <div id="login">
					
					<div id="title">
						ウォルペマへようこそ！
					</div>
					<div id="text">
						あなたは画像の投稿や画像の購入等、<br>
						全てのサービスを利用出来るようになりました！
					</div>

                    <form action="index.php" method="get">
        
                        <input type="submit" value="トップ画面" class="login-btn">
        
                    </form>

                </div>


            </div>

        </main>

       
        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>