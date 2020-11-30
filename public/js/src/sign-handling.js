$(document).ready(function () {
    new WOW().init();
	$(document).on('keydown', function (e) {
		var value = e.KeyCode;
		if (value == 13) {
			console.log(value);
		}
	});
	$('.errors .email-error').click(function () {
		$('.input .email').focus();
	});
	$('.submit-btn').click(function () {
		$('.errors').load("../backend/account/login-handling.php", {
			email: $('.email').val(),
			password: $('.password').val(),
			always_signed: $('#always-signed').val()
		});
	});
});