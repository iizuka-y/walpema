<?php

function file_upload($files){
    global $errorMsg;

    if(!isset($files) || !is_uploaded_file($files['tmp_name'])){
        return null;
    }

    $directory_path = "../../upload";
    if(!file_exists($directory_path)){
        mkdir($directory_path);
    }
    
    // 保存する画像の名前の生成
    $img_name = date ( "YmdHis" );
    $img_name .= mt_rand ();
    
    switch (exif_imagetype($files['tmp_name'])){
        case IMAGETYPE_JPEG:
            $img_name .= '.jpg';
            break;
        case IMAGETYPE_GIF:
            $img_name .= '.gif';
            break;
        case IMAGETYPE_PNG:
            $img_name .= '.png';
            break;
        default :
            $errorMsg[] = "投稿できる画像はjpg,png,gifのみです";
            return null;
    }
    
    $img_path = 'upload/'.$img_name;
    
    if(!move_uploaded_file($files['tmp_name'], '../../'.$img_path)){
        $errorMsg[] = '画像のアップロードに失敗しました';
    }

    return $img_path;

}

?>