var  intervalId = 0;

function rotate() {
    //console.log('next');
	// Берем первую картинку
	var current = ($('#main_slider ul li.show')?  $('#main_slider ul li.show') : $('#main_slider ul li:first'));
 
	// Берем следующую картинку, когда дойдем до последней начинаем с начала
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('#main_slider ul li:first') :current.next()) : $('#main_slider ul li:first'));
 
	// Подключаем эффект растворения/затухания для показа картинок, css-класс show имеет больший z-index
	next.css({opacity: 0.0})
        .addClass('show')
        .animate({opacity: 1.0}, 1000);
 
	// Прячем текущую картинку
	current.animate({opacity: 0.0}, 1000)
        .removeClass('show');
}

$(document).ready(function(){
    // Запускаем слайдшоу
    $("#slider_camera").show();

    // Устанавливаем прозрачность всех картинок в 0
    $('#main_slider ul li').css({opacity: 0.0});

    // Берем первую картинку и показываем ее (по пути включаем полную видимость)
    $('#main_slider ul li:first')
        .css({opacity: 1.0})
        .addClass("show");

    //запуст слада при загрузке
    //**************************

    $('#main_slider ul li').css({opacity: 0.0});
    $('#main_slider ul li:first')
        .css({opacity: 1.0})
        .addClass("show");

    $("#slider_camera span").html("Отключить слайдшоу");
    $('#main_slider ul').fadeIn();
    intervalId = setInterval('rotate()',5000);
    //**************************

    $("#slider_camera").click(function(){
        if(intervalId == 0){

            $('#main_slider ul li').css({opacity: 0.0});
            $('#main_slider ul li:first')
                .css({opacity: 1.0})
                .addClass("show");

            $("#slider_camera span").html("Отключить слайдшоу");
            $('#main_slider ul').fadeIn();
            intervalId = setInterval('rotate()',5000);
        } else {
            clearInterval(intervalId);
            $('#main_slider ul').fadeOut();
            $('#main_slider ul li').css({opacity: 0.0}).removeClass("show");
            $('#main_slider ul li:first').css({opacity: 1.0}).addClass("show");
            $("#slider_camera span").html("Включить слайдшоу");
            intervalId = 0;
        }
    });
});