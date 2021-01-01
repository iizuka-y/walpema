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


if(Chat::create($params)){
    header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);
}else{
    $errorMsg = ["チャット送信に失敗しました。"];
    fnc_setData("session", "errorMsg", $errorMsg);
    header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);
}


?>