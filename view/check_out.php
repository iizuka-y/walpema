<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜カート</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/cart.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="wallpaper_detail.php">商品詳細</a>><a href="cart.php">カート</a>><a href="check_out.php">注文確認</a>
        </div>

        <div id="wrap">

            <div id="cart">
                <h2>以下の内容で注文を確定します</h2>
                <div id="user-info">
                    <h3>お支払い方法</h3>
                    <div>クレジットカード</div>
                    <div>番号：xxxx-xxxx-xxxx-9999</div>
                    <div><a href="payment_edit.php">支払い方法を編集</a></div>
                </div>

                <div id="cart-wallpaper">
                    <h3>注文内容</h3>
                    
                    <div class="wallpaper">
                        <figure>
                            <img src="../images/windows xp.jpg">
                        </figure>
                        <div class="cart-text">
                            <p>windowsXPの壁紙</p>
                            <p>￥300</p>
                            <form method="post" action="cart.html">
                                <input type="submit" value="カートから削除">
                            </form>
                        </div>
                    </div>
                    
                    <div class="wallpaper">
                        <figure>
                            <img src="../images/Mac-Pro-macOS-Catalina-Wallpaper.jpg">
                        </figure>
                        <div class="cart-text">
                            <p>Mac Proの壁紙</p>
                            <p>￥300</p>
                            <form method="post" action="cart.html">
                                <input type="submit" value="カートから削除">
                            </form>
                        </div>
                    </div>
                    
                    <div class="wallpaper">
                        <figure>
                            <img src="../images/Sierra.jpg">
                        </figure>
                        <div class="cart-text">
                            <p>ちょっと前のMacの壁紙</p>
                            <p>￥300</p>
                            <form method="post" action="cart.html">
                                <input type="submit" value="カートから削除">
                            </form>
                        </div>
                    </div>

                    <div id="buy">
                        <div>
                            <p>合計</p>
                            <p class="price">￥900</p>

                            <form action="index.php" method="POST">
                                <input type="submit" value="注文を確定">
                            </form>
                        </div>
                    </div>
                    
                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>