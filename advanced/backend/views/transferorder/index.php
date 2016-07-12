<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\STransferorder */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Трансфер заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--<?= Html::a('Create Transferorder', ['create'], ['class' => 'btn btn-success']) ?>-->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'date_create',
            'place_a',
            'place_b',
            'email:email',
            'phone',
            'status',
            // 'paid',
            // 'paid_sum',
            // 'email_sended_client:email',
            // 'email_sended_taxi:email',
            // 'tariff_id',
            // 'note:ntext',
            // 'passenger_count',
            // 'child_count',
            // 'baggage_count',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
