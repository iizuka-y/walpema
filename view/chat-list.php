<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

$user = $current_user;

if(!$user){
    header("Location: index.php");
}

?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜マイページ</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php?id=<?php print $user->id ?>">ユーザー</a>
        </div>

        <div id="user-container">
            
            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み ?>

            <div class="nav-content">
                <ul>
                    <li class="chat">
                        <a href="chat.php">
                            <div class="chat-box">
                                <img src="../images/windows xp.jpg">
                                <div class="chat-box-main">
                                    <div class="chat-user-name">
                                        ユーザー1
                                    </div>
                                    <div class="chat-content">
                                        値下げしてください！(怒)
                                    </div>
                                    <div class="chat-others">
                                        2020/09/15/15:20
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="chat">
                        <a href="chat.php">
                            <div class="chat-box">
                                <img src="../images/transparent.jpg">
                                <div class="chat-box-main">
                                    <div class="chat-user-name">
                                        ユーザー2
                                    </div>
                                    <div class="chat-content">
                                        10円にしてください
                                    </div>
                                    <div class="chat-others">
                                        2020/09/10/11:34
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="chat">
                        <a href="chat.php">
                            <div class="chat-box">
                                <img src="../images/pien_uruuru_woman.png">
                                <div class="chat-box-main">
                                    <div class="chat-user-name">
                                        ユーザー3
                                    </div>
                                    <div class="chat-content">
                                        少し高いです
                                    </div>
                                    <div class="chat-others">
                                        2020/09/09/16:19
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="chat">
                        <a href="chat.php">
                            <div class="chat-box">
                                <img src="../images/distance_kankaku_seki.png">
                                <div class="chat-box-main">
                                    <div class="chat-user-name">
                                        ユーザー4
                                    </div>
                                    <div class="chat-content">
                                        ありがとうございました。
                                    </div>
                                    <div class="chat-others">
                                        2020/09/04/10:30
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>