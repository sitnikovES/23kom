<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Такси Команда. Расчет расстояния';

$this->registerCssFile('@web/css/track.css', [], 'track_css');


//карта яндекса
$this->registerJsFile('//api-maps.yandex.ru/2.1/?lang=ru_RU', ['position'=>$this::POS_HEAD], 'ya_map_api_js');
$this->registerJsFile('@web/js/yamap/yamap.js', ['position'=>$this::POS_END], 'yamap_js');
$this->registerJsFile('@web/js/track/track.js', ['position'=>$this::POS_END], 'track_js');




$this->registerMetaTag(['name' => 'description', 'content' => 'здесь можрно расчитать расстояние между городами'], 'description');
$this->registerMetaTag(['name' => 'keywords', 'content' => 'расчет расстояний, рассчет растояния между городами'], 'keywords');
//$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    var longitude = <?php echo $current_city["longitude"]; ?>;
    var latitude = <?php echo $current_city["latitude"]; ?>;
</script>
<div class="block_content">
<h1>Расчет расстояний</h1>
<table style="font-size:14px;">
<tr>
	<td>Начало маршрута</td><td>Конец маршрута</td>
</tr>
<tr>
	<td><input type="text" id="punktA" placeholder="Город, адрес" /></td>
	<td><input type="text" id="punktB" placeholder="Город, адрес" /></td>
	<td><button onclick="qwerty();">Показать</button></td>
</tr>
</table>
<br>
<span id="trackLength"></span>
<br>
<div id="map2"></div>
</div>

<script>
function qwerty(){
	punktA = document.getElementById("punktA").value;
	punktB = document.getElementById("punktB").value;
	document.getElementById("trackLength").innerHTML = 'Идет построение маршрута...';
	//ymaps.route(['Москва, Белорусский вокзал', 'Москва, Лефортово'], {mapStateAutoApply:true}).then(
	ymaps.route([punktA, punktB], {mapStateAutoApply:true, routingMode:"auto"}).then(
		function(router) {
			route && myMap2.geoObjects.remove(route);
			route = router;
			myMap2.geoObjects.add(route);
			document.getElementById("trackLength").innerHTML = 'Длина маршрута = ' + route.getHumanLength()
		},
		function(error) {
			document.getElementById("trackLength").innerHTML = 'Невозможно построить маршрут';
		}
	);
}
</script>