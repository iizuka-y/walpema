<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../config/top_page.php');

function getPopularItem(){
    $popular_itemRecords = Favorite::popular('item_id');
    $popular_items = [];
    $count = 0;
    foreach($popular_itemRecords as $popular_itemRecord){
        if($count >= POPULAR_ITEM_NUM) break;
        $popular_item = Item::find(['id' => $popular_itemRecord['item_id']]);
        if($popular_item->sale){
            $popular_items[] = $popular_item;
            $count ++;
        }
    }

    return $popular_items;
}

function getFavItem(){
    global $current_user;
    $fav_records = Favorite::where(['user_id' => $current_user->id]);
    $fav_records = array_reverse($fav_records); // 降順にする
    $fav_items = [];
    $count = 0;
    foreach($fav_records as $fav_record){
        if($count >= MAX_FAVITEM_NUM) break;
        $fav_items[] = Item::find(['id' => $fav_record->item_id]);
        $count ++;
    }

    return $fav_items;
}

function getPopularTag(){

    $popularAllTags = Tag::popular('tag_name');
    $popular_tags = [];
    $count = 0;
    foreach($popularAllTags as $popularTag){
        if($count >= MAX_TAG_NUM) break;
        $popular_tags[] = $popularTag;
        $count ++;
    }

    return $popular_tags;

}

function getNewItem(){
    $newAllItems = Item::all();
    $newAllItems = array_reverse($newAllItems);
    $newItems = [];
    $count = 0;
    foreach($newAllItems as $newItem){
        if($count >= MAX_NEWITEM_NUM) break;
        if($newItem->sale){
            $newItems[] = $newItem;
            $count ++;
        }
    }
    
    return $newItems;
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

                <?php if($popular_items = getPopularItem()): ?>
                    <?php foreach($popular_items as $popular_item): ?>
                        <div class="popular-img">
                            <a href="wallpaper_detail.php?id=<?php print $popular_item->id ?>">
                                <img src="../<?php print $popular_item->image ?>">
                            </a>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <p>人気の投稿が存在しません</p>
                <?php endif ?>

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
                    <?php if($popular_tags = getPopularTag()): ?>
                        <?php foreach($popular_tags as $tag): ?>
                        <li>
                            <a href="wallpaper_list.php?type=search&search=<?php print $tag['tag_name'] ?>">
                                <?php print $tag['tag_name'] ?>
                            </a>
                        </li>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p>人気のタグが存在しません</p>
                    <?php endif ?>
                </ul>
            </div>

        </div>

        <div id="new-wallpaper">
            <h2>新着壁紙</h2>
            <div class="wallpaper-box">
                <?php if($newItems = getNewItem()): ?>
                    <?php foreach($newItems as $newItem): ?>
                    <a href="wallpaper_detail.php?id=<?php print $newItem->id ?>">
                        <img src="../<?php print $newItem->image ?>">
                    </a>
                    <?php endforeach ?>
                <?php else: ?>
                    <p>新着の壁紙が存在しません</p>
                <?php endif ?>
            </div>
        </div>


        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>