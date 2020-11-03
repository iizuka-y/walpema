// グローバル変数定義
// html文書がロードされた瞬間に実行される




// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される

$(function() {
	$('#img-field').on('click', function(){
    $('.file').trigger("click");
  });
});
