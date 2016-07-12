<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Guestbook */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Гостевая книга', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="guestbook-view">

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
            'dt',
            //'city_id',
            ['attribute'=>'city_id', 'value'=>$model->city->name],
            'state:boolean',
            'name',
            'mes',
            'answer',
        ],
    ]) ?>

</div>
