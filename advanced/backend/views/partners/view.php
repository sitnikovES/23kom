<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use common\models\City;

/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$citylist = array_merge(['Все города'], ArrayHelper::map(City::find()->all(), 'id', 'name'));
?>
<div class="partners-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'text:ntext',
            'status:boolean',
            'title',
            'description',
            'keywords',
            [
                'attribute' => 'city_id',
                //'value' => $model->city->name,
                'value' => $citylist[$model->city_id],
            ],
            //'city_id',
        ],
    ]) ?>

</div>
