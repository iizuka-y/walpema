var validate_config;

$(function () {

	// validate_config.phpからバリデーション設定を取得
	$.ajax({
		type: "get",
		url: "../app/json/validate_config.php",
	}).done(function (data) {

		validate_config = JSON.parse(data || "null");
		// console.log(validate_config);
		set_validation(validate_config);

	}).fail(function (data) {
		console.log(data);
	});


});

// この関数はajaxでバリデーション設定を取得後に実行する
function set_validation(config) {

	// ログイン、新規登録時のバリデーション
	$('.login-btn').on('click', function (e) {

		$('.errorMsg').empty();

		var flag = 0;

		if ($('.user_name').val() === "") {
			$('.userNameMsg').html("ユーザー名を入力してください");
			flag = 1;
		}

		if ($('.user_name').val() && $('.user_name').val().length > config.user_name) {
			$('.userNameMsg').html("ユーザー名は" + config.user_name + "文字までです。");
			flag = 1;
		}

		if ($('.password').val() === "") {
			$('.passwordMsg').html("パスワードを入力してください");
			flag = 1;
		}

		if ($('.password').val() != "" && $('.password').val().length < config.min_password) {
			$('.passwordMsg').html("パスワードは" + config.min_password + "文字以上で入力してください。");
			flag = 1;
		}

		if ($('.password').val().length > config.max_password) {
			$('.passwordMsg').html("パスワードは" + config.max_password + "文字以上で入力してください。");
			flag = 1;
		}

		if ($('.email').val() === "") {
			$('.emailMsg').html("メールアドレスを入力してください");
			flag = 1;
		}else if (!/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test($('.email').val())) {
			$('.emailMsg').html("正しいメールアドレスを入力してください");
			flag = 1;
		}

		if (flag === 1) {
			return false;
		}
	});

	// 壁紙を投稿するときのバリデーション
	$('.submit').on('click', function () {

		$('.errorMsg').empty();

		var flag = 0;
		console.log($('.file').val());
		if (!$('.file').val()) {
			$('.fileMsg').html("画像を投稿してください");
			flag = 1;
		}

		if ($('.title').val() === "") {
			$('.titleMsg').html("タイトルを入力してください");
			flag = 1;
		}

		if ($('.explanation').val() === "") {
			$('.explanationMsg').html("説明を入力してください");
			flag = 1;
		}

		if ($('.tag').val() === "") {
			$('.tagMsg').html("説明を入力してください");
			flag = 1;
		}

		if ($('.price').val() === "") {
			$('.priceMsg').html("価格を入力してください");
			flag = 1;
		}

		if (flag === 1) {
			return false;
		}

	});



	// プロフィールページのバリデーション
	$('.edit-submit').on('click', function () {

		$('.errorMsg').empty();
		
		var flag = 0;

		if ($('.user_name').val() === "") {
			$('.userNameMsg').html("ユーザー名を入力してください");
			flag = 1;
		}

		if (flag === 1) {
			return false;
		}

	});

}
