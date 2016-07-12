<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CarSite */

$this->title = 'Добавление автомобиля';
$this->params['breadcrumbs'][] = ['label' => 'Машины на сайте', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'photoList' => $photoList,
    ]) ?>

</div>
