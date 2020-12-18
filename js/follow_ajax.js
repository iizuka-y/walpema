// このJS処理はプロフィールページからフォロー解除するときとフォロー一覧からフォロー解除時に使用

var $form;
var formAction;
var followState;
var follower_num; // プロフィールページからのフォロー解除用
var following_num; // フォロー一覧からフォロー解除用

$(document).ready(function() { 

    $('.follow-btn').on('click', function(e){
        // console.log('click!');
        e.preventDefault(); // 通常時のアクションをキャンセル

        $form = $(this).parents('#follow-form');

        follower_num = $('.follower_num').text();
        following_num = $('.following_num').text();

        if($(this).val() === 'フォローする'){

            formAction = '../app/controller/follow_create.php';
            followState = 'フォロー中';
            follower_num ++;
            following_num ++;

        }else{

            formAction = '../app/controller/follow_delete.php';
            followState = 'フォローする';
            follower_num --;
            following_num --;
        }



        $.ajax({
            url : formAction,
            type : $form.attr('method'),
            data : $form.serialize(),
            timeout : 10000,
            beforeSend : function(){
                $('.follow-btn').attr('disabled', true); // ボタンを無効化する
            }

        }).done(function(data){
            // 成功時
            console.log('ajax success');
            $('.follow-btn').val(followState);
            $('.follower_num').text(follower_num);
            $('.following_num').text(following_num);
            

        }).fail(function(){
            // 失敗時
            console.log('ajax error');

        }).always(function(){
            // 成功失敗に関係なく実行
            $('.follow-btn').attr('disabled', false); // ボタンの無効化を解除

        });

    });


});