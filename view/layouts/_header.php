<?php
require_once(dirname(__FILE__).'/../../app/controller/before_view.php');
require_once(dirname(__FILE__).'/../../app/fn_components/cart_processing.php');

$number_of_CartItems = count(get_cartItem());

?>

<header>

    <div class="header-left">

        <h1>
            <a href="./index.php" class="logo"><img src="../images/logo.png" alt="ウォルペマ"></a>
        </h1>



        <form method="get" action="wallpaper_list.php" class="search_container">
            <input type="text" size="25" placeholder="　作品を検索" name="search">
            <input type="submit" value="&#xf002">
        </form>

    </div>

    <nav>
        <?php if(isset($current_user)): ?>
        <ul>
            <li><a href="profile.php?id=<?php echo $current_user->id ?>"><img src="../images/mypage.png" alt="マイページ"></a></li>
            <li><a href="notice.php"><img src="../images/news.png" alt="お知らせ"></a></li>
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

</header>