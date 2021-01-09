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

        <title>ウォルペマ｜購入済壁紙一覧</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <!-- checkbox -->
        <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/file_download.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php?id=<?php print $user->id ?>">ユーザー</a>><a href="my-bought-wallpaper.php">購入済みの壁紙</a>
        </div>

        <div id="user-container">
            
            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み ?>

            <div class="nav-content flex">
                <?php if($user->bought_items()): ?>
                    <?php foreach($user->bought_items() as $bought_item): ?>
                    <div class="img-container ">
                        <a href="wallpaper_detail.php?id=<?php print $bought_item->id ?>">
                            <div class="img-box">
                                <img src="../<?php print $bought_item->image ?>">
                                <input type="hidden" value="<?php print $bought_item->id ?>">
                                <input type="checkbox" name="download" class="download-checkbox" style="transform:scale(1.8);">
                            </div>
                            <div class="img-name"><?php $bought_item->name ?></div>
                        </a>
                    </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div>購入した壁紙はありません</div>
                <?php endif ?>
                
                <div class="download">
                    <form method="post" action="../app/controller/file_download.php">
                        <input type="hidden" name="item_id" id="post_item_id" value="">
                        <button class="download-btn lock">画像をダウンロード</button>
                    </form>
                </div>
                
            </div>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        

    </body>
</html>