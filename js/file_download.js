$(document).ready(function(){

    btnLockCheck();

    $('.download-checkbox').on('click', function(){

        $('.download-checkbox').prop('checked', false);

        $(this).prop('checked', true);
        
        const item_id = $(this).prev().val();

        console.log(item_id);

        $('#post_item_id').val('');

        $('#post_item_id').val(item_id);

        btnLockCheck();


    });


    $('.download-btn').on('click', function(e){
        if($(this).hasClass('lock')){
            e.preventDefault(); // 通常時のアクションをキャンセル
        }
    });

});




function btnLockCheck(){
    if(!$('#post_item_id').val()){
        $('.download-btn').addClass('lock');
    }else{
        $('.download-btn').removeClass('lock');
    }
}