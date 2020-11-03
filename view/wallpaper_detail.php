<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜作品詳細</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/wallpaper_detail.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/fav.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="wallpaper_detail.php">作品詳細</a>
        </div>

        <div id="wrap">
            
            <div id="w-detail">

                <h2>画像タイトル</h2>

                <div id="cart">
                    
                    <div class="wallpaper">
                        <img src="../images/windows xp.jpg" alt="windows">
                    </div>
    
                    <div class="details">
                        <div class="contributor">
                            <a href="user.html">
                                <img src="../images/pien_uruuru_woman.png" alt="icon">
                                <p>HAL花子</p>
                            </a>
                        </div>
    
                        <div class="text">
                            <h3>作品詳細</h3>
                            <p>世界で一番有名な壁紙です。草原のように見えますがぶどう畑らしいです。パソコンをwindows xpっぽくしたい人はどうぞ。
                            </p>
                        </div>

                        <div id="favorite">
                            <img src="../images/fav-0.png" class="fav">
                            お気に入り登録する
                        </div>

                    </div>

                </div>

                    <div id="tag-buy">
                        <div id="tag">
                            <ul class="cp_tag01">
                                <li><a href="#">タグ</a></li>
                                <li><a href="#">tag</a></li>
                                <li><a href="#">長いタイプのタグ</a></li>
                                <li><a href="#">犬</a></li>
                                <li><a href="#">風景</a></li>
                                <li><a href="#">タグ</a></li>
                                <li><a href="#">tag</a></li>
                                <li><a href="#">長いタイプのタグ</a></li>
                                <li><a href="#">犬</a></li>
                                <li><a href="#">風景</a></li>
                            </ul>
                        </div>

                        <div id="buy">
                            <p>￥300</p>
                            <form action="cart.html" method="POST">
                                <input type="submit" value="カートに入れる" name="cart" class="submit">
                            </form>
                        </div>
                    </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>