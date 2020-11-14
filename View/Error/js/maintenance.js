$(document).ready(function(){
    setInterval(function(){
        progress = (progress*60 + 5)/60;
        $(".progress-maintenance .progress-bar").css("width",(progress/diff)*100 + "%")
    },5000);
    
});