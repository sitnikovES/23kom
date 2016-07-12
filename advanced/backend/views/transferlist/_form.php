<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\helpers\ArrayHelper;
use \common\models\City;
use \common\models\TransferTariff;

/* @var $this yii\web\View */
/* @var $model common\models\TransferList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transfer-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->where(['active'=>1])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'track')->textInput() ?>

    <?= $form->field($model, 'extracharge')->textInput() ?>

    <?= $form->field($model, 'place_b')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
