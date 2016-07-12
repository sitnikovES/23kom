<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SCarsite */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="car-site-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'hour_price') ?>

    <?= $form->field($model, 'hour_min') ?>

    <?= $form->field($model, 'city_km_price') ?>

    <?= $form->field($model, 'cityout_km_price') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <?php // echo $form->field($model, 'mark') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'model') ?>

    <?php // echo $form->field($model, 'year') ?>

    <?php // echo $form->field($model, 'preview') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
