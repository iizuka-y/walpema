var $form;
var formAction;
var followState;

$(document).ready(function() { 

    $('.follow-btn').on('click', function(e){
        // console.log('click!');
        e.preventDefault(); // 通常時のアクションをキャンセル

        $form = $(this).parents('#follow-form');

        if($(this).val() === 'フォローする'){

            formAction = '../app/controller/follow_create.php';
            followState = 'フォロー解除';

        }else{

            formAction = '../app/controller/follow_delete.php';
            followState = 'フォローする';

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
            

        }).fail(function(){
            // 失敗時
            console.log('ajax error');

        }).always(function(){
            // 成功失敗に関係なく実行
            $('.follow-btn').attr('disabled', false); // ボタンの無効化を解除

        });

    });


});