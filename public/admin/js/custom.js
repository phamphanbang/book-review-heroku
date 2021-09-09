$(function () {
    $("#image").change(function () {
        $("#output").attr("src", URL.createObjectURL($(this)[0].files[0]));
    });

    
});

$(document).ready(function() {
    $("#categorySelect2").select2();
    $("#tagSelect2").select2();
    $(".category-button").click(function (){
        $("#categorySelect2").val($(this).attr("id"));
        $('#categorySelect2').trigger("change");
    });
    $(".confirm").click(function (e) { 
        var item_id = $(this).attr("item-id");
        var item_type = $(this).attr("item-type");
        var lang = $(this).attr("lang");
        var link = "admin/"+item_type+"/"+item_id +"/delete";
        $.confirm({
            title: lang==="vi"?"XÓA":"DELETE",
            content: lang==="vi"?"Bạn đã chắc muốn xóa vật phẩm này":"Do you want to delete this item",
            buttons: {
                customConfirm: {
                    text: lang==="vi"?"Xác nhận":"Confirm",
                    keys: ["enter", "shift"],
                    action: function(){
                        location.href = link;
                    }
                },
                customCancel: {
                    text: lang==="vi"?"Hủy":"Cancel",
                    keys: ["enter", "shift"],
                    action: function(){
                        $.alert(lang==="vi"?"Hủy thành công":"Cancel Success");
                    }
                }
            }
        });     
    });
});