<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TransferList */

$this->title = $model->city->name . ' - ' . $model->place_b;
$this->params['breadcrumbs'][] = ['label' => 'Трансфер Направления', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-list-view">

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
            //'id',
            //'city_id',
            ['attribute'=>'city_id', 'value'=>$model->city->name],
            'place_b',
            'track',
            'extracharge',
            //'tariff_id',
            //['attribute'=>'tariff_id', 'value'=>$model->tariff->name],
        ],
    ]) ?>

</div>
