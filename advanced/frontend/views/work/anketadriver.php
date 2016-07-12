<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 16.06.2016
 * Time: 15:28
 */
use yii\helpers\Url;

/* @var $this yii\web\View */

$this->registerCssFile('http://root.uptaxi.ru/uptaxi/controls/base.css', ['position'=>$this::POS_HEAD], 'up_base_css');
$this->registerCssFile('http://root.uptaxi.ru/uptaxi/controls/animate.css', ['position'=>$this::POS_HEAD], 'up_animate_css');
$this->registerCssFile('http://root.uptaxi.ru/uptaxi/controls/controls.css', ['position'=>$this::POS_HEAD], 'up_controls_css');

$this->registerJsFile('http://root.uptaxi.ru/uptaxi/controls/controls.js', ['position'=>$this::POS_HEAD], 'up_controls_js');
$this->registerJsFile('http://root.uptaxi.ru/uptaxi/controls/functions.js', ['position'=>$this::POS_HEAD], 'up_functions_js');
$this->registerJsFile('http://root.uptaxi.ru/uptaxi/controls/jquery.js', ['position'=>$this::POS_HEAD], 'up_jquery_js');

$this->registerCssFile('@web/css/uptaxi/clientsite/taxiapp/client.css', ['position'=>$this::POS_HEAD], 'up_client_css');
$this->registerCssFile('@web/css/uptaxi/clientsite/taxiapp/order.css', ['position'=>$this::POS_HEAD], 'up_order_css');

//<link rel="stylesheet" href="http://root.uptaxi.ru/uptaxi/controls/base.css" type="text/css" />
//<link rel="stylesheet" href="http://root.uptaxi.ru/uptaxi/controls/animate.css" type="text/css" />
//<link rel="stylesheet" href="http://root.uptaxi.ru/uptaxi/controls/controls.css" type="text/css" />
//<script type="text/javascript" src="http://root.uptaxi.ru/uptaxi/controls/controls.js"></script>
//<script type="text/javascript" src="http://root.uptaxi.ru/uptaxi/controls/functions.js"></script>
//<script type="text/javascript" src="http://root.uptaxi.ru/uptaxi/controls/jquery.js"></script>
/*<link rel="stylesheet" href="/css/uptaxi/clientsite/taxiapp/client.css" type="text/css"/>
<link rel="stylesheet" href="/css/uptaxi/clientsite/taxiapp/order.css" type="text/css"/></head>
*/

$this->title = "Анкета для трудоустройства";
?>
<div class="block_content">
    <h1>Анкета водителя</h1>
    <div class="frame driver">
        <div id="driver" class="flex col center frame content" style="display: none">
            <?php
            include_once "http://root.uptaxi.ru/uptaxi/driver/driver_frontend.php?city=Геленджик&firm=Команда-Геленджик&service=&group=komanda_gelendj&sesid=".@$_COOKIE['driversession'];
            ?>
        </div>
    </div>
    <br>
    <div>
        <table>
            <tr>
                <td>
                    <a href="http://uptaxi.ru/m" target="_blank">
                        <img height="32" src="/img/program/googleplay.png">
                    </a>
                </td>
                <td>
                    Мобильное приложение работает на базе операционной системы Android (требования: версия ОС Android от 2.2, gps приемник, интернет).
                </td>
            </tr>
        </table>
    </div>
    <br>
</div>