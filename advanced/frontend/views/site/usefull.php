<?php

//use Yii;
//use yii\helpers\Html;
use frontend\assets\PrettyphotoAsset;

/* @var $this yii\web\View */
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 30.06.2016
 * Time: 11:26
 */

$this->registerAssetBundle(PrettyphotoAsset::className());

?>
<div class="block_content">
    <div id="div_main" class="div_body">
        <h1>Мобильное приложение для водителя.</h1>
        <a href="http://uptaxi.ru/m" target="_blank"><img height="32" src="/img/program/googleplay.png"></a><br>
        Мобильное приложение работает на базе операционной системы Android (требования: версия ОС Android от 2.2, gps приемник, интернет).

        <h2>Основные возможности</h2>
        <ul>
            <li>Автораспределение или автоназначение заказа.</li>
            <li>Встречные заказы.</li>
            <li>Самостоятельный выбор нераспределенных и предварительных заказов из квадратов (районов города).</li>
            <li>Встроенный gps таксометр. Рассчитывает время простоя и время в пробках. Имеет очень гибкие настройки.</li>
            <li>Фиксированная стоимость поездки по предварительному расчёту.</li>
            <li>Самостоятельная установка водителем опций, таких как: курящий салон, детское кресло, пустой багажник, провода прикуривателя.</li>
            <li>Чат с операторами, шаблоны сообщений.</li>
            <li>Интеграция с Yandex и Osmand навигатором. Позволяет автоматически прокладывать маршрут к месту назначения.</li>
            <li>Воспроизведение голосом суммы оплаты за проезд, а также голосовое приветствие и прощание с пассажиром.</li>
            <li>Добавление в систему анкеты другого водителя.</li>
            <li>Отправка пассажиру ссылки на скачивание мобильного приложения.</li>
            <li>Отслеживание транзакций по счету водителя, уведомление о состоянии счета.</li>
            <li>Денежные переводы между водителями.</li>
            <li>Правила работы, новости и доп. информация фирмы.</li>
            <li>Отслеживание рейтинга водителя: текущий, средний рейтинг, история;</li>
            <li>Покупка безлимитных и специальных тарифов.</li>
            <li>Фиксирование истории поездок и сообщений.</li>
            <li>Обратная связь с руководством фирмы и тех. поддержкой.</li>
            <li>Запись трека заказа и любых действий водителя внутри приложения.</li>
            <li>Карта с отображением всех водителей фирмы (опционально).</li>
        </ul>
        <h2>Водительское приложение имеет простой, понятный и удобный интерфейс.</h2>
    </div>
    <ul class="gallery clearfix">
        <li style="display: inline;"><a href="/img/uptaxi/d1.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/d1-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/d2.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/d2-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/d23.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/d23-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/d4.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/d4-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/d5.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/d5-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/dm.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/dm-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/dmes.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/dmes-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/do.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/do-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/dp.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/dp-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/dr.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/dr-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/ds.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/ds-150x150.png" width="150" height="150" /></a></li>
        <li style="display: inline;"><a href="/img/uptaxi/drivermap.png" rel="prettyPhoto[pp_gal]"><img src="/img/uptaxi/drivermap-150x150.png" width="150" height="150" /></a></li>
    </ul>

</div>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();
        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
    });
</script>