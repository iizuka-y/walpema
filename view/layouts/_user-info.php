<div class="user-info">
    <div class="user-info-left">
        <h2><?php print $user->name ?></h2>
        <div class="self-introduction">
            <?php print $user->self_introduction ?>
        </div>

        <div class="follow-and-point">
            <p><a href="follow.php">フォロー　　　70</a></p>
            <p><a href="follower.php">フォロワー　　70</a></p>
        </div>

        <?php if(isset($current_user) && $user->id === $current_user->id): ?>
        <div class="logout"><a href="../app/controller/logout.php">ログアウトする</a></div>
        <?php endif ?>
    </div>


    <div class="user-info-right">
        <?php if($user->image): ?>
        <img src="../<?php print $user->image ?>">
        <?php else: ?>
        <img src="../images/default-user-image.png">
        <?php endif ?>

        <?php if(isset($current_user) && $user->id === $current_user->id): ?>
        <a href="profile_edit.php" class="button">プロフィールを編集する</a>
        <?php else: ?>

            <?php if($thisUser = is_followed()): ?>

            <form method="post" action="../app/controller/follow_delete.php">
                <input type="hidden" name="user_id" value="<?php print $user->id ?>">
                <input type="submit" value="フォロー解除" class="button">
            </form>

            <?php else: ?>

            <form method="post" action="../app/controller/follow_create.php">
                <input type="hidden" name="user_id" value="<?php print $user->id ?>">
                <input type="submit" value="フォローする" class="button">
            </form>
                
            <?php endif ?>

        <?php endif ?>

    </div>
</div>
