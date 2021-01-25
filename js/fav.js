// グローバル変数定義
// html文書がロードされた瞬間に実行される

var $form;
var formAction;
var imageSrc;
var favState;


// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される
window.onload = function () {

    $('.fav').on('click', function (e) {

        e.preventDefault(); // 通常時のアクションをキャンセル

        $form = $(this).parents('#fav-form');

        if ($(this).attr('src') === "../images/fav-0.png") {

            formAction = "../app/controller/favorite_create.php";
            imageSrc = "../images/fav-1.png";
            favState = "お気に入り登録済み";

        } else {

            formAction = "../app/controller/favorite_delete.php";
            imageSrc = "../images/fav-0.png";
            favState = "お気に入り登録する";

        }

        // console.log($form.serialize());

        $.ajax({
            url: formAction,
            type: $form.attr('method'),
            data: $form.serialize(), // データにFormをserializeした結果を入れる
            timeout: 10000,
            beforeSend: function () {
                $('.fav').attr('disabled', true); // ボタンを無効化する
            }

        }).done(function (data) {
            // 成功時
            console.log('ajax success');
            // $form.attr('action', formAction);
            $('.fav').attr('src', imageSrc);
            $('.fav-state').text(favState);

        }).fail(function () {
            // 失敗時
            console.log('ajax error');

        }).always(function () {
            // 成功失敗に関係なく実行
            $('.fav').attr('disabled', false); // ボタンの無効化を解除

        });


    });

    $('.fav-state').on('click', function () {
        $('.fav').trigger('click');
    });

}

