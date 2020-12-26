<?php
require_once(dirname(__FILE__).'/../controller/before_view.php');

//ajaxリクエスト判定
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    //ajaxからデータが送られてきた場合
    $tags = Tag::all();
    $tagList = [];

    foreach($tags as $tag){
        $tagList[] = $tag->name;
    }

    $tagList = array_unique($tagList); // 同じタグをまとめる

    // JSON形式で送信する（配列をechoするとArrayと出るので）
    $json = json_encode(array_values($tagList), JSON_UNESCAPED_UNICODE);
    echo $json;

}else {
    echo '通信失敗';
}

?>