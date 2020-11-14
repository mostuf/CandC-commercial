$(document).ready(function(){
    function pickDate(){
        $('.pickingDate:not(.closed)').click(function(){
            $(".pickingDate").removeClass("selected");
            if($(this).find('input[type="radio"][name="order.pickingDate"]').is(":checked"))
            {
                $(this).addClass("selected");
            }
        });
        $("#next-week,#previous-week").one("click",function(){
            $.ajax({
                url: "/Order/Calendar",
                method: "POST",
                data: { date : $(this).data("date")},
                success: function(data){
                    $("#collectTiming").html(data);
                    pickDate();
                }
            });
        });
    }
    pickDate();
});