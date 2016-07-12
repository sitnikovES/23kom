<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\STransferorder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transferorder-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'place_a') ?>

    <?= $form->field($model, 'place_b') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'paid') ?>

    <?php // echo $form->field($model, 'paid_sum') ?>

    <?php // echo $form->field($model, 'email_sended_client') ?>

    <?php // echo $form->field($model, 'email_sended_taxi') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'tariff_id') ?>

    <?php // echo $form->field($model, 'note') ?>

    <?php // echo $form->field($model, 'passenger_count') ?>

    <?php // echo $form->field($model, 'child_count') ?>

    <?php // echo $form->field($model, 'baggage_count') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
