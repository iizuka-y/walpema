<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜通知</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/notice.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
		
		<div class="bread-nav">
            <a href="index.php">トップ</a>><a href="notice.php">通知</a>
        </div>

        <div id="wrap">

            <div id="notice">
                <h2>通知</h2>

                <div id="notice-list">
                    <div class="content">
                        <div class="date">
                            <p>2020/10/05/11:05</p>
                        </div>

                        <div class="img-text">
                            <figure>
                                <img src="../images/windows xp.jpg" alt="windows"> 
                            </figure>
                            
                            <div class="text">
                                <p>○○さんがあなたの作品をお気に入り登録しました。</p>
                            </div>
                        </div>

                    </div>

                    <div class="content">
                        <div class="date">
                            <p>2020/10/05/11:05</p>
                        </div>

                        <div class="img-text">
                            <figure>
                                <img src="../images/windows xp.jpg" alt="windows"> 
                            </figure>
                            
                            <div class="text">
                                <p>○○さんがあなたの作品を購入しました。</p>
                            </div>
                        </div>

                    </div>

                    <div class="gap">
                    </div>

                </div>
            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>