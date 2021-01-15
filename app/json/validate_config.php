<?php 
require_once(dirname(__FILE__).'/../../config/validate_config.php');

//ajaxリクエスト判定
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    $validate_config = [
        'user_name' => USER_NAME,
        'min_password' => MIN_PASSWORD,
        'max_password' => MAX_PASSWORD,
        'self_introduction' => SELF_INTRODUCTION,
        'item_explanation' => ITEM_EXPLANATION,
        'max_price' => MAX_PRICE,
        'chat_content' => CHAT_CONTENT
    ];

    // JSON形式で送信する。
    $json = json_encode($validate_config, JSON_UNESCAPED_UNICODE);
    echo $json;
    
}else{
    echo '通信失敗';
}

?>