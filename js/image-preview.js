// グローバル変数定義
// html文書がロードされた瞬間に実行される




// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される

$(function() {
	$('#img-field').on('click', function(){
    $('.file').trigger("click");
  });

  // 選択された画像を取得し表示
  $('.file').on('change', function(e){
    file = e.target.files[0];
    reader = new FileReader();

    reader.onload = function (e) {
      $('#img-field').attr('src', e.target.result);
    }

    reader.readAsDataURL(file); // 画像の読み込み

  });
});
