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

$this->registerCssFile('@web/css/mycar.css');

?>
<div class="block_content">
    <div style="margin-bottom: 15px;">
        <h1>Наши автомобили</h1>
        <div id="cartype">
            <?php foreach($types as $type){ ?>
            <div class="ctype" width="25%" align="center">
                <div>
                    <a href="<?php echo Url::to(['cars/type', 'type'=>$type['path']]); ?>">
                        <img class="icon" src="/img/mycar/<?php echo $type['path']; ?>.jpg" /><?php echo $type['name']; ?>
                    </a>
                </div>
            </div>
            <?php } ?>
            <div style="clear: both;"></div>
        </div>
    </div>
</div>