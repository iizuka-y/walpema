<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(!isset($current_user)){
    header("Location: index.php");
    exit();
}

$notifications = Notification::where(['user_id' => $current_user->id]);
$notifications = array_reverse($notifications); // 降順にする

// 既読カラムをtrueにする
foreach($notifications as $notification){
    if(!$notification->read){
        $notification_params = [
            'id' => $notification->id,
            '`read`' => true
        ];
        Notification::update($notification_params);
    }
    
}

?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜通知</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/notice.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
		
		<div class="bread-nav">
            <a href="index.php">トップ</a>><a href="notice.php">通知</a>
        </div>

        <div id="wrap">

            <div id="notice">
                <h2>通知</h2>

                <div id="notice-list">
                    <?php if($notifications): ?>
                        
                        <?php foreach($notifications as $notification): ?>

                            <?php if($notification->notified_type === 'fav'): ?>

                            <div class="content">
                                <div class="date">
                                    <p><?php print $notification->updated_at ?></p>
                                </div>

                                <div class="notification-box">
                                    <figure>
                                        <img src="../<?php print $notification->item()->image ?>" class="wallpaper">
                                    </figure>
                                    
                                    <div class="text">
                                        <p>
                                            <?php print $notification->notified_user()->name ?>
                                            さんがあなたの作品をお気に入り登録しました。
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <?php elseif($notification->notified_type === 'purchase'): ?>
                            
                            <div class="content">
                                <div class="date">
                                    <p><?php print $notification->updated_at ?></p>
                                </div>

                                <div class="notification-box">
                                    <figure>
                                        <img src="../<?php print $notification->item()->image ?>" class="wallpaper">
                                    </figure>
                                    
                                    <div class="text">
                                        <p>
                                            <?php print $notification->notified_user()->name ?>
                                            さんがあなたの作品を購入しました。
                                        </p>
                                    </div>
                                </div>

                            </div>

                            <?php elseif($notification->notified_type === 'chat'): ?>

                            <div class="content">
                                <div class="date">
                                    <p><?php print $notification->updated_at ?></p>
                                </div>

                                <div class="notification-box">
                                    <figure>
                                        <img src="../images/windows xp.jpg" class="user">
                                    </figure>
                                    
                                    <div>               
                                        <p>
                                            <?php print $notification->notified_user()->name ?>                                       
                                            さんからチャットが来ています。
                                        </p>
                                        <p class="chat-content">こんにちは！</p>             
                                    </div>
                                </div>

                            </div>

                            <?php endif ?>

                        <?php endforeach ?>

                    <?php else: ?>

                        <p>まだお知らせはありません。</p>

                    <?php endif ?>

                </div>
            </div>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>