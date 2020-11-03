<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜カート-支払い方法の編集</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/payment_edit.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        
        <div class="bread-nav">
            <a href="index.html">トップ</a>><a href="c-check.html">商品詳細</a>><a href="cart.html">カート</a><a href="check-out.html">注文確認</a>><a href="c-method-of-payment.html">支払い方法の編集</a>
        </div>

        <div id="wrap">
            <div id="cart">
                <h2>
					支払い方法の編集
				</h2>
				
                <div id="pay-select-box">
					<div class="pay-select">
						<input type="radio" name="pay" class="radio-input" id="radio-01">
						<label for="radio-01">
							クレジットカード払い
						</label>
						<div class="pay-select-cart-text">
							JCB、VISA、MasterCard、American Expressの各カードをご利用いただけます。
						</div>
						<a href="#">
							<div class="pay-select-cart-text">
								クレジットカードの追加／確認／変更
							</div>
						</a>
					</div>
					<div class="pay-select">
						<input type="radio" name="pay" class="radio-input" id="radio-02">
						<label for="radio-02">
							口座振替
						</label>
						<a href="#">
							<div class="pay-select-cart-text">
								金融機関の種別を選択
							</div>
						</a>
                    </div>
					
					<form action="check_out.php" method="post" class="input">
						<input type="submit" name="pay" value="＜　戻る" id="button-back">
					</form>
					
					<form action="check_out.php" method="post" class="input">
						<input type="submit" name="pay" value="変更　＞" id="button-ready">
					</form>
					
                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>