<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\City */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="city-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'def')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'sto_id')->textInput() ?>

    <?= $form->field($model, 'ot_kadrov')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otk_start')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'otk_end')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone_contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tariff')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'phone_head')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput() ?>

    <?= $form->field($model, 'longitude')->textInput() ?>

    <?= $form->field($model, 'translit_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
