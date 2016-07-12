<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 19.05.2016
 * Time: 15:52
 */
/* @var $this yii\web\View */

use yii\helpers\Html;
use \frontend\components\TransferWidget;
use frontend\assets\GuestbookAsset;

/* @var $this yii\web\View */

$this->title = $model->title;
$this->registerCssFile('@web/css/transfer.css', [], 'transfer_css');
$this->registerMetaTag(['name' => 'description', 'content' => $model->description], 'description');
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords], 'keywords');

$this->registerAssetBundle(GuestbookAsset::className());
?>

<div class="div_content">
<?= TransferWidget::widget(); ?>
    <?php echo $model->text; ?>

    <?php
    //$file = __DIR__ . '/tarif/view.tarif_' . $template->city->id . '.php';
    /*if(file_exists($file)){
        include $file;
    }*/
    ?>
    <table class="tbl">
        <tr class="top">
            <th>Краснодарский край, от: <?php echo $current_city->name; ?></th>
            <th>км.</th>
            <?php foreach($tariff_list as $tariff){ ?>
            <th><?php echo $tariff["name"] ?></th>
            <?php } ?>
        </tr>
        <tr class="breek">
            <th>Минимальная стоимость (посадка)</th>
            <th>&nbsp;</th>
            <?php foreach($tariff_list as $tariff){ ?>
                <th><?php echo $tariff["landing"] . "р. Посадка" ?></th>
            <?php } ?>
        </tr>
        <tr class="breek">
            <th>Цена за км.</th>
            <th>&nbsp;</th>
            <?php foreach($tariff_list as $tariff){ ?>
                <th>( <?php echo $tariff['price_out']; ?> р./км.)</th>
            <?php } ?>
        </tr>
        <?php foreach($directions as $direction){ ?>
            <tr>
                <td><?php echo $current_city->name . " - " . $direction["place_b"] . ($direction["extracharge"]?'<span>набавка ' . $direction["extracharge"] . 'руб.</span>':""); ?></td>
                <td><?php echo $direction["track"]; ?></td>
            <?php foreach($tariff_list as $tariff){ ?>
                <td><?php echo $direction["track"] * $tariff["price_out"] + $tariff["landing"] + $direction["extracharge"]; ?></td>
            <?php } ?>
            </tr>
        <?php } ?>
        <tr><td colspan="<?php echo count($tariff_list) + 2; ?>">Тарифы примерные, расчёт производится по спутниковому таксометру.</td>
    </table>

    <br>
</div>