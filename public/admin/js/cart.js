$(function () {
	$("#cart-status").change(function () {
		let url = "admin/cart/type/" + $(this).val();
		document.location.href = url;
	});
});
