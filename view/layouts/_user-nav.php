<div class="user-nav-container">
    <div class="user-nav" id="profile"><a href="profile.php?id=<?php print $user->id ?>">投稿済みの壁紙</a></div>
    <div class="user-nav" id ="my-bought-wallpaper"><a href="my-bought-wallpaper.php">購入済みの壁紙</a></div>
    <div class="user-nav" id = "post"><a href="post.php">壁紙を投稿する</a></div>
    <div class="user-nav" id = "chat-list"><a href="chat-list.php">チャット</a></div>
</div>

<script type="text/javascript">
    var url = location.href; // urlを取得
    // console.log(url);
    
    if(url.includes('profile.php')){

        $('#profile').addClass('now');

    }else if(url.includes('my-bought-wallpaper.php')){

        $('#my-bought-wallpaper').addClass('now');

    }else if(url.includes('post.php') || url.includes('post_check.php')){

        $('#post').addClass('now');
        
    }else if(url.includes('chat-list.php')){

        $('#chat-list').addClass('now');

    }

</script>