$(document).ready(function () {
	$("#cart-check").click(function () {
		var checkValid = true;
		$(".item").each((x, y) => {
			var stock = parseInt($(y).children(".stock").html(),10);
			var quantity = parseInt($(y).children(".quantity").html(),10);
			if (quantity > stock) {
				checkValid = false;
				$(y).addClass("fail");
				$(y).children(".status").html("X");
				$(y).children(".status").removeClass("success");
			}
			else {
				$(y).children(".status").html("O");
				$(y).children(".status").addClass("success");
			}
		});
		if (!checkValid) {
			$("#cart-submit").prop("disabled", true);
		}
		else {
			$(this).addClass("display-hidden");
			$("#cart-submit").removeClass("display-hidden");
		}
	});
});
