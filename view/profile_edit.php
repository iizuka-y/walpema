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

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜マイページ編集</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage-edit.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/image-preview.js"></script>
        <!-- <script type="text/javascript" src="../js/validate.js"></script> -->

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php">マイページ</a>><a href="profile_edit.php">マイページ編集</a>
        </div>

        <div id="wrap">
            <div id="edit">
                <h2>マイページ編集</h2>

                <ul id="errorMsg-box">
                    <?php if(isset($errorMsgs)): ?>
                        <?php foreach($errorMsgs as $errorMsg): ?>
                            <li><?php print $errorMsg?></li>
                        <?php endforeach ?>
                    <?php endif ?>
                </ul>

                <form action="../app/controller/profile_update.php" method="POST" enctype="multipart/form-data">

                    <input type="file" class="file" name="upfile">
                    <img src="../<?php print $current_user->image() ?>" alt="アイコン" class="edit preview" id="img-field">

                    <label>ユーザー名</label>
                    <input type="text" class="edit user_name" name="name" value="<?php print $current_user->name ?>">
                    <span class="userNameMsg"></span>

                    <label>コメント(100字以内)</label>
                    <textarea class="edit message" name="self_introduction"><?php print $current_user->self_introduction ?></textarea>
                    <span class="messageMsg"></span>

                    <input type="submit" value="変更する" class="edit-submit"> 
                </form>
                

            </div>
        </div>



        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>