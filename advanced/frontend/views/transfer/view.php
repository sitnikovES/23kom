<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transferorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'place_a',
            'place_b',
            'email:email',
            'phone',
            'paid',
            'paid_sum',
            'email_sended_client:email',
            'email_sended_taxi:email',
            'date_create',
            'tariff_id',
            'note:ntext',
            'passenger_count',
            'child_count',
            'baggage_count',
            'status',
        ],
    ]) ?>

</div>
