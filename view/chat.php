<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../app/fn_components/create_chatroom.php');

// 入力内容に不備がある場合
if(isset($_SESSION["errorMsg"])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}

if(!isset($current_user)){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['id'])){
    header("Location: chat-list.php");
    exit();
}

if($_GET['id'] === $current_user->id){
    header("Location: chat-list.php");
    exit();
}

if(!$opponent_user = User::findById($_GET['id'])){
    header("Location: chat-list.php");
    exit();
}

if(!$chat_room = create_chatroomId($_GET['id'])){
    header("Location: chat-list.php");
    exit();
}

$chatList = Chat::where(['chat_room' => $chat_room]);

// 既読カラムをtrueにする(ただし自分の投稿はtrueにしない)
foreach($chatList as $chat){
    if(!$chat->read && $chat->chatting_id != $current_user->id){
        $chat_params = [
            'id' => $chat->id,
            '`read`' => true
        ];
        Chat::update($chat_params);
    }
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜チャット</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/chat.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/chat.js"></script>

    </head>
    <body id="move-bottom">

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div id="chatUser-container">
            <div class="chatUser-innerbox">
                <div class="arrow"><a href="chat-list.php">＜</a></div>
                <img src="../<?php print $opponent_user->image() ?>">

                <div class="user-name"><?php print $opponent_user->name ?></div>
            </div>
        </div>

        <div id="chat-container">

            <?php foreach($chatList as $chat): ?>
                <?php if($chat->chatting_id === $current_user->id): ?>

                <div class="yourChatBox">
                    <div class="mycomment">
                        <p>
                            <?php print nl2br($chat->content) ?>
                        </p>
                    </div>
                </div>

                <?php else: ?>
                
                <div class="otherChatBox">
                    <div class="balloon6">
                    <div class="faceicon">
                        <a href="profile.php?id=<?php print $opponent_user->id ?>">
                            <img src="../<?php print $opponent_user->image() ?>">
                        </a>
                    </div>
                    <div class="chatting">
                        <div class="says">
                        <p>
                            <?php print nl2br($chat->content) ?>
                        </p>
                        </div>
                    </div>
                    </div>
                </div>

                <?php endif ?>
            <?php endforeach ?>
            

        </div>

        <div id="chatPost-container">
            <ul id="errorMsg-box">
                <?php if(isset($errorMsgs)): ?>
                    <?php foreach($errorMsgs as $errorMsg): ?>
                        <li><?php print $errorMsg ?></li>
                    <?php endforeach ?>
                <?php endif ?>
            </ul>
            <form method="post" action="../app/controller/chat_create.php">
                <textarea name="chat-content"></textarea>
                <input type="hidden">
                <input type="hidden" name="opponent_id" value="<?php print $opponent_user->id ?>">
                <input type="submit" value="送信" class="submit">
            </form>
        </div>
        
    </body>
</html>