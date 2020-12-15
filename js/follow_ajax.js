var $form;
var formAction;
var followState;
var follower_num;

$(document).ready(function() { 

    $('.follow-btn').on('click', function(e){
        // console.log('click!');
        e.preventDefault(); // 通常時のアクションをキャンセル

        $form = $(this).parents('#follow-form');

        follower_num = $('.follower_num').text();

        if($(this).val() === 'フォローする'){

            formAction = '../app/controller/follow_create.php';
            followState = 'フォロー解除';
            follower_num ++;

        }else{

            formAction = '../app/controller/follow_delete.php';
            followState = 'フォローする';
            follower_num --;

        }



        $.ajax({
            url : formAction,
            type : $form.attr('method'),
            data : $form.serialize(),
            timeout : 10000,
            beforeSend : function(){
                $('.follow-btn').attr('disabled', true); // ボタンを無効化する
            }

        }).done(function(date){
            // 成功時
            console.log('ajax success');
            $('.follow-btn').val(followState);
            $('.follower_num').text(follower_num);
            

        }).fail(function(){
            // 失敗時
            console.log('ajax error');

        }).always(function(){
            // 成功失敗に関係なく実行
            $('.follow-btn').attr('disabled', false); // ボタンの無効化を解除

        });

    });


});