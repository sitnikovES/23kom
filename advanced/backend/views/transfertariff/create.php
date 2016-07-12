<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransferTariff */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Трансфер тарифы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-tariff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
