<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="<?php echo $content->keywords; ?>" />
	<meta name="description"  content="<?php echo $content->description; ?>" />
	<meta name="wmail-verification" content="67a26b59b27953a6" />
    <link type="text/css" rel="stylesheet" href="/css/myriad.css">
    <link type="text/css" rel="stylesheet" href="/css/ptsans.css">
	<link type="text/css" rel="stylesheet" href="/css/style.css">
<?php if(file_exists(__DIR__ . "/../../css/" . $content->mod . ".css")){ ?>
	<link type="text/css" rel="stylesheet" href="/css/<?php echo $content->mod; ?>.css?1">
<?php } ?>
	<title><?php echo $content->title; ?></title>
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="stylesheet" href="/ui/jquery-ui.min.css">
	<script src="/js/jquery-1.9.1.min.js"></script>
	<script src="/js/city_select.js"></script>
	<script src="/ui/jquery-ui.min.js"></script>
	<script src="/js/jquery-ui-timepicker-addon.js"></script>
	<script src="/js/jquery-ui-timepicker.min.js"></script>
    <?php if(isset($template->link)){ echo $template->link; } ?>
    <?php if(isset($content->link)){ echo $content->link; } ?>
</head>
<body>
<?php if(file_exists(__DIR__ . "/ya_counter.php")){  include __DIR__ . "/ya_counter.php"; } ?>
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
                    <?php echo $template->city->name; ?>
                </div>
            </div>
		    <div id="head_citylist">
				<div id="head_citylist_name"></div>
                <div id="head_cityinfo_city_sel">
                    <div id="head_city_list">
                        <?php foreach($template->cities as $key=>$city){ if($key != $template->city->id){ ?>
                            <div class="head_city">
                                <a href="//<?php echo $city["translit_name"] . "." . $template->root_server . $_SERVER["REQUEST_URI"]; ?>"><?php echo $city["name"]; ?></a>
                            </div>
                        <?php }} ?>
                    </div>
                </div>
                <div id="head_cityinfo_city_list"></div>
		    </div>
		    <div id="head_city_info">
			    <div class="phone">
                    <img src="/img/root/phone_black.png" />
                    <?php echo $template->phoneHead[0]; ?>
                    <?php if(isset($template->phoneHead[1])){ echo '<br>' . $template->phoneHead[1];} ?>
                </div>
			    <div class="email">
			        <a href="mailto:szt.komanda@mail.ru">szt.komanda@mail.ru</a>
                </div>
            </div>
            <div id="main_menu">
                <div class="<?php echo $template->mm_class("track"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/raschet-rasstoyaniya.html">карта</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo $template->mm_class("news"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/news.html">новости</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo $template->mm_class("to_hotels"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/predlogenie-gostinnicam.html">гостиницам</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo $template->mm_class("turfirm"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/">турфирмам</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo $template->mm_class("transfer"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/transfer.html">трансфер</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo $template->mm_class("services"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/nashi-uslugi.html">услуги</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <div class="<?php echo $template->mm_class("mycar"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/nashi_avtomobili.html">наши авто</a></div></div>
                    <div class="mm_button_r"></div>
                </div>
                <!--<div class="<?php echo $template->mm_class("tarif"); ?>">
                    <div class="mm_button_l"></div>
                    <div class="mm_button_c"><div class="mm_button_text"><a href="/tarif.html">тариф</a></div></div>
                    <div class="mm_button_r"></div>
                </div>-->
                <div class="<?php echo $template->mm_class("main"); ?>">
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
        $filename =  __DIR__ . '/view.' . $content_view . '.php';
        if(!empty($content->view)) {
            $filename =  __DIR__ . '/' . $content->mod . '/' . $content->view;
        }
        if(file_exists($filename)){
            include $filename;
        }
        else {
            echo "Данные не найдены.";
        }
		?>
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
                    <li class="ftr_app"><a href="/v-razrabotke.html">Gett для iPhone</a></li>
                    <li class="ftr_app"><a href="/v-razrabotke.html">Gett для Android</a></li>
                    <li class="ftr_app"><a href="/v-razrabotke.html">Gett для Windows</a></li>
                    <li><a href="/v-razrabotke.html">КОНТАКТЫ</a></li>
                </ul>
            </div>
            <div class="footer_col">
                <div id="footer_phones">
                    <div id="head_whitephone">
                        <img src="/img/root/phone_white.png" />
                        <?php echo $template->phoneHead[0]; ?><br>
                        <a href="mailto:szt.komanda@mail.ru">szt.komanda@mail.ru</a>
                    </div>
                    <table width="100%">
                        <tr>
                            <td width="33%"><a href="<?php echo Data::socseti($template->city->id, 'vk'); ?>"><img height="59px" src="/img/root/socseti/vk.png"></a></td>
                            <td width="33%"><a href="<?php echo Data::socseti($template->city->id, 'ok'); ?>"><img height="59px" src="/img/root/socseti/ok.png"></a></td>
                            <td width="33%"><a href="<?php echo Data::socseti($template->city->id, 'g'); ?>"><img height="59px" src="/img/root/socseti/g.png"></a></td>
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
<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
    (function(){ var widget_id = 'tZ2IMdmaQu';
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = '//code.jivosite.com/script/widget/'+widget_id;
        var ss = document.getElementsByTagName('script')[0];
        ss.parentNode.insertBefore(s, ss);
    })();
</script>
<!-- {/literal} END JIVOSITE CODE -->
</body>
</html>