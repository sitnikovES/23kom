<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Guestbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mes')->textInput() ?>

    <?= $form->field($model, 'answer')->textInput() ?>

    <?= $form->field($model, 'dt')->textInput() ?>

    <?= $form->field($model, 'state')->textInput() ?>

    <?= $form->field($model, 'city_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
