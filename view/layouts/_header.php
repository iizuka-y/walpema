<?php
require_once(dirname(__FILE__).'/../../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../../app/fn_components/cart_processing.php');

$number_of_CartItems = count(get_cartItem());

if(isset($current_user)){
    $notification_records = Notification::where(['user_id' => $current_user->id]);
    $new_notifications = [];

    foreach($notification_records as $notification){
        if(!$notification->read){
            $new_notifications[] = $notification;
        }
    }

    $number_of_notifications = count($new_notifications);
}

?>

<header>

    <div class="header-left">

        <h1>
            <a href="./index.php" class="logo"><img src="../images/logo.png" alt="ウォルペマ"></a>
        </h1>



        <form method="get" action="wallpaper_list.php" class="search_container">
            <input type="text" size="25" placeholder="　作品を検索" name="search" id="search">
            <input type="submit" value="&#xf002">
        </form>

    </div>

    <nav>
        <?php if(isset($current_user)): ?>
        <ul>
            <li><a href="profile.php?id=<?php echo $current_user->id ?>"><img src="../images/mypage.png" alt="マイページ"></a></li>
            <li><a href="notice.php"><img src="../images/news.png" alt="お知らせ"></a><?php if($number_of_notifications > 0){print "<span class=\"number-of-notification\">${number_of_notifications}</span>";} ?></li>
            <li><a href="wallpaper_list.php?type=fav"><img src="../images/okiniiri.png" alt="お気に入り"></a></li>
            <li><a href="cart.php"><img src="../images/cart.png" alt="カート"></a><?php if($number_of_CartItems > 0){print "<span class=\"number-of-cartItem\">${number_of_CartItems}</span>";} ?></li>
        </ul>
        <?php else: ?>
        <ul>
            <li><a href="cart.php"><img src="../images/cart.png" alt="カート"></a><?php if($number_of_CartItems > 0){print "<span class=\"number-of-cartItem\">${number_of_CartItems}</span>";} ?></li>
            <li><a href="login.php"><img src="../images/login.png" alt="ログイン"></a></li>
        </ul>
        <?php endif ?>
    </nav>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/search.js"></script>
</header>