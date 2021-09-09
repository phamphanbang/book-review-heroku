$(function () {
    $(".review-option-button").click(function () {
        $(this).siblings(".review-option-list").toggleClass("display_none");
    });

    $(".report").click(function () { 
		var reportType = $(this).attr("reportType");
		var userId = $(this).attr("userId");
		var subjectId = $(this).attr("subjectId");
        var link_to_subject = $(location).attr("href");
		$.ajaxSetup({
			headers: {
				"X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
			}
		});
		$.ajax({
			type: "post",
			url: "report/"+userId,
			data: { reportType,subjectId,link_to_subject },
			success (res) {
				var message='<div class="flash alert-info"><p class="panel-body display-message">'
				+ res.message +'</p></div>';
				$(".navbar.navbar-default.navbar-custom").after(message);
			},
		});
	});
});