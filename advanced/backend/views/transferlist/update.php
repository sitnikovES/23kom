<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TransferList */

$this->title = 'Редактирование трансфера: ' . ' ' .  $model->city->name . ' - ' . $model->place_b;
$this->params['breadcrumbs'][] = ['label' => 'Трансфер направления', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->city->name . ' - ' . $model->place_b, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="transfer-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
