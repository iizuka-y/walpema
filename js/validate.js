// グローバル変数定義
// html文書がロードされた瞬間に実行される




// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される
window.onload = function (){
  
  // ログイン、新規登録時のバリデーション
  $('.login-btn').on('click', function(){
    var flag = 0;

    if($('.user_name').val() === ""){
      $('.userNameMsg').html("ユーザー名を入力してください");
      flag = 1;
    }

    if($('.password').val() === ""){
      $('.passwordMsg').html("パスワードを入力してください");
      flag = 1;
    }

    if($('.email').val() === ""){
      $('.emailMsg').html("メールアドレスを入力してください");
      flag = 1;
    }

    if(flag === 1){
      return false;
    }
  });

  // 壁紙を投稿するときのバリデーション
  $('.submit').on('click', function(){
    var flag = 0;

    if($('.title').val() === ""){
      $('.titleMsg').html("タイトルを入力してください");
      flag = 1;
    }

    if($('.explanation').val() === ""){
      $('.explanationMsg').html("説明を入力してください");
      flag = 1;
    }

    if($('.tag').val() === ""){
      $('.tagMsg').html("説明を入力してください");
      flag = 1;
    }

    if($('.price').val() === ""){
      $('.priceMsg').html("価格を入力してください");
      flag = 1;
    }

    if(flag === 1){
      return false;
    }
    
  });


  
  // プロフィールページのバリデーション
  $('.edit-submit').on('click', function(){
    var flag = 0;

    if($('.user_name').val() === ""){
      $('.userNameMsg').html("ユーザー名を入力してください");
      flag = 1;
    }

    if(flag === 1){
      return false;
    }

  });


}
