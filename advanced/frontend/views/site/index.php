<?php
use frontend\assets\UptaxiAsset;
use common\models\Data;
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Такси Команда';
//$this->registerCssFile('@web/css/style.css', ['position'=>$this::POS_HEAD], 'site_css');
$this->registerCssFile('@web/css/index.css', ['position'=>$this::POS_HEAD], 'index_css');
$this->registerJsFile('@web/js/index/slider.js', ['position'=>$this::POS_END], 'index_slider_js');

//карта яндекса
$this->registerJsFile('//api-maps.yandex.ru/2.1/?lang=ru_RU', ['position'=>$this::POS_HEAD], 'ya_map_api_js');
$this->registerJsFile('@web/js/yamap/yamap.js', ['position'=>$this::POS_END], 'yamap_js');

$this->registerAssetBundle(UptaxiAsset::className());
?>
<script>
    var longitude = <?php echo $current_city["longitude"]; ?>;
    var latitude = <?php echo $current_city["latitude"]; ?>;
</script>
<div class="block_content">
    <div style="position: relative; top: 20px; z-index: 3;">
        <table>
            <tr>
                <td><a href="<?php echo Data::smart('ios'); ?>"><img src="/img/program/apple.png" class="ind_smart"></a></td>
                <td><a href="<?php echo Data::smart('android'); ?>"><img src="/img/program/googleplay.png" class="ind_smart"></a></td>
                <td><a href="/anketa.html"><img src="/img/program/anketa_driver.png" class="ind_smart"></a></td>
            </tr>
        </table>
    </div>
</div>
<div id="online">
    <div class="grey_city"></div>
    <div class="block_content">
        <div id="obsv"><a href="/obratnaya-sviaz.html">Обратная &nbsp;связь</a></div>
        <div id="online_smallform">
            <div class="frame order">
                <div id="order" class="flex col center frame content" style="display: none">
                    <?php
                    include_once "http://root.uptaxi.ru/uptaxi/order/order_frontend.php?city=Геленджик&firm=Команда-Геленджик&service=&group=komanda_gelendj&sesid=".@$_COOKIE['driversession'];
                    ?>
                </div>
            </div>
        </div>

        <div id="main_slider">
            <ul>
                <li><img src="/img/index/slider/slider_01.jpg" /></li>
                <li><img src="/img/index/slider/slider_02.jpg" /></li>
                <li><img src="/img/index/slider/slider_03.jpg" /></li>
                <li><img src="/img/index/slider/slider_04.jpg" /></li>
                <li><img src="/img/index/slider/slider_05.jpg" /></li>
            </ul>
            <div id="slider_camera" title="Включить слайд-шоу">
                <img src="/img/index/slider/camera.png" /><br> <span>Включить слайд шоу</span>
            </div>
        </div>
    </div>
</div>
<div id="main_services">
	<div class="block_content">
        <div class="main_col">
            <a href="/trudoustroistvo.html"><img src="/img/index/wont_to_work.png" alt="" title="" /></a><br/>
            <div><a href="/trudoustroistvo.html">Хочу работать</a></div>
        </div>
        <div class="main_col">
            <img src="/img/index/sms.png" alt="" title="" /><br/>
            <div>SMS-оповещение,<br/>отзвон роботом</div>
        </div>
        <div class="main_col">
			<a href="//agent.komanda23.ru"><img src="/img/index/agent.png" alt="" title="" /></a><br/>
			<div><a href="//agent.komanda23.ru">Агентам</a></div>
		</div>
        <div class="main_col">
			<img src="/img/index/discont.png" alt="" title="" /><br/>
			<div>Скидка через<br/>онлайн заказ</div>
		</div>
		<div class="main_col">
			<img src="/img/index/preorder.png" alt="" title="" /><br/>
			<div>Предварительный<br/>заказа</div>
		</div>
		<div class="main_col">
			<a href="/avto-nyanya.html"><img src="/img/index/nyanya.png" alt="" title="" /></a><br/>
			<div><a href="/avto-nyanya.html">Авто-няня</a></div>
		</div>

		<div class="main_col">
            <img src="/img/index/food.png" alt="" title="" /><br/>
            <div>Продуктовый заказ,<br>доставка цветов<br>и подарков</div>
        </div>

		<div class="main_col">
			<img src="/img/index/24h.png" alt="" title="" /><br/>
			<div>Работаем<br/>круглосуточно</div>
		</div>
		<div class="main_col">
			<a href="/bonus.html"><img src="/img/index/bonus.png" alt="" title="" /></a><br/>
			<div><a href="/bonus.html">Бонусная<br/>программа</a></div>
		</div>
		<div style="clear: both;"></div>
	</div>
</div>
<div class="main_map_serv">
	<div class="block_content">
		<div id="main_map">
			<h2>КАРТА ОНЛАЙН</h2>
			<div id="map"></div>
		</div>
		<div id="main_servicegroup">
			<h2>ГРУППА СЛУЖБ ЗАКАЗА ТРАНСПОРТА</h2>
            <div id="res_1">Уважающие себя люди пользуются такси «Команда» по 3 причинам: </div>
            <div id="res_2">
                <table>
                    <tr>
                        <td class="res_num">
                            <img src="/img/root/1.png" />
                        </td>
                        <td width="110px">
                            Быстрая<br>подача
                        </td>
                        <td class="res_num">
                            <img src="/img/root/2.png" />
                        </td>
                        <td width="150px">
                            Авто в отличном<br>состоянии
                        </td>
                        <td class="res_num">
                            <img src="/img/root/2.png" />
                        </td>
                        <td>
                            Водители всегда<br>вежливые и аккуратные
                        </td>
                    </tr>
                </table>
            </div>
            <div id="servgr_list">
                <div>
                    <ul>
                        <li>Заказ такси КРУГЛОСУТОЧНО!</li>
                        <li>В такси «Команда» можно заказать авто класса «Стандарт»,  «Комфорт», «Vip-такси».</li>
                        <li>Скачай бесплатное приложение для смартфона и заказывай такси самостоятельно!</li>
                        <li>Действуют скидки и бонусы при заказе такси.</li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li>Наше такси всегда приезжает точно по адресу.</li>
                        <li>Для детей в авто предусмотрены детские автокресла (по предварительному заказу).</li>
                        <li>Оплачивайте такси за наличный или безналичный  расчет.</li>
                    </ul>
                </div>
            </div>
		</div>
		<div style="clear: both;"></div>
	</div>
</div>
<div id="main_tarif">
    <div class="div_content">
        <h2>тарифы</h2>
        <div>
            <div class="col">
                <div class="circle">
                    <div class="text">
                        <h3><?php echo $tarif[0]["name"]; ?></h3>
                        посадка - <?php echo $tarif[0]["min"]; ?> руб.,<br>
                        далее по городу - <?php echo $tarif[0]["km_city"]; ?> руб./км.,<br>
                        за город - <?php echo $tarif[0]["km_out"]; ?> руб./км.
                    </div>
                    <div id="car_standart" class="tarif_car"><img src="/img/index/car_standart.png"></div>
                </div>
            </div>
            <div class="col">
                <div class="circle">
                    <div class="text">
                        <h3><?php echo $tarif[1]["name"]; ?></h3>
                        посадка - <?php echo $tarif[1]["min"]; ?> руб.,<br>
                        далее по городу - <?php echo $tarif[1]["km_city"]; ?> руб./км.,<br>
                        за город - <?php echo $tarif[1]["km_out"]; ?> руб./км.
                    </div>
                    <div id="car_comfort" class="tarif_car"><img src="/img/index/car_comfort.png"></div>
                </div>
            </div>
            <div class="col">
                <div class="circle">
                    <div class="text">
                        <h3><?php echo $tarif[2]["name"]; ?></h3>
                        посадка - <?php echo $tarif[2]["min"]; ?> руб.,<br>
                        далее по городу - <?php echo $tarif[2]["km_city"]; ?> руб./км.,<br>
                        за город - <?php echo $tarif[2]["km_out"]; ?> руб./км.
                    </div>
                    <div id="car_vip" class="tarif_car"><img src="/img/index/car_vip.png"></div>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>
<div id="main_news">
    <div class="div_content">
        <h2>новости</h2>
        <?php if(count($news) > 0){ ?>
        <div class="article">
            <img src="/img/news/<?php echo $news[0]["id"]; ?>_main.jpg">
            <div class="text_field">
                <img src="/img/index/triangle_250x47.png" height="47px" width="250px" />
                <div class="text">
                    <h3><?php echo $news[0]["caption"]; ?></h3>
                    <?php echo $news[0]["intro"]; ?>
                    <div class="text_more">
                        <a href="/news/view?id=<?php echo $news[0]["id"]; ?>">читать продолжение...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="article">
            <img src="/img/news/<?php echo $news[1]["id"]; ?>_main.jpg">
            <div class="text_field">
                <img src="/img/index/triangle_250x47.png" height="47px" width="250px" />
                <div class="text">
                    <h3><?php echo $news[1]["caption"]; ?></h3>
                    <?php echo $news[1]["intro"]; ?>
                    <div class="text_more">
                        <a href="/news/view?id=<?php echo $news[1]["id"]; ?>">читать продолжение...</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="article">
            <img src="/img/news/<?php echo $news[2]["id"]; ?>_main.jpg">
            <div class="text_field">
                <img src="/img/index/triangle_250x47.png" height="47px" width="250px" />
                <div class="text">
                    <h3><?php echo $news[2]["caption"]; ?></h3>
                    <?php echo $news[2]["intro"]; ?>
                    <div class="text_more">
                        <a href="/news/view?id=<?php echo $news[2]["id"]; ?>">читать продолжение...</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        <div style="clear: both;"></div>
    </div>
</div>
<div id="main_partners">
    <div class="div_content">
        <h2>партнеры</h2>
        <?php if(count($partners) > 0){ ?>
        <div class="partner">
            <div class="partner1">
                <div class="partner_logo">
                    <div class="img">
                        <img src="/img/partners/<?php echo $partners[0]["id"]; ?>.png">
                    </div>
                </div>
                <div class="partner_triangle_w"></div>
                <div class="partner_triangle_o"></div>
                <div class="partner_intro">
                    <div class="partner_intro_text"><?php echo $partners[0]["description"]; ?></div>
                </div>
                <div class="partner_more"><a href="/partner.html?id=<?php echo $partners[0]["id"]; ?>">Подробнее...</a></div>
            </div>
        </div>
        <div class="partner">
            <div class="partner2">
                <div class="partner_logo">
                    <div class="img">
                        <img src="/img/partners/<?php echo $partners[1]["id"]; ?>.png">
                    </div>
                </div>
                <div class="partner_triangle_w"></div>
                <div class="partner_triangle_o"></div>
                <div class="partner_intro">
                    <div class="partner_intro_text"><?php echo $partners[1]["description"]; ?></div>
                </div>
                <div class="partner_more"><a href="/partner.html?id=<?php echo $partners[1]["id"]; ?>">Подробнее...</a></div>
            </div>
        </div>
        <div style="clear: both;"></div>
        <?php } ?>
    </div>
</div>
<div id="main_abc">
    <div class="div_content">
        <div id="abc_online">
            <div class="phone"></div>
            <div class="text">
                <h2>ЗАКАЖИ ТАКСИ<br>ОНЛАЙН</h2>
                Скачай приложение<br>
                для Android или IOS<br>
                и заказывай со скидкой 10%<br><br>
                <table width="100%">
                    <tr>
                        <td><a href="<?php echo Data::smart('ios'); ?>"><img src="/img/program/apple.png"></a></td>
                        <td><a href="<?php echo Data::smart('android'); ?>"><img src="/img/program/googleplay.png"></a></td>
                        <td><a href="<?php echo Data::smart('winmobile'); ?>"><img src="/img/program/WP_Store.png"></a></td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="triangle1"></div>
        <div id="abc_corp">
            <div class="text">
                <h2>ПРОСЛУШАТЬ ГИМН</h2>
                <table valign="middle">
                    <tr>
                        <td><a href="/docs/gimn.mp3" target="_blank"><img src="/img/index/play.png"></a></td>
                        <td> Гимн такси "Команда" 2:16</td>
                    </tr>
                </table>
                <br>
                <div class="deviz">
                    <strong>ДЕВИЗ:</strong><br>
                    В любое время года, в любую погоду<br>
                    Стоит только позвонить<br>
                    и такси уже летит!<br>
                    Отвезем в любой район!<br>
                    В любой день и в любой час<br>
                    мы работаем для ВАС!
                </div>
            </div>
        </div>
        <div id="triangle2"></div>
    </div>
</div>
<div id="main_wish">
    <div class="div_content">
        <h2>Желаем приятной поездки!</h2>
    </div>
</div>