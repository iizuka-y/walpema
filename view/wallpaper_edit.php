<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}

if(!isset($current_user)){
    header("Location: index.php");
    exit();
}

if(!$item = Item::findById($_POST['item_id'])){
    header("Location: index.php");
    exit();
}

// 商品のタグを取得し、配列をCSVに変換
$tags = $item->tags();
$tag_names = [];
foreach($tags as $tag){
    $tag_names[] = $tag->name;
}
$tagCsv = implode(",", $tag_names);

?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜壁紙編集</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/wallpaper-edit.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../js/image-preview.js"></script>
        <!-- <script type="text/javascript" src="../js/validate.js"></script> -->

        <!-- タグ用 -->
        <link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="../css/jquery.tagit.css">
        <script type="text/javascript" src="../js/tag-it.min.js"></script>
        <script type="text/javascript" src="../js/tag.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="wallpaper_detail.php?=<?php print $item->id ?>">作品詳細</a>><a href="wallpaper_edit.php">投稿した壁紙の編集</a>
        </div>

        <div id="wrap">
            <div id="edit">
                <h2>投稿した壁紙の編集</h2>

                <ul id="errorMsg-box">
                    <?php if(isset($errorMsgs)): ?>
                        <?php foreach($errorMsgs as $errorMsg): ?>
                            <li><?php print $errorMsg?></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>

                <form action="../app/controller/profile_update.php" method="POST" enctype="multipart/form-data">

                    <div class="input-box">
                        <input type="file" class="file" name="upfile">
                        <div class="wallpaper-img-box" id="img-field">
                            <img src="../<?php print $item->image ?>" class="edit preview">
                        </div>
                    </div>

                    <div class="input-box">
                        <label>タイトル</label>
                        <input type="text" class="edit user_name" name="name" value="<?php print $item->name ?>">
                        <span class="userNameMsg error"></span>
                    </div>

                    <div class="input-box">
                        <label>説明(150字以内)</label>
                        <textarea class="edit message" name="self_introduction"><?php print $item->explanation ?></textarea>
                        <span class="messageMsg error"></span>
                    </div>

                    <div class="input-box">
                        <label>タグ</label>
                        <input type="text" id="tag-input" class="edit_tag" name="tag" value="<?php print $tagCsv ?>">
                        <span class="tagMsg error"></span>
                    </div>

                    <div class="input-box">
                        <label>価格</label>
                        <input type="text" class="price" name="price" value="<?php print $item->price ?>">円
                        <span class="priceMsg error"></span>
                    </div>


                    <input type="submit" value="変更する" class="edit-submit"> 
                </form>
                

            </div>
        </div>



        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>