<?php
use yii\helpers\Html;
use frontend\assets\TransferOrderAsset;
use frontend\assets\YamapAsset;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */


$this->registerAssetBundle(TransferOrderAsset::className());
$this->registerAssetBundle(YamapAsset::className());
$this->registerJsFile('@web/js/transferorder.js', ['position'=>$this::POS_END], 'transferorder_js');

$this->registerCssFile('@web/css/transfer/create.css', ['position'=>$this::POS_HEAD], 'transfer_create_css');

$this->title = 'Такси-команда Заказ трансфера';
$this->params['breadcrumbs'][] = ['label' => 'Transferorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<script>
    var longitude = <?php echo $current_city["longitude"]; ?>;
    var latitude = <?php echo $current_city["latitude"]; ?>;
</script>

<div class="block_content">
    <div class="transferorder-create">
        <!--<h1><?= Html::encode($this->title) ?></h1>-->
        <?= $this->render('_form', [
            'model' => $model,
            'tariff_list' => $tariff_list,
        ]) ?>

    </div>
    <div class="map-router">
        <div id="map"></div>
        <div style="text-align: center"><label id="mapOut">text</label></div>
    </div>
    <div style="clear: both;"></div>
</div>