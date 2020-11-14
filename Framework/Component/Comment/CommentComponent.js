$(document).ready(function(){
    $(".comment .form .send").click(function(){
        var comment = {
            idUser : $(".comment .form .idUser").val(),
            idAttachement : $(".comment .form .idAttachement").val(),
            message : $(".comment .form .message").val(),
            typeComment : $(".comment .form .typeComment").val()
        }
        $.ajax({
            method: "post",
            url: "/Comment/Add",
            data: comment,
            success: function(data){
                $(".comment .list").prepend(data);
            }
        })
    })
});