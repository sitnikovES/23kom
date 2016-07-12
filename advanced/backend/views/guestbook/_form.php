<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use \common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\Guestbook */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="guestbook-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mes')->textInput() ?>

    <?= $form->field($model, 'mes')->textarea() ?>

    <?= $form->field($model, 'answer')->textarea() ?>

    <?= $form->field($model, 'dt')->textInput() ?>

    <?= $form->field($model, 'state')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'city_id')->dropDownList(array_merge(['Все города'], ArrayHelper::map(City::find()->all(), 'id', 'name'))) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
