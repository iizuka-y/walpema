<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

$user = $current_user;

if(!$user){
    header("Location: index.php");
}

function get_chat_list(){
    global $user;

    // 自分が参加している各chat_roomの中で一番idが大きいレコードを取得
    $sql = 'select chat_room, max(id) from chat where chatting_id = '.$user->id.' OR chatted_id = '.$user->id.' group by chat_room order by max(id) asc;';
    $chatRecords = Chat::sql($sql); // この$chatRecordsにはchat_roomとmax(id)のカラムしかない

    $mychatroom_maxId = [];
    foreach($chatRecords as $chatRecord){
        $mychatroom_maxId[] = $chatRecord['max(id)'];
    }

    // idを元にchatのインスタンスを作成して配列に格納
    $chatList = [];
    foreach($mychatroom_maxId as $chat_id){
        $chatList[] = Chat::findById($chat_id);
    }

    return $chatList;
}

$chatList = get_chat_list();

?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜マイページ</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php?id=<?php print $user->id ?>">ユーザー</a>
        </div>

        <div id="user-container">
            
            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み ?>

            <div class="nav-content">
                <?php if($chatList): ?>
                <ul>
                    <?php foreach($chatList as $chat): ?>
                    <li class="chat">
                        <a href="chat.php?id=<?php print $chat->opponent_user()->id ?>">
                            <div class="chat-box">
                                <img src="../<?php print $chat->opponent_user()->image() ?>">
                                <div class="chat-box-main">
                                    <div class="chat-user-name">
                                        <?php print $chat->opponent_user()->name ?>
                                    </div>
                                    <div class="chat-content">
                                        <?php print $chat->content ?>
                                    </div>
                                    <div class="chat-others">
                                        <?php print $chat->updated_at ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                    <?php endforeach ?>
                </ul>
                <?php else: ?>
                <div>チャット記録はありません。</div>
                <?php endif ?>
            </div>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>