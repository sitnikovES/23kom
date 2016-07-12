<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 19.05.2016
 * Time: 17:49
 */
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('@web/css/mycarlist.css', null, 'mycarlist_css');

?>
<div class="block_content">
    <div style="margin-bottom: 15px;">
        <h1><?php echo $type['name']; ?></h1>
        <?php foreach($cars as $car){ ?>
            <div class="cars">
                <a href="<?php echo Url::to(['cars/type', 'type'=>$type['path']]) . "/" . $car["id"]; ?>">
                    <img src="/img/carsite/<?php echo $car["id"] . "/small_" . $car["preview"]; ?>" /><br><?php echo $car["mark"] . ' ' . $car["model"]; ?>
                </a>
            </div>
        <?php } ?>
        <div style="clear:both;"></div>
    </div>
</div>