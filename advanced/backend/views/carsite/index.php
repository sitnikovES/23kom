<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use \common\models\City;
use \common\models\Cartype;
use \common\models\CarSite;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SCarsite */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Машины на сайте';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-site-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить машину', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'city_id',
                'filter' => ArrayHelper::map(City::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->city->name;
                }
            ],
            //'city_id',
            //'active',
            [
                'attribute' => 'active',
                'filter' => ['Нет', 'Да'],
                'content' => function($data){
                    if($data->active == 1)return 'Да';
                    return 'Нет';
                }
            ],
            //'mark',
            //'type',
            [
                'attribute' => 'type',
                'filter' => ArrayHelper::map(Cartype::find()->all(), 'id', 'name'),
                'content' =>function($data){
                    return $data->cartype->name;
                }
            ],
            [
                'attribute' => 'mark',
                'filter' => ArrayHelper::map(CarSite::find()->all(), 'mark', 'mark'),
            ],
            'model',
            //'year',
            [
                'attribute' => 'year',
                'filter' => ArrayHelper::map(CarSite::find()->all(), 'year', 'year'),
            ],
            'phone',

            //'hour_price',
            //'hour_min',
            //'city_km_price',
            //'cityout_km_price',

            // 'note:ntext',



            // 'preview',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
