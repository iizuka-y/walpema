<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜壁紙投稿</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/image-preview.js"></script>
        <script type="text/javascript" src="../js/validate.js"></script>
    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php">ユーザー</a>><a href="post.php">壁紙投稿</a>
        </div>

        <div id="user-container">

            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み ?>

            <div class="nav-content">
                <form method="post" action="m-postcheck.html">
                    <div class="input-box">
                        <label>画像を投稿する</label>
                        <input type="file" class="file">
                        <div id="img-field">
                            <i class="fas fa-image"></i>
                        </div>
                    </div>

                    <div class="input-box">
                        <label>タイトル</label>
                        <input type="text" class="title">
                        <span class="titleMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>説明</label>
                        <textarea placeholder="150字以内で入力" class="explanation"></textarea>
                        <span class="explanationMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>タグ</label>
                        <input type="text" class="tag">
                        <span class="tagMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>価格</label>
                        <input type="text" class="price">円
                        <span class="priceMsg"></span>
                    </div>

                    <div class="input-box">
                        <div class="radio-box">
                            <input type="radio" value="pc" class="radio" name="device" checked><div>PC</div>
                        </div>

                        <div class="radio-box">
                            <input type="radio" value="smartphone" class="radio" name="device"><div>スマホ</div>
                        </div>
                    </div>

                    <div class="input-box">
                        <input type="submit" class="submit">
                    </div>

                </form>
            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>