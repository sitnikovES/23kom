<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Города';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить город', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [


            'id',
            'name',
            'active:boolean',
            //'def',
            //'sto_id',
            // 'ot_kadrov',
            // 'otk_start',
            // 'otk_end',
            // 'phone_contact',
            // 'tariff:ntext',
            // 'phone_head',
            // 'latitude',
            // 'longitude',
            // 'translit_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
