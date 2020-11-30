<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

$user = $current_user;

if(!$user){
    header("Location: index.php");
}

// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}

// 確認画面から戻ってきた場合
if(isset($_POST['modify'])){
    $params = [
        'item_name' => $_POST['name'],
        'price' => $_POST['price'],
        'explanation' => $_POST['explanation'],
        'image' => $_POST['image']
    ];

    // アップロードした画像は削除
    if(file_exists('../'.$_POST['image'])){
        unlink('../'.$_POST['image']);
    }
}


?>


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
        <!-- <script type="text/javascript" src="../js/validate.js"></script> -->
    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php?id=<?php print $user->id ?>">ユーザー</a>><a href="post.php">壁紙投稿</a>
        </div>

        <div id="user-container">

            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み ?>

            <div class="nav-content">

                <ul id="errorMsg-box">
                    <?php if(isset($errorMsgs)): ?>
                        <?php foreach($errorMsgs as $errorMsg): ?>
                            <li><?php print $errorMsg?></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>

                <form method="post" action="../app/controller/post_validate.php" enctype="multipart/form-data">
                    <div class="input-box">
                        <label>画像を投稿する</label>
                        <input type="file" class="file" name="upfile">
                        <div id="img-field">
                            <img src="../images/img-icon.png" class="preview">
                        </div>
                    </div>

                    <div class="input-box">
                        <label>タイトル</label>
                        <input type="text" class="title" name="name">
                        <span class="titleMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>説明</label>
                        <textarea placeholder="150字以内で入力" class="explanation" name="explanation"></textarea>
                        <span class="explanationMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>タグ</label>
                        <input type="text" class="tag">
                        <span class="tagMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>価格</label>
                        <input type="text" class="price" name="price">円
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