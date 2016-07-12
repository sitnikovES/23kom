<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SNews */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Новости сайта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить новость', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'caption',
            'date_create',
            [
                'attribute' => 'active',
                'filter' => ['нет', 'да'],
                'content' => function($data){
                    if($data->active ==1) return 'Да';
                    return 'Нет';
                }
            ],
            //'active:boolean',

            //'id',
            //'title',
            //'keywords',
            //'description',

            // 'content:ntext',
            'intro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
