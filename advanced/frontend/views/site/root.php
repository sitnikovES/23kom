<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
//use frontend\assets\AppAsset;

//AppAsset::register($this);
$this->registerJsFile('@web/js/jquery-1.9.1.min.js', ['position'=>$this::POS_HEAD], 'jq19_js');
$this->registerJsFile('@web/js/root.js', ['position'=>$this::POS_END], 'root_js');
$this->registerCssFile('@web/css/ptsans.css', ['position'=>$this::POS_HEAD], 'ptsans_css');
$this->registerCssFile('@web/css/myriad.css', ['position'=>$this::POS_HEAD], 'myriad_css');
$this->registerCssFile('@web/css/root.css', ['position'=>$this::POS_HEAD], 'root_css');
$this->registerCssFile('@web/css/root.css', ['position'=>$this::POS_HEAD], 'root_css');
$this->registerCssFile('@web/css/root_index.css', ['position'=>$this::POS_HEAD], 'root__index_css');
$this->title = "Такси Команда - заказ такси онлайн Краснодар, Анапа, Геленджик, Новороссийск, Туапсе.";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


<div class="div_block">
    <div class="div_content" id="head">
        <div id="head_logo">
            <a href="/"><img src="/img/root/komanda_logo_323x67.png"/></a>
        </div>
        <div id="head_text_we_best">
            - лучшее такси <span>в </span><span class="number"></span><span>городах</span> Краснодарского края
        </div>
        <div id="head_text_quick">
            Быстрый заказ по телефону / приложению / сайту (онлайн)
        </div>
    </div>
    <div class="head_separator"></div>
</div>


<div id="dwnld_form">
    <div class="cntrl_frm">
        <div id="smarthand"></div>
        <div class="text">
            <div class="txt1">скачайте наше</div>
            <div class="txt1" id="txt2">бесплатное</div>
            <div class="txt1" id="txt3">приложение</div>
            <div class="txt1"><a href="<?php/* echo Data::smart('ios');*/ ?>"><img src="/img/program/apple.png"></a></div>
            <div class="txt1"><a href="<?php/* echo Data::smart('android'); */?>"><img src="/img/program/googleplay.png"></a></div>
            <div class="txt1"><a href="<?php/* echo Data::smart('winmobile');*/ ?>"><img src="/img/program/WP_Store.png"></a></div>

            <div class="txt2">и заказывайте такси<br>со скидкой 10%</div>

            <div id="dwnld_form_close">спасибо, в другой раз!</div>
        </div>
    </div>
</div>
<div class="div_block" id="main_first">
    <div class="div_content">
        <div id="phone">
            <div>
                <img src="/img/root/button_dwnld_app.png" width="318px" height="67px" />
            </div>
        </div>
        <div><h1>Выбирайте город и заказывайте такси!</h1></div>
        <div id="city_list">
            <?php foreach($cities as $city){ ?>
                <div>
                    <a href="http://<?php echo $city["translit_name"] . "." . $_SERVER["SERVER_NAME"]; ?>"><?php echo $city["name"]; ?></a>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<div class="div_block" id="city">

</div>
<div class="div_block" id="reasons">
    <div class="div_content">
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
    </div>
</div>
<div class="div_block">
    <div class="div_content" id="bottom">
        <div>
            <ul>
                <li>Заказ такси КРУГЛОСУТОЧНО!</li>
                <li>В такси «Команда» можно заказать авто класса «Стандарт»,  «Комфорт», «Vip-такси».</li>
                <li>Наше такси всегда приезжает точно по адресу.</li>
            </ul>
        </div>
        <div>
            <ul>
                <li>Скачай бесплатное приложение для смартфона и заказывай такси самостоятельно!</li>
                <li>Действуют скидки и бонусы при заказе такси.</li>
            </ul>
        </div>
        <div>
            <ul>
                <li>Для детей в авто предусмотрены детские автокресла (по предварительному заказу).</li>
                <li>Оплачивайте такси за наличный или безналичный  расчет.</li>
            </ul>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
