<div class="user-info">
    <div class="user-info-left">
        <h2><?php print $user->name ?></h2>
        <div class="self-introduction">
            <?php print $user->self_introduction ?>
        </div>

        <div class="follow-and-point">
            <p><a href="follow.php?type=follow&user_id=<?php print $user->id ?>">フォロー　　　<span class="follew_num"><?php print count($user->following_users()) ?></span></a></p>
            <p><a href="follow.php?type=follower&user_id=<?php print $user->id ?>">フォロワー　　<span class="follower_num"><?php print count($user->follower_users()) ?></span></a></p>
        </div>

        <?php if(isset($current_user) && $user->id === $current_user->id): ?>
        <div class="logout"><a href="../app/controller/logout.php">ログアウトする</a></div>
        <?php endif ?>
    </div>


    <div class="user-info-right">

        <img src="../<?php print $user->image() ?>">
 

        <?php if(isset($current_user) && $user->id === $current_user->id): ?>
        <a href="profile_edit.php" class="button">プロフィールを編集する</a>
        <?php else: ?>

            <?php if($thisUser = is_followed()): ?>

            <form method="post" action="../app/controller/follow_delete.php" id="follow-form">
                <input type="hidden" name="user_id" value="<?php print $user->id ?>">
                <input type="submit" value="フォロー解除" class="button follow-btn">
            </form>

            <?php else: ?>

            <form method="post" action="../app/controller/follow_create.php" id="follow-form">
                <input type="hidden" name="user_id" value="<?php print $user->id ?>">
                <input type="submit" value="フォローする" class="button follow-btn">
            </form>
                
            <?php endif ?>

        <?php endif ?>

    </div>
</div>
