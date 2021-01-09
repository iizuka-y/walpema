<?php

function file_download($item){
    // ファイル形式(jpgやpng)の確認。
    $file_type_array = explode(".", $item->image);
    $file_type = end($file_type_array);

    // ファイルのパス
    $filepath = dirname(__FILE__).'/../../'.$item->image;

    // リネーム後のファイル名
    $filename = 'ダウンロード.'.$file_type;


 
    // ファイルタイプを指定
    header('Content-Type: application/force-download');
    
    // ファイルサイズを取得し、ダウンロードの進捗を表示
    header('Content-Length: '.filesize($filepath));
    
    // ファイルのダウンロード、リネームを指示
    header('Content-Disposition: attachment; filename="'.$filename.'"');
    
    // ファイルを読み込みダウンロードを実行
    readfile($filepath);

}


?>