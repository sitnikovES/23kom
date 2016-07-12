<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\STransferList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'city_id') ?>

    <?= $form->field($model, 'track') ?>

    <?= $form->field($model, 'extracharge') ?>

    <?= $form->field($model, 'tariff_id') ?>

    <?php // echo $form->field($model, 'place_b') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
