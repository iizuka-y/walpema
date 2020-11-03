<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">

        <title>ウォルペマ｜チャット</title>

        <link rel="stylesheet" type="text/css" href="../css/reset.css">
        <link rel="stylesheet" type="text/css" href="../css/common.css">
        <link rel="stylesheet" type="text/css" href="../css/chat.css">

        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    </head>
    <body>

        <?php require_once('layouts/_header.php'); //headerの読み込み ?>
        

        <div id="chatUser-container">
            <div class="chatUser-innerbox">
                <div class="arrow"><a href="mypage.html">＜</a></div>
                <img src="../images/hyoujou_shinda_me_man.png">
                <div class="user-name">ユーザー一号</div>
            </div>
        </div>

        <div id="chat-container">

            <div class="yourChatBox">
                <div class="mycomment">
                    <p>
                        自分のチャット内容です
                    </p>
                </div>
            </div>

            <div class="otherChatBox">
                <div class="balloon6">
                  <div class="faceicon">
                    <img src="../images/hyoujou_shinda_me_man.png">
                  </div>
                  <div class="chatting">
                    <div class="says">
                      <p>相手のチャット内容です</p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="yourChatBox">
                <div class="mycomment">
                    <p>
                        自分のチャット内容です
                    </p>
                </div>
            </div>

            <div class="otherChatBox">
                <div class="balloon6">
                  <div class="faceicon">
                    <img src="../images/hyoujou_shinda_me_man.png">
                  </div>
                  <div class="chatting">
                    <div class="says">
                      <p>相手のチャット内容です</p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="yourChatBox">
                <div class="mycomment">
                    <p>
                        自分のチャット内容です
                    </p>
                </div>
            </div>

            <div class="otherChatBox">
                <div class="balloon6">
                  <div class="faceicon">
                    <img src="../images/hyoujou_shinda_me_man.png">
                  </div>
                  <div class="chatting">
                    <div class="says">
                      <p>相手のチャット内容です</p>
                    </div>
                  </div>
                </div>
            </div>

            <div class="yourChatBox">
                <div class="mycomment">
                    <p>
                        自分のチャット内容です
                    </p>
                </div>
            </div>

            <div class="otherChatBox">
                <div class="balloon6">
                  <div class="faceicon">
                    <img src="../images/hyoujou_shinda_me_man.png">
                  </div>
                  <div class="chatting">
                    <div class="says">
                      <p>相手のチャット内容です</p>
                    </div>
                  </div>
                </div>
            </div>

        </div>

        <div id="chatPost-container">
            <form method="post" action="m-chat.html">
                <textarea></textarea>
                <input type="submit" value="送信" class="submit">
            </form>
        </div>

        <?php require_once('layouts/_footer.php'); //footerの読み込み ?>
        
    </body>
</html>