<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
if(!isset($_GET['id'])){
    header("Location: index.php");
}
$user_id = $_GET['id'];
$user = User::findbyId($user_id);

if(!$user){
    header("Location: index.php");
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜投稿した壁紙</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/main.js"></script>
    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php">ユーザー</a>><a href="profile.php">投稿した壁紙</a>
        </div>

        <div id="user-container">

            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php
            if($user['id'] === $current_user['id']){
                require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み
            }
            ?>

            <div class="nav-content flex">
                <div class="img-container">
                    <a href="wallpaper_detail.php">
                        <div class="img-box">
                            <img src="../images/windows xp.jpg">
                        </div>
                        <div class="img-name">Windows XP</div>
                    </a>
                </div>
                <div class="img-container">
                    <a href="wallpaper_detail.php">
                        <div class="img-box">
                            <img src="../images/Mac-Pro-macOS-Catalina-Wallpaper.jpg">
                        </div>
                        <div class="img-name">Catalina</div>
                    </a>
                </div>
                <div class="img-container">
                    <a href="wallpaper_detail.php">
                        <div class="img-box">
                            <img src="../images/windows xp.jpg">
                        </div>
                        <div class="img-name">Windows XP</div>
                    </a>
                </div>
                <div class="img-container">
                    <a href="wallpaper_detail.php">
                        <div class="img-box">
                            <img src="../images/Sierra.jpg">
                        </div>
                        <div class="img-name">sierra</div>
                    </a>
                </div>
                <div class="img-container">
                    <a href="wallpaper_detail.php">
                        <div class="img-box">
                            <img src="../images/windows xp.jpg">
                        </div>
                        <div class="img-name">Windows XP</div>
                    </a>
                </div>
                <div class="img-container">
                    <a href="wallpaper_detail.php">
                        <div class="img-box">
                            <img src="../images/windows xp.jpg">
                        </div>
                        <div class="img-name">Windows XP</div>
                    </a>
                </div>
            </div>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>