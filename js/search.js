$(document).ready(function(){

	//ajax
	function keyword(){
        var search_input = $("#search").val();
        var data = {
            search: search_input
        }

        $.ajax({
            url: "../app/json/search.php",
            type: "POST",
            data: data,
            timespan: 5000
        }).done(function (data) {

            //入力されるたびに、候補ボックスをリセットする(ajaxから値が帰ってきたときだけ)
            $("#result").empty();
            console.log(data);
            // JSONを読み込む（リストを取得する）
            var search_word = JSON.parse(data || "null");
            console.log(search_word);

            $('#search').autocomplete({
                source: search_word,
                autoFocus: true,
            });

        }).fail(function (data) {
            console.log(data);
        });
    }


    $("#search").keyup(function(){
        keyword();
    });

});