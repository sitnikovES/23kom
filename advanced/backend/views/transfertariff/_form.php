<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TransferTariff */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-tariff-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'landing')->textInput() ?>

    <?= $form->field($model, 'price_in')->textInput() ?>

    <?= $form->field($model, 'price_out')->textInput() ?>

    <?= $form->field($model, 'note')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
