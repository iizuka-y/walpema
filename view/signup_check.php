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

                    <form action="signup_comp.php" method="POST">

                        <p>ユーザID</p>

                        <p>パスワード</p>

                        <p>メールアドレス</p>
        
                        <input type="submit" value="登録" class="login-btn">
        
                    </form>

                    <a href="signup.php">新規登録に戻る</a>

                </div>


            </div>

        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>