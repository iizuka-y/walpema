<?php

function get_possession_money(){
    global $current_user;
    $sql = "select SUM(transaction) from money where user_id = ". $current_user->id;
    $possession_money = Money::sql($sql); // 1レコードだけでも配列が返ってくるので注意
    return $possession_money[0]['SUM(transaction)']; // 配列なので0番目を返す
}

?>