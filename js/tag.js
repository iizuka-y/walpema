var tagList;

$(function() {

    $.ajax({
        type: "get",
		url: "../app/json/tag.php",
	}).done(function (data) {

        console.log(data);
		tagList = JSON.parse(data || "null"); // JSONを読み込む（リストを取得する）
        console.log(tagList);
        
        $('#tag-input').tagit({
            availableTags: tagList
        });

	}).fail(function (data) {
		console.log(data);
	});

});