<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use common\models\City;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SGuestbook */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Гостевая книга';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'tableOptions' => [
            'class' => 'table table-striped table-bordered',
        ],
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            'dt',
            //'city_id',
            [
                'attribute' => 'city_id',
                'filter' => ArrayHelper::map(City::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->city->name;
                }
            ],
            'name',
            //'mes',
            [
                'attribute' => 'mes',
                'headerOptions' => ['max-width' => '400px'],
                'content' => function($data){
                    return '<div style="white-space: normal;">' . $data->mes . '</div>';
                }

            ],
            //'answer',
            [
                'attribute' => 'answer',
                'headerOptions' => ['max-width' => '400px'],
                'content' => function($data){
                    return '<div style="white-space: normal;">' . $data->answer . '</div>';
                }

            ],
            [
                'attribute' => 'state',
                'filter' => ['Нет', 'Да'],
                'content' => function($data){
                    if($data->state) return 'Да';
                    return 'Нет';
                }
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
