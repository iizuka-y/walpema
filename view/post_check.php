<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(isset($_SESSION["params"])){
    $params = fnc_getData("session", "params");
    fnc_delData("session", "params", "");
}else{
    header("Location: signup.php");
    exit();
}

// 送信用にタグを配列からCSVに戻す
$tagCsv = implode(",", $params['tags']);

?>

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

            <div class="postcheck-content nav-content">
                <h2>投稿確認</h2>
                <div class="img-box">
                    <img src="../<?php print $params['image'] ?>">
                </div>

                <div class="postcheck-item">
                    <h3>タイトル</h3>
                    <p><?php print $params['item_name'] ?></p>
                </div>

                <div class="postcheck-item">
                    <h3>説明</h3>
                    <p><?php print $params['explanation'] ?></p>
                </div>

                <div class="postcheck-item">
                    <h3>タグ</h3>
                    <ul class="cp_tag01">
                        <?php foreach($params['tags'] as $tag ): ?>
                        <li><a href="#"><?php print $tag ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>

                <div class="postcheck-item">
                    <h3>価格</h3>
                    <p><?php print $params['price'] ?>円</p>
                </div>

                <div class="postBtn-box">

                    <form method="post" action="post.php">
                        <input type="hidden" value="<?php print $params['item_name'] ?>" name="name">
                        <input type="hidden" value="<?php print $params['price'] ?>" name="price">
                        <input type="hidden" value="<?php print $params['explanation'] ?>" name="explanation">
                        <input type="hidden" value="<?php print $params['image'] ?>" name="image">
                        <input type="hidden" value="<?php print $tagCsv ?>" name="tag">

                        <input type="hidden" name="modify">
                        <input type="submit" value="訂正する" class="modify">
                    </form>

                    <form method="post" action="../app/controller/item_create.php">
                        <input type="hidden" value="<?php print $params['item_name'] ?>" name="name">
                        <input type="hidden" value="<?php print $params['price'] ?>" name="price">
                        <input type="hidden" value="<?php print $params['explanation'] ?>" name="explanation">
                        <input type="hidden" value="<?php print $params['image'] ?>" name="image">
                        <input type="hidden" value="<?php print $tagCsv ?>" name="tag">

                        <input type="submit" value="投稿する" class="submit">
                    </form>

                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        

    </body>
</html>