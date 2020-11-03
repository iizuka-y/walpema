<?php
require_once('component/db_connect.php');

header('Content-Type: text/html; charset=utf-8');

$sql = "select * from user";

$result_rows = db_connect($sql);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Example</title>
    </head>
    <body>
        <!-- ここではHTMLを書く以外のことは一切しない -->
        <h1>test</h1>
        <?php
        foreach ( $result_rows as $row ) {
            // テーブルの1行ごとに1つの配列として格納されている（$row）
            // その1行ごとの配列内で、列名をキーにした連想配列でデータが格納されている。
            echo "id: {$row['user_id']}<br>"; // id列
            echo "name: {$row['user_name']}<br>"; // name列
        }
        ?>
    </body>
</html>