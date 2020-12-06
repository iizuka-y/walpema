<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(isset($_SESSION['errorMsg'])){
    $errorMsgs = fnc_getData("session", "errorMsg");
    fnc_delData("session", "errorMsg", "");
}else{
    header("Location: index.php");
    exit();
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜エラー</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>

    <body>
        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        <h2>エラー</h2>

        <ul id="errorMsg-box">
            <?php foreach($errorMsgs as $errorMsg): ?>
            <li><?php print $errorMsg ?>/li>
            <?php endforeach ?>
        </ul>

        <p><a href="index.php">トップに戻る</a></p>
    </body>
</html>