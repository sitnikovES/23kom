<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */

$this->title = '№' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Трансфер заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-view">

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
        //    'id',
            'place_a',
            'place_b',
            'email:email',
            'phone',
            'paid:boolean',
            'paid_sum',
            'email_sended_client:boolean',
            'email_sended_taxi:boolean',
            'dt',
            'date_create',
            //'tariff_id',
            ['attribute' => 'tariff_id', 'value' => $model->tariff->name, ],
            'note:ntext',
            'passenger_count',
            'child_count',
            'baggage_count',
            'status',
        ],
    ]) ?>

</div>
