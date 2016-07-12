<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы автомобилей';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cartype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'path',
            'active:boolean',
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
