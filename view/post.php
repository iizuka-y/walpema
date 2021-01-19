<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/get_senddata.php');

$user = $current_user;

if(!$user){
    header("Location: index.php");
    exit();
}

// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}

if(isset($_SESSION["sendData"])){
    $sendData = fnc_getData("session", "sendData");
    fnc_delData("session", "sendData", "");
}

// 確認画面から戻ってきた場合
if(isset($_POST['modify'])){
    $sendData = [
        'item_name' => $_POST['name'],
        'price' => $_POST['price'],
        'explanation' => $_POST['explanation'],
        'image' => $_POST['image'],
        'tags' => $_POST['tag']
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
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/image-preview.js"></script>
        <script type="text/javascript" src="../js/validate.js"></script>


        <!-- タグ用 -->
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="../css/jquery.tagit.css">
        <script type="text/javascript" src="../js/tag-it.min.js"></script>
        <script type="text/javascript" src="../js/tag.js"></script>
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
                            <li><?php print $errorMsg ?></li>
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
                        <span class="fileMsg errorMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>タイトル</label>
                        <input type="text" class="title" name="name" value="<?php print get_sendData('item_name') ?>">
                        <span class="titleMsg errorMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>説明</label>
                        <textarea placeholder="150字以内で入力" class="explanation" name="explanation"><?php print get_sendData('explanation') ?></textarea>
                        <span class="explanationMsg errorMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>タグ</label>
                        <input type="text" class="tag" id="tag-input" name="tag" value="<?php print get_sendData('tags') ?>">
                        <span class="tagMsg errorMsg"></span>
                    </div>

                    <div class="input-box">
                        <label>価格</label>
                        <input type="text" class="price" name="price" value="<?php print get_sendData('price') ?>">円
                        <span class="priceMsg errorMsg"></span>
                    </div>

                    <div class="input-box">
                        <input type="submit" class="submit wallpaper-post">
                    </div>

                </form>
            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>