<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(!$current_user){
    header("Location: index.php");
    exit();
}

function get_possession_money(){
    $sql = "select SUM(transaction) from money";
    $possession_money = Money::sql($sql); // 1レコードだけでも配列が返ってくるので注意
    return $possession_money[0]['SUM(transaction)']; // 配列なので0番目を返す
}

$purchase_history_records = Purchase_history::where(['seller_id' => $current_user->id]);
$purchase_history_records = array_reverse($purchase_history_records); // 降順にする

?>

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

        <div id="wrap">
            <div id="sale">
                <h2>
					売上金管理
				</h2>
				
				
                <div id="sales-box">
					
					<div id="now-sales-box">
						<div id="now-sales-title">
							現在所持している売上金
						</div>
						<div id="now-sales-detail">
							<?php print get_possession_money() ?>円
						</div>
					</div>
					
					<a href="">
						<div id="sales-payment-button">
							<a href="manage_payment.php">
							    売上金を口座へ入金する　▶
							</a>
						</div>
					</a>
					
					<table>
                        <tr><th>履歴</th><th>金額</th><th>取扱日</th></tr>
                        <?php foreach($purchase_history_records as $purchase_history): ?>
                        <tr><td>壁紙売上</td><td>￥<?php print $purchase_history->item()->price ?></td><td><?php print $purchase_history->updated_at ?></td></tr>
                        <?php endforeach ?>
					</table>
						
								
				</div>
					

            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>