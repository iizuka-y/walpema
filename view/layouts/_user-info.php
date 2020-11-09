<div class="user-info">
    <div class="user-info-left">
        <h2><?php print $user['user_name'] ?></h2>
        <div class="self-introduction">
            <?php $user['self_introduction'] ?>
        </div>

        <div class="follow-and-point">
            <p><a href="follow.php">フォロー　　　70</a></p>
            <p><a href="follower.php">フォロワー　　70</a></p>
        </div>

        <?php if($user['id'] === $current_user['id']): ?>
        <div class="logout"><a href="../app/controller/logout.php">ログアウトする</a></div>
        <?php endif ?>
    </div>


    <div class="user-info-right">
        <?php if($user['image']): ?>
        <img src="../images/hyoujou_shinda_me_man.png">
        <?php else: ?>
        <img src="../images/default-user-image.png">
        <?php endif ?>

        <?php if($user['id'] === $current_user['id']): ?>
        <a href="profile_edit.php" class="button">プロフィールを編集する</a>
        <?php else: ?>
        <a href="#" class="button">フォローする</a>
        <?php endif ?>

    </div>
</div>
