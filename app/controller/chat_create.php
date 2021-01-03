<?php
require_once('before_view.php');
require_once('../fn_components/create_chatroom.php');
require_once('../../config/validate_config.php');


if(!isset($current_user) || !isset($_POST['chat-content'])){
    header("Location: ../../view/login.php");
    exit();
}

if(!isset($_POST['opponent_id'])){
    header("Location: ../../view/login.php");
    exit();
}

if(!$chat_room = create_chatroomId($_POST['opponent_id'])){
    header("Location: ../../view/chat-list.php");
    exit();
}

if(!$_POST['chat-content']){

    $errorMsg[] = "チャットが入力されていません";
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);
    exit();

}

if(mb_strlen($_POST['chat-content']) > CHAT_CONTENT){

    $errorMsg[] = "一度に送信できる文字数は".CHAT_CONTENT."文字までです";
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);
    exit();

}

$params = [
    "chatting_id" => $current_user->id,
    "chatted_id" => $_POST['opponent_id'],
    "content" => $_POST['chat-content'],
    "chat_room" => $chat_room
];


// チャットルームの中で一番新しい投稿(ただし新しいチャットレコードを作成する前)を取得
if($chats = Chat::where(['chat_room' => $chat_room])){
    $new_chat = end($chats);
    $notification_params = [
        'user_id' => $_POST['opponent_id'],
        'notified_id' => $current_user->id,
        'notified_type' => 'chat',
        'chat_id' => $new_chat->id
    ];

    // すでにお知らせテーブルにそのチャットルームの最新レコードが存在していたら削除
    if($notification = Notification::find($notification_params)){
        Notification::delete($notification->id);
    };
}


// チャットレーブルのレコード作成
if(!Chat::create($params)){
    $errorMsg = ["チャット送信に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);
    exit();
}

// お知らせテーブルのレコード作成
$chat = Chat::find($params);
$notification_params = [
    'user_id' => $_POST['opponent_id'],
    'notified_id' => $current_user->id,
    'notified_type' => 'chat',
    'chat_id' => $chat->id
]; // $notification_paramsのchat_idを最新のID(新しいチャットレコード作成後)に更新
Notification::create($notification_params); // そのチャットルームで一番新しいチャットのIDのみをNotificationテーブルに保存する！

header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);


?>