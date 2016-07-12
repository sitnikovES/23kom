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

    <?= $form->field($model, 'dt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passenger_count')->textInput() ?>

    <?= $form->field($model, 'baggage_count')->textInput() ?>

    <?= $form->field($model, 'child_count')->textInput() ?>

    <?= $form->field($model, 'tariff_id')->dropDownList($tariff_list) ?>

    <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton('Узнать стоимость', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>