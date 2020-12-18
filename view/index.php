<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

function getFavItem(){
    global $current_user;
    $fav_records = Favorite::where(['user_id' => $current_user->id]);
    $fav_items = [];
    foreach($fav_records as $fav_record){
        $fav_items[] = Item::find(['id' => $fav_record->item_id]);
    }
    return $fav_items;
}


?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜トップ</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/slick.css"/>
        <link rel="stylesheet" type="text/css" href="../css/slick-theme.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/index.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/slick.min.js"></script>
        <script type="text/javascript" src="../js/index.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <div id="popular-works">
            <h2>人気作品</h2>
            <div class="slider popular-box">

                <div class="popular-img"><a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a></div>
                <div class="popular-img"><a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a></div>
                <div class="popular-img"><a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a></div>
                <div class="popular-img"><a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a></div>
                <div class="popular-img"><a href="wallpaper_detail.php"><img src="../images/Mac-Pro-macOS-Catalina-Wallpaper.jpg"></a></div>

            </div>
        </div>


        <?php if(isset($current_user)): ?>
        <div id="favorite">

            <h2>お気に入り</h2>
            
            <div class="images-box">
                <?php if($fav_items = getFavItem()): ?>
                    <?php foreach($fav_items as $fav_item): ?>
                    <a href="wallpaper_detail.php?id=<?php print $fav_item->id ?>"><img src="../<?php print $fav_item->image ?>"></a>
                    <?php endforeach ?>
                
                <?php else: ?>
                <p class="not-found-fav">お気に入り登録した壁紙がありません</p>
                <?php endif ?>
            </div>
            
            <?php if($fav_items = getFavItem()): ?>
            <div class="link">
                <a href="wallpaper_list.php?type=fav">もっと見る</a>
            </div>
            <?php endif ?>


        </div>
        <?php endif ?>



        <div id="favorite-tag">

            <h2>人気のタグ</h2>
            <div class="tag-box">
                <ul class="cp_tag01">
                    <li><a href="wallpaper_list.php?search=#">tag</a></li>
                    <li><a href="wallpaper_list.php?search=#">タグ</a></li>
                    <li><a href="wallpaper_list.php?search=#">長いタイプのタグ</a></li>
                    <li><a href="wallpaper_list.php?search=#">犬</a></li>
                    <li><a href="wallpaper_list.php?search=#">風景</a></li>
                    <li><a href="wallpaper_list.php?search=#">建物</a></li>
                    <li><a href="wallpaper_list.php?search=#">キャラクター</a></li>
                    <li><a href="wallpaper_list.php?search=#">イラスト</a></li>
                    <li><a href="wallpaper_list.php?search=#">猫</a></li>
                    <li><a href="wallpaper_list.php?search=#">食べ物</a></li>
                    <li><a href="wallpaper_list.php?search=#">飲み物</a></li>
                    <li><a href="wallpaper_list.php?search=#">インテリア</a></li>
                    <li><a href="wallpaper_list.php?search=#">滝</a></li>
                    <li><a href="wallpaper_list.php?search=#">富士山</a></li>
                    <li><a href="wallpaper_list.php?search=#">乗り物</a></li>
                    <li><a href="wallpaper_list.php?search=#">シンプル</a></li>
                    <li><a href="wallpaper_list.php?search=#">カラフル</a></li>
                    <li><a href="wallpaper_list.php?search=#">学校</a></li>
                    <li><a href="wallpaper_list.php?search=#">動物</a></li>
                    <li><a href="wallpaper_list.php?search=#">漫画</a></li>
                    <li><a href="wallpaper_list.php?search=#">季節</a></li>
                    <li><a href="wallpaper_list.php?search=#">砂漠</a></li>
                    <li><a href="wallpaper_list.php?search=#">ジャングル</a></li>
                    <li><a href="wallpaper_list.php?search=#">タグのサンプル</a></li>
                </ul>
            </div>

        </div>

        <div id="new-wallpaper">
            <h2>新着壁紙</h2>
            <div class="wallpaper-box">
                <a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/windows xp.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Appearance Dynamic.jpg"></a>
                <a href="wallpaper_detail.php"><img src="../images/Big Sur Waters Edge.jpg"></a>
            </div>
        </div>


        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>