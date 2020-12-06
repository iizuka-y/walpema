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

// カートの内容を削除した場合の処理
if(isset($_POST['deleteCartItem'])){
    $deleteItemId = $_POST['deleteCartItem'];
    del_cartItem('an_item', $deleteItemId);
}

// カートの中にこのページに表示させる商品が入っているかどうかをチェック
$alreadyIntheCart = false;
$cart_items = get_cartItem(); // 現在のカートの商品を取得
foreach($cart_items as $cart_item){
    if($cart_item->id === $item->id) $alreadyIntheCart = true;
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
        <script type="text/javascript" src="../js/fav.js"></script>

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
                            <a href="user.html">
                                <?php if($item->user()->image): ?>
                                <img src="../<?php print $item->user()->image ?>" alt="icon">
                                <?php else: ?>
                                <img src="../images/default-user-image.png" alt="icon">
                                <?php  endif ?>
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
                            <img src="../images/fav-0.png" class="fav">
                            お気に入り登録する
                        </div>

                    </div>

                </div>

                <div id="tag-buy">
                    <div id="tag">
                        <ul class="cp_tag01">
                            <li><a href="#">タグ</a></li>
                            <li><a href="#">tag</a></li>
                            <li><a href="#">長いタイプのタグ</a></li>
                            <li><a href="#">犬</a></li>
                            <li><a href="#">風景</a></li>
                            <li><a href="#">タグ</a></li>
                            <li><a href="#">tag</a></li>
                            <li><a href="#">長いタイプのタグ</a></li>
                            <li><a href="#">犬</a></li>
                            <li><a href="#">風景</a></li>
                        </ul>
                    </div>

                    <div id="buy">
                        <p><?php print $item->price ?>円</p>
                        
                        <?php if($alreadyIntheCart): ?>

                        <form action="wallpaper_detail.php?id=<?php print $item->id ?>" method="POST">
                            <input type="hidden" value="<?php print $item->id ?>" name="deleteCartItem">
                            <input type="submit" value="カートから削除" name="cart" class="submit">
                        </form>
                        
                        <?php elseif(isset($current_user) && $current_user->id === $item->user()->id): ?>

                        <form action="../app/controller/cart.php" method="POST">
                            <input type="hidden" value="<?php print $item->id ?>" name="item_id">
                            <input type="submit" value="編集する" name="cart" class="submit">
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