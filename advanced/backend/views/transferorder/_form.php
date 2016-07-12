<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transferorder-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'place_a')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'place_b')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'paid_sum')->textInput() ?>

    <?= $form->field($model, 'email_sended_client')->textInput() ?>

    <?= $form->field($model, 'email_sended_taxi')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'tariff_id')->textInput() ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'passenger_count')->textInput() ?>

    <?= $form->field($model, 'child_count')->textInput() ?>

    <?= $form->field($model, 'baggage_count')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
