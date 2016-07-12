<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transferorders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Transferorder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'place_a',
            'place_b',
            'email:email',
            'phone',
            // 'paid',
            // 'paid_sum',
            // 'email_sended_client:email',
            // 'email_sended_taxi:email',
            // 'date_create',
            // 'tariff_id',
            // 'note:ntext',
            // 'passenger_count',
            // 'child_count',
            // 'baggage_count',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
