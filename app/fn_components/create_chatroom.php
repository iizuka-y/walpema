<?php
// チャットルームのIDをつくる関数。
// 自分と相手のIDを&でつなぎIDが小さいほうが&の前で大きいほうが&の後　例：27&39
function create_chatroomId($opponent_id){
    global $current_user;
    $id_array[0] = $current_user->id;
    $id_array[1] = $opponent_id;

    // sort($array)で配列をソート。trueかfalseを返す。
    if(!sort($id_array)){
        return false;
    }
    $chat_room = implode("&", $id_array);

    return $chat_room;
}

?>