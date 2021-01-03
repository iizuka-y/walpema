<?php 
require_once(dirname(__FILE__).'/../class/Tag.php');

//ajaxリクエスト判定
if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    //ajaxからデータが送られてきた場合
    if(isset($_POST['search'])){
        //入力している値と文字が一致する名前を抽出する
        $search_word = $_POST['search'];
        $textLength = mb_strlen($search_word,'UTF-8');
        if($textLength >= 1){
            // $sql = "SELECT tag_name FROM tag WHERE tag_name LIKE '$search_word%'";
            $sql = "SELECT tag_name FROM tag WHERE tag_name LIKE '$search_word%' group by tag_name order by count(tag_name) desc";
            $tag_records = Tag::sql($sql);
            $tag_names = [];
            foreach($tag_records as $tag_record){
                $tag_names[] = $tag_record['tag_name'];
            }
            // JSON形式で送信する（配列をechoするとArrayと出るので）
            $json = json_encode($tag_names, JSON_UNESCAPED_UNICODE);
            echo $json;
        }
        // $textLength < 1 ならば何もechoしてないのでsearch_wordにnullが入る。
    } 
}else{
    echo '通信失敗';
}

?>