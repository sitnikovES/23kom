$(document).ready(function(){
    $("#head_city").click(function(){
        $("#head_citylist").slideToggle("fast");
    });
    $("#head_citylist").mouseleave(function(){
        $(this).slideUp("fast");
    });
});