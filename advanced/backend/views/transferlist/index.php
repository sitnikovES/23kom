<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\City;
use common\models\TransferTariff;
use \yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\STransferList */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Трансфер направления';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'city_id',
                'filter' => ArrayHelper::map(City::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->city->name;
                },
            ],
            'place_b',
            'track',
            'extracharge',
            //'tariff_id',
            /*[
                'attribute'=>'tariff_id',
                'filter'=> ArrayHelper::map(TransferTariff::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->tariff->name;
                }
            ],*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
