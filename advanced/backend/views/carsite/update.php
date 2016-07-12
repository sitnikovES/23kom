<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CarSite */

$this->title = 'Редактирование данных автомобиля: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Машины на сайте', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'id: ' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'редактирование';
?>
<div class="car-site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'photoList' => $photoList,
    ]) ?>

</div>
