function theRotator() {
	// Устанавливаем прозрачность всех картинок в 0
	$('#rotator ul li').css({opacity: 0.0});
 
	// Берем первую картинку и показываем ее (по пути включаем полную видимость)
	$('#rotator ul li:first').css({opacity: 1.0});
 
	// Вызываем функцию rotate для запуска слайдшоу, 5000 = смена картинок происходит раз в 5 секунд
	setInterval('rotate()',5000);
}
 
function rotate() {	
	// Берем первую картинку
	var current = ($('#rotator ul li.show')?  $('#rotator ul li.show') : $('#rotator ul li:first'));
 
	// Берем следующую картинку, когда дойдем до последней начинаем с начала
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('#rotator ul li:first') :current.next()) : $('#rotator ul li:first'));
 
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
    $('#rotator ul li').css({opacity: 0.0});
    $('#rotator ul li:first')
        .css({opacity: 1.0})
        .addClass("show");

	$("#slider_camera").show();

	$("#rotator ul li:first").addClass("show");
    theRotator();
});