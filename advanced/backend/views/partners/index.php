<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use common\models\City;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить партнера', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'text:ntext',
            'status:boolean',
            //'title',
            'description',
            // 'keywords',
            // 'city_id',
            [
                'attribute' => 'city_id',
                'content' => function($data){
                    if(isset($data->city->name))
                        return $data->city->name;
                    return 'Все города';
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
