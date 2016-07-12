<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\GuestbookAsset;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerAssetBundle(GuestbookAsset::className());

$this->title = 'Обратная связь';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_content">
    <div class="guestbook-index">

        <h1><?= Html::encode($this->title) ?></h1>
        <?php if (Yii::$app->session->hasFlash('GBSuccess')){ ?>

            <div class="alert alert-success">
                Спасибо за Ваш интерес к нашей компании. Ответ на ваше сообщение появится на сайте после проверки.
            </div>

        <?php } ?>
        <?php if (Yii::$app->session->hasFlash('GBError')){ ?>

            <div class="alert alert-success">
                Ошибка при сохранении сообщения.
            </div>

        <?php } ?>
        <div class="row">
            <div class="" style="100%;">
                <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <table width="100%">
                    <tr valign="top">
                        <td width="45%">
                            <?= $form->field($model, 'mes')->textArea(['rows' => 3, 'autofocus' => true]) ?>
                        </td>
                        <td width="10%">
                            &nbsp;
                        </td>
                        <td width="45%">
                            <?= $form->field($model, 'name')->textInput() ?>

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>

                        </td>
                    </tr>
                </table>






                <div class="form-group">
                    <?= Html::submitButton('Отправить вопрос', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'dt',
                //'name',
                //'mes',
                //'answer',
                [
                    'label' => 'Вопрос',
                    'format' => 'raw',
                    'value' => function($data){
                        return '
    <div class="who">' . $data->dt . ' ' . $data->name . '</div>
    <div class="what">'
                        . $data->mes . '
    </div>
    <div class="who">Ответ:</div>
    <div class="ans">'
                        . $data->answer . '
    </div>';
                    },
                ],

                // 'state',
                // 'city_id',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
</div>