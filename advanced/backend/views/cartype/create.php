<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cartype */

$this->title = 'Типы автомобилей - новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Типы автомобилей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
