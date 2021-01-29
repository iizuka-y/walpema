<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');
if(!isset($_GET['id'])){
    header("Location: index.php");
    exit();
}
$user_id = $_GET['id'];
$user = User::findbyId($user_id);

if(!$user){
    header("Location: index.php");
    exit();
}

function is_followed(){
    global $current_user, $user;
    if(isset($current_user)){
        $params = [
            "following_id" => $current_user->id,
            "followed_id" => $user->id
        ];

        if(Follow::find($params)){
            return true;
        }
        return false;
    }
    
    return false;
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜投稿した壁紙</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/mypage.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/main.js"></script>
        <?php if(isset($current_user)): ?>
        <script type="text/javascript" src="../js/follow_ajax.js"></script>
        <?php endif ?>
    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php?id=<?php print $user->id ?>">ユーザー</a>><a href="profile.php">投稿した壁紙</a>
        </div>

        <div id="user-container">

            <?php require_once('layouts/_user-info.php'); //ユーザー情報の読み込み ?>

            <?php
            if(isset($current_user) && $user->id === $current_user->id){
                require_once('layouts/_user-nav.php'); //ナビゲーションの読み込み
            }
            ?>

            <div class="nav-content flex">
                <?php if($user->items()): ?>
                <div class="sales-management-container">
                    <a href="sales_management.php">売上管理ページへ▶</a>
                </div>
                    <?php foreach($user->items() as $item): ?>
                    <div class="img-container">
                        <a href="wallpaper_detail.php?id=<?php print $item->id ?>">
                            <div class="img-box">
                                <img src="../<?php print $item->image ?>">
                            </div>
                            <div class="img-name"><?php print $item->name ?></div>
                        </a>
                    </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div>投稿した壁紙はありません</div>
                <?php endif ?>

            </div>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>