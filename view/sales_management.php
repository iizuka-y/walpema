<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜売上金管理</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/sales_management.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="sales_management.php">売上金管理</a>
        </div>

        <div id="wrap">
            <div id="sale">
                <h2>
					売上金管理(ダミー)
				</h2>
				
				
                <div id="sales-box">
					
					<div id="now-sales-box">
						<div id="now-sales-title">
							現在所持している売上金
						</div>
						<div id="now-sales-detail">
							500円
						</div>
					</div>
					
					<a href="">
						<div id="sales-payment-button">
							<a href="sales_management.php">
							売上金を口座へ入金する　▶
							</a>
						</div>
					</a>
					
					<table>
						<tr><th>履歴</th><th>金額</th><th>取扱日</th></tr>
						<tr><td>壁紙売上</td><td>￥100</td><td>2020/11/30</td></tr>
						<tr><td>壁紙売上</td><td>￥100</td><td>2020/11/30</td></tr>
						<tr><td>壁紙売上</td><td>￥100</td><td>2020/11/30</td></tr>
						<tr><td>壁紙売上</td><td>￥100</td><td>2020/11/30</td></tr>
					</table>
					
					<a href="#">
						<div id= "history-seemore">
							・・・もっと見る
						</div>
					</a>	
								
				</div>
					
					
					
                </div>

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>