<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/cart_processing.php');


if(isset($_POST['deleteItemId'])){
    del_cartItem('an_item', $_POST['deleteItemId']); // カートの中身を削除する処理
}

if(isset($_POST['deleteAllItems'])){
    del_cartItem('all_items'); // カートの中身を全部消去
}

$items = get_cartItem(); // 現在のカートの商品を取得

// カート内の合計を計算
$total_price = 0;
foreach($items as $item){
    $total_price += $item->price;
}


?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜カート</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/cart.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/btn-lock.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        
        <div class="bread-nav">
            <?php
            if(!empty($items)){
                $end_item = end($items);
            }
            
            ?>
            <a href="index.php">トップ</a>><a href="wallpaper_detail.php?id=<?php print $end_item->id ?>">商品詳細</a>><a href="cart.php">カート</a>
        </div>

        <div id="wrap">

            <div id="cart">
                <h2>カート</h2>

                <div id="cart-wallpaper">
                    
                    <?php if(!empty($items)): ?>
                        <?php foreach($items as $item): ?>
                        <div class="cart-item-box">
                            <figure>
                                <img src="../<?php print $item->image?>">
                            </figure>
                            <div class="cart-text">
                                <p><?php print $item->name // 商品名 ?></p>
                                <p>￥<?php print $item->price // 価格 ?></p>
                                <form method="post" action="cart.php">
                                    <input type="hidden" name="deleteItemId" value="<?php print $item->id ?>">
                                    <input type="submit" value="カートから削除">
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php else: ?>
                    
                    <div>カートに商品がありません</div>

                    <?php endif ?>


                    <div id="buy">
                        <div>
                            <p>合計</p>
                            <p class="price">￥<?php print $total_price ?></p>

                            <form action="check_out.php" method="POST">
                                <input type="submit" value="購入する" class="check-out <?php if(empty($items)) print "lock" ?>">
                            </form>
                        </div>
                    </div>

                    <form action="cart.php" method="POST">
                        <input type="hidden" name="deleteAllItems">
                        <input type="submit" value="カートの中身を空にする">
                    </form>
                    
                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>