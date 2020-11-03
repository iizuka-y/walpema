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

                <form action="new-login-check.html" method="POST">

                    <input type="text" placeholder="ユーザID" class="user_id">
                    <span class="userIdMsg"></span>

                    <input type="text" placeholder="パスワード" class="password">
                    <span class="passwordMsg"></span>

                    <input type="text" placeholder="メールアドレス" class="email">
                    <span class="emailMsg"></span>

                    <input type="submit" value="登録内容確認" class="login-btn">

                </form>

                    <a href="login.html">ログインに戻る</a>

                </div>


            </div>

        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>