<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use common\models\Data;

use common\models\City;
$cities = City::find()->where(['active'=>1])->orderBy('name')->asArray()->all();
$cityname = substr($_SERVER["SERVER_NAME"], 0, strpos($_SERVER["SERVER_NAME"], "."));
$ccity = City::find()->where(['translit_name'=>$cityname])->one();

AppAsset::register($this);
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
    <?php $this->registerLinkTag([
        'rel' => 'shortcut icon',
        'type' => 'image/x-icon',
        'href' => '/favicon.ico?1',
    ]);?>
</head>
<body>
<?php
 $tmp = __DIR__ . "/ya_counter.php";
if(file_exists($tmp)){  include $tmp; } ?>
<?php $this->beginBody() ?>

<div id="page">
    <div id="head">
        <div class="div_content">
            <div id="head_logo">
                <a href="/">
                    <img src="/img/root/komanda_logo_323x67.png" title="Такси - Команда" alt="Такси - Команда" /></a>
            </div>
            <div id="head_city">
                <div id="head_city_button"></div>
                <div id="head_city_name">
                    <?php echo $ccity["name"]; ?>
                </div>
            </div>
            <div id="head_citylist">
                <div id="head_citylist_name"></div>
                <div id="head_cityinfo_city_sel">
                    <div id="head_city_list">
                        <?php foreach($cities as $key=>$city){ if($city['id'] != $ccity->id){ ?>
                            <div class="head_city">
                                <a href="//<?php echo $city["translit_name"] . ".komanda23.ru" . $_SERVER["REQUEST_URI"]; ?>"><?php echo $city["name"]; ?></a>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
                <div id="head_cityinfo_city_list"></div>
            </div>
            <div id="head_city_info">
                <div class="phone">
                    <img src="/img/root/phone_black.png" />
                    <?php echo str_replace(';', "<br>", $ccity['phone_head']); ?>
                </div>
                <div class="email">
                    <a href="mailto:szt.komanda@mail.ru">szt.komanda@mail.ru</a>
                </div>
            </div>
            <div id="main_menu">
                <div class="<?php echo (Url::current() == '/raschet-rasstoyaniya.html')?"mm_button_cur":"mm_button"; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/raschet-rasstoyaniya.html">карта</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo (Url::current() == '/news.html')?"mm_button_cur":"mm_button"; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/news.html">новости</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo (Url::current() == '/predlogenie-gostinnicam.html')?"mm_button_cur":"mm_button"; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/predlogenie-gostinnicam.html">гостиницам</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo "mm_button"; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/">турфирмам</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo (Url::current() == '/transfer.html')?"mm_button_cur":"mm_button"; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/transfer.html">трансфер</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo (Url::current() == '/nashi-uslugi.html')?"mm_button_cur":"mm_button";; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/nashi-uslugi.html">услуги</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo (Url::current() == '/nashi_avtomobili')?"mm_button_cur":"mm_button"; ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/nashi_avtomobili">наши авто</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <!--<div class="<?php echo "mm_button"; /*$template->mm_class("tarif");*/ ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/tarif.html">тариф</a></div></div>
                    <div class="mm_button_r"></div>
                </div>-->
                <div class="<?php echo (Url::current() == '/site/index')?"mm_button_cur":"mm_button"; /*$template->mm_class("main");*/ ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/">заказ</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="head_sep"></div>
    <div id="body">
        <?php
        //echo Url::current();
        ?>
        <?= $content ?>
    </div>

    <div id="footer">
        <div class="div_content">
            <div class="footer_col">
                <span>Такси "Команда"</span>
                <ul>
                    <li><a href="/tarif.html">ЗАКАЗАТЬ ТАКСИ</a></li>
                    <!--<li><a href="/tarif.html">ТАРИФЫ</a></li>-->
                    <li><a href="/raschet-rasstoyaniya.html">РАСЧЕТ РАССТОЯНИЯ</a></li>
                    <li><a href="/zabitie-veshi.html">ЗАБЫТЫЕ ВЕЩИ</a></li>
                    <li><a href="/kak-perevozit-detei-v-avto.html">КАК ПЕРЕВОЗИТЬ ДЕТЕЙ</a></li>
                </ul>
            </div>
            <div class="footer_col">
                <span class="ftr_cntrl_spn">С нами быстро!</span>
                <ul>
                    <li><a href="/trudoustroistvo.html">ВАКАНСИИ</a></li>
                    <li><a href="/sotrudnikam.html">СОТРУДНИКАМ</a></li>
                    <li><a href="/kontragentam.html">КОНТРАГЕНТАМ</a></li>
                    <li><a href="/predlogenie-gostinnicam.html">ПАРТНЕРАМ</a></li>
                    <li><a href="/obratnaya-sviaz.html">ОБРАТНАЯ СВЯЗЬ</a></li>
                </ul>
            </div>
            <div class="footer_col">
                <span>С нами комфортно!</span>
                <ul>
                    <li class="ftr_app">ПРИЛОЖЕНИЯ</li>
                    <li class="ftr_app"><a href="<?php echo Data::smart('ios'); ?>">Gett для iPhone</a></li>
                    <li class="ftr_app"><a href="<?php echo Data::smart('android'); ?>">Gett для Android</a></li>
                    <li class="ftr_app"><a href="/v-razrabotke.html">Gett для Windows</a></li>
                    <li><a href="/v-razrabotke.html">КОНТАКТЫ</a></li>
                </ul>
            </div>
            <div class="footer_col">
                <div id="footer_phones">
                    <div id="head_whitephone">
                        <img src="/img/root/phone_white.png" />
                        <?php echo str_replace(';', '<br>', $ccity['phone_head']); ?><br>
                        <a href="mailto:szt.komanda@mail.ru">szt.komanda@mail.ru</a>
                    </div>
                    <table width="100%">
                        <tr>
                            <td width="33%"><a href="<?php echo Data::socseti($ccity->id, 'vk'); ?>"><img height="59px" src="/img/root/socseti/vk.png"></a></td>
                            <td width="33%"><a href="<?php echo Data::socseti($ccity->id, 'ok'); ?>"><img height="59px" src="/img/root/socseti/ok.png"></a></td>
                            <td width="33%"><a href="<?php echo Data::socseti($ccity->id, 'g'); ?>"><img height="59px" src="/img/root/socseti/g.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="left">
                                <!-- Yandex.Metrika counter -->
                                <a href="https://metrika.yandex.ru/stat/?id=23174077&amp;from=informer" target="_blank" rel="nofollow">
                                    <img src="https://informer.yandex.ru/informer/23174077/3_1_FFFFFFFF_EFEFEFFF_0_pageviews" style="width:88px; height:31px; border:0;" alt="Яндекс.Метрика" title="Яндекс.Метрика: данные за сегодня (просмотры, визиты и уникальные посетители)" onclick="try{Ya.Metrika.informer({i:this,id:23174077,lang:'ru'});return false}catch(e){}" />
                                </a> <!-- /Yandex.Metrika informer -->
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'tZ2IMdmaQu';
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = '//code.jivosite.com/script/widget/'+widget_id; var ss = document.getElementsByTagName('script')[0]; ss.parentNode.insertBefore(s, ss);})();</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>
<?php $this->endPage() ?>
