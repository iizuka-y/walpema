// グローバル変数定義
// html文書がロードされた瞬間に実行される

var $form;
var formAction;
var imageSrc;


// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される
window.onload = function (){

  $('.fav').on('click', function(e){

    e.preventDefault(); // 通常時のアクションをキャンセル

    $form = $(this).parents('#fav-form');

    if($(this).attr('src') === "../images/fav-0.png"){

      formAction = "../app/controller/favorite_create.php";
      imageSrc = "../images/fav-1.png";

    }else{

      formAction = "../app/controller/favorite_delete.php";
      imageSrc = "../images/fav-0.png";

    }

    // console.log($form.serialize());
    
    $.ajax({
      url : $form.attr('action'),
      type : $form.attr('method'),
      data : $form.serialize(), // データにFormをserializeした結果を入れる
      timeout : 10000,
      beforeSend : function(){
        $('.fav').attr('disabled' , true); // ボタンを無効化する
      }

    }).done(function(data){
      // 成功時
      console.log('ajax success');
      $form.attr('action', formAction);
      $('.fav').attr('src', imageSrc);

    }).fail(function(){
      // 失敗時
      console.log('ajax error');

    }).always(function(){
      // 成功失敗に関係なく実行
      $('.fav').attr('disabled' , false); // ボタンの無効化を解除

    });;

    
  });

}

