<?php
require_once(dirname(__FILE__).'/../app/controller/before_view.php');

if(!isset($_GET['type']) || !isset($_GET['user_id'])){
    header("Location: index.php");
    exit();
}

$profile_user = User::findById($_GET['user_id']);

if(!$profile_user){
    header("Location: index.php");
    exit();
}

if($_GET['type'] === "follow"){
    $f_users = $profile_user->following_users();
}

if($_GET['type'] === "follower"){
    $f_users = $profile_user->follower_users();
}

// typeが"follow"でも"follower"でもない場合
if(!isset($f_users)){
    header("Location: index.php");
    exit();
}

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜<?php if($_GET['type'] === "follow"){print "フォロー中のユーザー";}else{print "フォロワー";} ?></title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/follow.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="../js/follow_ajax.js"></script>

    </head>

    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>

        <div class="bread-nav">
            <a href="index.php">トップ</a>><a href="profile.php">ユーザー</a>>
            <?php if($_GET['type'] === "follow"): ?>
            <a href="follow.php?type=follow&user_id=<?php print $profile_user->id ?>">フォロー中のユーザー</a>
            <?php else: ?>
            <a href="follow.php?type=follower&user_id=<?php print $profile_user->id ?>">フォローされてるユーザー</a>
            <?php endif ?>
        </div>

        <?php if($_GET['type'] === "follow"): ?>
            <h2><?php print $profile_user->name ?>さんがフォローしているユーザー</h2>
        <?php else: ?>
            <h2><?php print $profile_user->name ?>さんをフォローしているユーザー</h2>
        <?php endif ?>

        <div id="follow-container">
            <div class="follow-tab-box">
                <a href="follow.php?type=follow&user_id=<?php print $profile_user->id ?>">
                    <div class="follow-tab <?php if($_GET['type'] === "follow") print "now" ?>">
                        フォロー(<span class="following_num"><?php print count($profile_user->following_users()) ?></span>)
                    </div>
                </a>
                <a href="follow.php?type=follower&user_id=<?php print $profile_user->id ?>">
                    <div class="follower-tab <?php if($_GET['type'] === "follower") print "now" ?>">
                        フォロワー(<span><?php print count($profile_user->follower_users()) ?></span>)
                    </div>
                </a>
            </div>

            <?php foreach($f_users as $f_user): ?>
            <div class="user-container">
                <div class="user-container-left">
                    <a href="profile.php?id=<?php print $f_user->id ?>">
                        <img src="../<?php print $f_user->image() ?>">
                    </a>

                    <a href="profile.php?id=<?php print $f_user->id ?>">
                        <span><?php print $f_user->name ?></span>
                    </a>
                </div>
                <div class="user-container-right">
                    <?php if(isset($current_user) && $profile_user->id === $current_user->id && $_GET['type'] === "follow"): ?>
                    <form method="post" action="../app/controller/follow_delete.php" id="follow-form">
                        <input type="hidden" name="from_followList" value="from_followList">
                        <input type="hidden" name="user_id" value="<?php print $f_user->id ?>">
                        <input type="submit" value="フォロー中" class="submit follow-btn">
                    </form>
                    <?php endif ?>
                </div>
            </div>
            <?php endforeach ?>

        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>

    </body>
</html>