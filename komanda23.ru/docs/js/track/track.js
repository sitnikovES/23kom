var myMap2;
var route;
// Дождёмся загрузки API и готовности DOM.
ymaps.ready(initt);

function initt () {
	// Создание экземпляра карты и его привязка к контейнеру с
	// заданным id ("map2").
	myMap2 = new ymaps.Map('map2', {
		// При инициализации карты обязательно нужно указать
		// её центр и коэффициент масштабирования.
		//center: [45.036979,38.981854], //
		center: [latitude, longitude], //
		zoom: 12
	});
}