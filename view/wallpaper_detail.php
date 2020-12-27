<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/cart_processing.php');

if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}
$item_id = $_GET['id'];
$item = Item::findbyId($item_id);

if(!$item){
    header("Location: index.php");
    exit();
}

$tags = $item->tags();

// カートの内容を削除した場合の処理
if(isset($_POST['deleteCartItem'])){
    $deleteItemId = $_POST['deleteCartItem'];
    del_cartItem('an_item', $deleteItemId);
}

// カートの中にこのページに表示させる商品が入っているかどうかをチェック
function alreadyIntheCart(){
    global $item;
    $cart_items = get_cartItem(); // 現在のカートの商品を取得
    foreach($cart_items as $cart_item){
        if($cart_item->id === $item->id) return true;
    }

    return false;
}

if(isset($current_user)){
    $params = [
        'user_id' => $current_user->id,
        'item_id' => $item->id
    ];
}

// すでにこのページの商品を買ったことがあるかをチェック
function alreadyBoughtItem(){
    global $params;
    if(!Purchase_history::find($params)){
        // 自分のIDと商品IDでpurchase_historyテーブルを検索してヒットしなかった場合(nullのとき)
        return false;
    }

    return true;
}


// このページの商品をお気に入り登録しているかどうかのチェック
function is_favriteItem(){
    global $params;
    if(!Favorite::find($params)){
        // 自分のIDと商品IDでpurchase_historyテーブルを検索してヒットしなかった場合(nullのとき)
        return false;
    }

    return true;
}

// formタグのaction(送信先)を指定する関数
function form_action_controller(){
    if(isset($current_user) && $thisItem = is_favriteItem()){
        print "favorite_delete.php";
    }else{
        print "favorite_create.php";
    }
}


?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜作品詳細</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/wallpaper_detail.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <?php if(isset($current_user)): ?>
        <script type="text/javascript" src="../js/fav.js"></script>
        <?php endif ?>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="wallpaper_detail.php">作品詳細</a>
        </div>

        <div id="wrap">
            
            <div id="w-detail">

                <h2><?php print $item->name ?></h2>

                <div id="cart">
                    
                    <div class="wallpaper">
                        <img src="../<?php print $item->image ?>">
                    </div>
    
                    <div class="details">
                        <div class="contributor">
                            <a href="profile.php?id=<?php print $item->user()->id ?>">
                                <img src="../<?php print $item->user()->image() ?>" alt="icon">
                                <p><?php print $item->user()->name ?></p>
                            </a>
                        </div>
    
                        <div class="text">
                            <h3>作品詳細</h3>
                            <p>
                                <?php print $item->explanation ?>
                            </p>
                        </div>

                        <div id="favorite">
                            <form method="post" action="../app/controller/<?php form_action_controller() ?>" id="fav-form">
                                <input type="hidden" name="item_id" value="<?php print $item->id ?>"></input>
                                <?php if(isset($current_user) && $thisItem = is_favriteItem()): ?>
                                <input type="image" src="../images/fav-1.png" class="fav"></input>
                                <?php else: ?>
                                <input type="image" src="../images/fav-0.png" class="fav"></input>
                                <?php endif ?>
                            </form>
                            <!-- <img src="../images/fav-0.png" class="fav"> -->
                            <?php if(isset($current_user) && $thisItem = is_favriteItem()): ?>
                            <span class="fav-state">お気に入り登録済み</span>
                            <?php else: ?>
                            <span class="fav-state">お気に入り登録する</span>
                            <?php endif ?>
                        </div>

                    </div>

                </div>

                <div id="tag-buy">
                    <div id="tag">
                        <ul class="cp_tag01">
                            <?php foreach($tags as $tag): ?>
                            <li>
                                <a href="wallpaper_list.php?type=search&search=<?php print $tag['tag_name'] ?>">
                                    <?php print $tag->name ?>
                                </a>
                            </li>
                            <?php endforeach ?>
                        </ul>
                    </div>

                    <div id="buy">
                        <p><?php print $item->price ?>円</p>

                        <?php if(alreadyIntheCart()): ?>

                        <form action="wallpaper_detail.php?id=<?php print $item->id ?>" method="POST">
                            <input type="hidden" value="<?php print $item->id ?>" name="deleteCartItem">
                            <input type="submit" value="カートから削除" name="cart" class="submit">
                        </form>
                        
                        <?php elseif(isset($current_user) && $current_user->id === $item->user()->id): ?>

                        <form action="../app/controller/cart.php" method="POST">
                            <input type="hidden" value="<?php print $item->id ?>" name="item_id">
                            <input type="submit" value="編集する" name="cart" class="submit">
                        </form>

                        <?php elseif(isset($current_user) && alreadyBoughtItem()): ?>

                        <form action="../app/controller/cart.php" method="POST">
                            <input type="hidden" value="<?php print $item->id ?>" name="item_id">
                            <input type="submit" value="ダウンロード" name="cart" class="submit">
                        </form>

                        <?php else: ?>

                        <form action="../app/controller/cart.php" method="POST">
                            <input type="hidden" value="<?php print $item->id ?>" name="item_id">
                            <input type="submit" value="カートに入れる" name="cart" class="submit">
                        </form>

                        <?php endif ?>

                    </div>
                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>