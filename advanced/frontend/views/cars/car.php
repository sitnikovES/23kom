<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 19.05.2016
 * Time: 17:49
 */
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->registerCssFile('@web/css/mycarcar.css', null, 'mycarcar_css');
if(count($photo_list) > 0){
    $this->registerJsFile('@web/js/slider.js', ['position'=>$this::POS_END], 'slider_js');
}
?>
<div class="block_content">
    <div id="car_data">
        <div id="car_data_info">
            <h1><?php echo $car['mark'] . " " . $car['model'] . " " . $car['year'] . "г."; ?></h1>
            <table>
                <?php if($car['hour_price']){ ?><tr><td>&nbsp;Стоимость часа&nbsp;</td><td><?php echo $car['hour_price']; ?> руб.</td></tr><?php } ?>
                <?php if($car['hour_min']){ ?><tr><td>&nbsp;Минимальное время (час)&nbsp;</td><td><?php echo $car['hour_min']; ?> ч.</td></tr><?php } ?>
                <?php if($car['city_km_price']){ ?><tr><td>&nbsp;Стоимость руб/км по городу&nbsp;</td><td><?php echo $car['city_km_price']; ?> руб.</td></tr><?php } ?>
                <?php if($car['cityout_km_price']){ ?><tr><td>&nbsp;Стоимость руб/км по межгороду&nbsp;</td><td><?php echo $car['cityout_km_price']; ?> руб.</td></tr><?php } ?>
            </table><br>
            <div id="car_text"><?php echo $car['note']; ?></div>
        </div>
        <div  id="car_data_photo">
            <?php if(count($photo_list) > 0) { ?>
            <?php if(count($photo_list) == 1){ ?>
                <img src="/img/carsite/<?php echo $car['id'] . "/" . $photo_list[2]; ?>" />
            <?php } else { ?>
                <div id="rotator">
                    <ul>
                        <?php foreach($photo_list as $photo){ ?>
                            <li><img src="/img/carsite/<?php echo $car['id'] . "/" . $photo; ?>" /></li>
                        <?php }?>
                    </ul>
                </div>
            <?php }} ?>
        </div>
        <div style="clear: both;">
        </div>
    </div>
</div>