<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\SGuestbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'mes') ?>

    <?= $form->field($model, 'answer') ?>

    <?= $form->field($model, 'dt') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'city_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
