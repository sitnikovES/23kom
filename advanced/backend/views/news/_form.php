<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<?php
$this->registerJsfile('@web/js/jquery-1.9.1.min.js', ['position'=>$this::POS_HEAD], 'jquery_js');
$this->registerJsfile('@web/js/tinymce/jquery.tinymce.min.js', ['position'=>$this::POS_HEAD], 'jquery_tinymce_js');
$this->registerJsfile('@web/js/tinymce/tinymce.min.js', ['position'=>$this::POS_HEAD], 'tinymce_js');
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'date_create')->textInput() ?>

    <?= $form->field($model, 'caption')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
    tinymce.init({
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        selector: "#news-content",
        language : "ru",
        convert_urls : false
    });
</script>