<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use \common\models\City;
use \common\models\Cartype;

/* @var $this yii\web\View */
/* @var $model common\models\CarSite */
/* @var $form yii\widgets\ActiveForm */
//$this->registerJsFile('@web/js/jquery-1.9.1.min.js', ['position'=>$this::POS_END], 'jq_js');
//$this->registerCssFile('@web/css/caredit.css', ['position'=>$this::POS_HEAD], 'caredit_css');
$this->registerCssFile('@web/css/caredit.css', [], 'caredit_css');
$this->registerJsFile('@web/js/caredit.js', ['depends' => 'yii\web\JqueryAsset'], 'caredit_js');

?>
<div style="position: relative; width: 45%; float: left;">
    <div class="car-site-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'hour_price')->textInput() ?>

        <?= $form->field($model, 'hour_min')->textInput() ?>

        <?= $form->field($model, 'city_km_price')->textInput() ?>

        <?= $form->field($model, 'cityout_km_price')->textInput() ?>

        <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map(Cartype::find()->all(), 'id', 'name')) ?>

        <?= $form->field($model, 'note')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'active')->dropDownList(['Нет', 'Да']) ?>

        <?= $form->field($model, 'city_id')->dropDownList(ArrayHelper::map(City::find()->all(), 'id', 'name')) ?>

        <?= $form->field($model, 'mark')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'year')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'preview')->dropDownList($photoList) ?>

        <div class="form-group">
            <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<div style="float: left; width: 45%; margin-left: 10px;">
    <?php if(!$model->isNewRecord){ ?>
    <form id="imgform" class="form" method="post" enctype="multipart/form-data" target="_self" action="/carsite/addphoto">
        <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>">
        <input type="file" name="newphoto" id="newphoto" />
        <input type="hidden" name="id" value="<?php echo $model->id; ?>" />
        <input type="submit" class="btn btn-primary" id="upload_image" value="Загрузить" >
    </form>
        <?php echo $_SERVER['SERVER_NAME']; ?>
        <?php foreach($photoList as $photo){ ?>
        <div class="car_img_container">
            <img width="250px" src="http://<?php echo substr($_SERVER['SERVER_NAME'], 6); ?>/img/carsite/<?php echo $model->id . '/' . $photo; ?>" title="<?php echo $photo; ?>" />
            Имя файла:<?php echo $photo; ?>
            <div class="carphoto_del" title="Удалить изображение" data-file="<?php echo $photo; ?>" data-car_id="<?php echo $model->id; ?>">X</div>
        </div>
    <?php }} ?>
</div>