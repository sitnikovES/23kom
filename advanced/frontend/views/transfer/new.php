<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */
/* @var $form ActiveForm */
?>
<div class="new">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'place_a') ?>
        <?= $form->field($model, 'place_b') ?>
        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'paid_sum') ?>
        <?= $form->field($model, 'date_create') ?>
        <?= $form->field($model, 'tariff_id') ?>
        <?= $form->field($model, 'note') ?>
        <?= $form->field($model, 'passenger_count') ?>
        <?= $form->field($model, 'child_count') ?>
        <?= $form->field($model, 'baggage_count') ?>
        <?= $form->field($model, 'status') ?>
        <?= $form->field($model, 'paid') ?>
        <?= $form->field($model, 'email_sended_client') ?>
        <?= $form->field($model, 'email_sended_taxi') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- new -->
