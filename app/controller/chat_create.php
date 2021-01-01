<?php
require_once('before_view.php');
require_once('../fn_components/create_chatroom.php');

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

$params = [
    "chatting_id" => $current_user->id,
    "chatted_id" => $_POST['opponent_id'],
    "content" => $_POST['chat-content'],
    "chat_room" => $chat_room
];


if(Chat::create($params)){
    header("Location: ../../view/chat.php?id=".$_POST['opponent_id']);
}


?>