function theRotator() {
	// ������������� ������������ ���� �������� � 0
	$('#rotator ul li').css({opacity: 0.0});
 
	// ����� ������ �������� � ���������� �� (�� ���� �������� ������ ���������)
	$('#rotator ul li:first').css({opacity: 1.0});
 
	// �������� ������� rotate ��� ������� ��������, 5000 = ����� �������� ���������� ��� � 5 ������
	setInterval('rotate()',5000);
}
 
function rotate() {	
	// ����� ������ ��������
	var current = ($('#rotator ul li.show')?  $('#rotator ul li.show') : $('#rotator ul li:first'));
 
	// ����� ��������� ��������, ����� ������ �� ��������� �������� � ������
	var next = ((current.next().length) ? ((current.next().hasClass('show')) ? $('#rotator ul li:first') :current.next()) : $('#rotator ul li:first'));
 
	// ���������� ������ �����������/��������� ��� ������ ��������, css-����� show ����� ������� z-index
	next.css({opacity: 0.0})
        .addClass('show')
        .animate({opacity: 1.0}, 1000);
 
	// ������ ������� ��������
	current.animate({opacity: 0.0}, 1000)
        .removeClass('show');
}

$(document).ready(function(){
	// ��������� ��������
    $('#rotator ul li').css({opacity: 0.0});
    $('#rotator ul li:first')
        .css({opacity: 1.0})
        .addClass("show");

	$("#slider_camera").show();

	$("#rotator ul li:first").addClass("show");
    theRotator();
});