<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'username',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<iframe width="650" scrolling="no" height="500" frameborder="0" src="//partners.ozon.travel/searchform_v2_0/?formOrientation=vertical&tab=avia&tab=hotel&tab=railway&tab=insurance&type=avia&defaultHotel=Анапа&defaultAvia=KRR"></iframe>
<iframe width="200" scrolling="no" height="500" frameborder="0" src="//partners.ozon.travel/searchform_v2_0/?formOrientation=vertical&tab=avia&tab=hotel&tab=railway&tab=insurance&type=avia&defaultHotel=Геленджик&defaultAvia=GDZ"></iframe>