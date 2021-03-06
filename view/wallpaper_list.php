<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

function valid_access(){

    if(!isset($_GET['type'])){
        return false;
    }

    if($_GET['type'] != 'fav' && $_GET['type'] != 'search' && $_GET['type'] != 'popular'){
        return false;
    }

    if($_GET['type'] === 'search'){
        if(!isset($_GET['search'])){
            return false;
        }
    }

    return true;
}

if(!valid_access()){
    header("Location: index.php");
    exit();
}


function get_items(){
    global $current_user;

    // お気に入りの壁紙を取得する場合
    if($_GET['type'] === 'fav'){
        if(isset($current_user)){
            $fav_items = Favorite::where(['user_id' => $current_user->id]);
            $items = [];
            foreach($fav_items as $fav_item){
                $items[] = Item::find(['id' => $fav_item->item_id]);
            }
            return $items;
        }else{
            header("Location: index.php");
            exit();
        }
    }

    // 検索ワードから壁紙を取得する場合
    if($_GET['type'] === 'search'){
        $tags = Tag::where(['tag_name' => $_GET['search']]);
        $items = [];
        foreach($tags as $tag){
            $item = Item::find(['id' => $tag->item_id]);
            if($item->sale) $items[] = $item;
        }
        return $items;
    }

    
}

function no_items_sentence(){
    if($_GET['type'] === 'fav'){
        print "お気に入り登録した壁紙がありません";
    }elseif($_GET['type'] === 'search'){
        print $_GET['search']."のタグを持った投稿は見つかりませんでした";
    }elseif($_GET['type'] === 'popular'){
        print "人気の投稿がありません";
    }
}

$items = get_items();


?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜お気に入り</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/wallpaper-list.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        
		
		<div class="bread-nav">
            <a href="index.php">トップ</a>>
            <?php if($_GET['type'] === 'fav'): ?>
            <a href="wallpaper_list.php?type=fav">お気に入り</a>
            <?php elseif($_GET['type'] === 'search'): ?>
            <a href="wallpaper_list.php?type=search&search=<?php print $_GET['search'] ?>">検索</a>
            <?php endif ?>
        </div>

        <div id="wrap">
            <div id="contents">
                
                <?php if($_GET['type'] === 'fav'): ?>
                <h2>お気に入りの壁紙</h2>
                <?php elseif($_GET['type'] === 'search'): ?>
                <h2>タグ：<?php print $_GET['search'] ?></h2>
                <?php endif ?>

                <div class="wallpaper-list">
                    <?php if($items): ?>
                        <?php foreach($items as $item): ?>
                        <div class="card">
                            <figure>
                                <a href="wallpaper_detail.php?id=<?php print $item->id ?>"><img src="../<?php print $item->image ?>"></a>
                            </figure>
                        </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <p><?php no_items_sentence() ?></p>
                    <?php endif ?>

                </div>

                <!-- <div class="more"> 
                    <button>もっと見る</button>
                </div> -->

            </div>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>