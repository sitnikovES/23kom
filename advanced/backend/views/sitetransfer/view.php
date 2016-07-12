<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\SiteTransfer */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Трансфер страница', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-transfer-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->city_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->city_id], [
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
            ['attribute'=>'city_id', 'value'=>$model->city->name],
            'keywords',
            'description',
            'title',
            'text:ntext',
        ],
    ]) ?>

</div>
