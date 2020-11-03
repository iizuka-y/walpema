<?php
require_once('./config/db_ini.php');

function db_connect($sql){
    try {

        /* リクエストから得たスーパーグローバル変数をチェックするなどの処理 */
    
        // データベースに接続
        $pdo = new PDO(
            "mysql:dbname=".DB_NAME.";host=".HOST.";charset=utf8mb4",
            USER,
            PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]
        );
    
        /* データベースから値を取ってきたり， データを挿入したりする処理 */
        return $pdo->query($sql);
    
    } catch (PDOException $e) {
    
        // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
        // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
        // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        exit($e->getMessage()); 
    
    }

}





?>