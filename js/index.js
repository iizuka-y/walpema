// グローバル変数定義
// html文書がロードされた瞬間に実行される




// オンロードイベント
// <body>に指定された各エレメントが表示され準備が整ったら実行される
window.onload = function (){

    $('.slider').slick(
        {
          dots: true,
          arrows: true,
          slidesToShow: 1,
          slidesToScroll: 1,
          centerMode: true,
          swipe: true,
          autoplay: true,
          autoplaySpeed: 3000
        }
      );

}
