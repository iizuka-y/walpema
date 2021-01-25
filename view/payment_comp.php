<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(!$current_user){
    header("Location: index.php");
    exit();
}

?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜壁紙投稿</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/payment-comp.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        
    </head>
    
    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
    

        <main>
            <div class="first">
                <h2>売上金入金</h2>
            

                <div class="money">
                    <h3>以下の金額を入金しました。</h3>
                    <p>¥500</p>

                    <div class="return-link">
                        <a class="tourokugamen" href="#">口座登録・確認・編集</a>
                        <a class="return" href="profile.php?id=<?php print $current_user->id ?>">マイページに戻る</a>
                    </div>
                </div>
                
            </div>
        </main>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>