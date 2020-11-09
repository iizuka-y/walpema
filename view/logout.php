<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
if(isset($current_user)){
	fnc_delData("session","","all");
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜ログアウト</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/logout.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>
    <body>
		<?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <main>
			<div id="logout-box">
				<div id="title">
					ログアウトしました
				</div>
				<div id="text">
					ご利用ありがとうございます！<br>
					トップページへ戻るには、<br>下の「トップページへ」のボタンを押してください。
				</div>

				<a href="index.php" class="login-btn">
					トップページへ
				</a>
			</div>

			<?php require_once('layouts/_footer.php'); //footerの読み込み ?>
		</main>
    </body>
</html>