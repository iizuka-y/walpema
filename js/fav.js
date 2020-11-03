// グローバル変数定義
// html文書がロードされた瞬間に実行される




// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される
window.onload = function (){

  $('.fav').on('click', function(){
    if($(this).attr('src') === "../images/fav-0.png"){

      $(this).attr('src', '../images/fav-1.png');

    }else{

      $(this).attr('src', '../images/fav-0.png');

    }
    
  });

}

