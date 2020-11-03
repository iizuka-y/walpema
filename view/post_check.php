<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜投稿内容確認</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>
    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        
        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php">ユーザー</a>><a href="post.php">壁紙投稿</a>><a href="post_check.php">壁紙投稿確認</a>
        </div>

        <div id="user-container">
            
            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み ?>

            <div class="postcheck-content nav-content">
                <h2>投稿確認</h2>
                <div class="img-box">
                    <img src="../images/windows xp.jpg">
                </div>

                <div class="kindOfWp">
                    PC用壁紙
                </div>

                <div class="postcheck-item">
                    <h3>タイトル</h3>
                    <p>windows xpの壁紙</p>
                </div>

                <div class="postcheck-item">
                    <h3>説明</h3>
                    <p>世界一有名なあの壁紙です。</p>
                </div>

                <div class="postcheck-item">
                    <h3>タグ</h3>
                    <ul class="cp_tag01">
                        <li><a href="#">windows</a></li>
                    </ul>
                </div>

                <div class="postcheck-item">
                    <h3>価格</h3>
                    <p>1000円</p>
                </div>

                <div class="postBtn-box">

                    <form method="post" action="post.php">
                        <input type="submit" value="訂正する" class="modify">
                    </form>

                    <form method="post" action="profile.php">
                        <input type="submit" value="投稿する" class="submit">
                    </form>

                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        

    </body>
</html>