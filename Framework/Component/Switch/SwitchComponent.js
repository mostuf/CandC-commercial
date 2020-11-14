$(document).ready(function(){
    $("[data-switch-tooltip]").tooltip();
    $(".switch input[type=checkbox]").change(function(){
        $(this).parents(".switch").find(".realValue").val($(this).is(":checked"));
    });
});