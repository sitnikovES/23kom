<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\GuestbookAsset;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


//$this->registerAssetBundle(GuestbookAsset::className());

$this->title = 'Наши партнеры';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_content">
    <div class="partners-index">

        <h1><?= Html::encode($this->title) ?></h1>



        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],


                [
                    'label' => '',
                    'format' => 'raw',

                    'value' => function($data){
                        return Html::img('/img/partners/' . $data->id . '.png',[
                            'alt'=>'yii2 - картинка в gridview',
                            'style' => 'width:150px; float:left; margin-right:10px; margin-bottom: 15px;'
                        ]) . '<div> ' . Html::a($data->description, ['/partner.html', 'id' => $data->id], ['class' => 'profile-link']) . '</div>';
                    },
                ],

                //'id',
                //'name',
                //'text:ntext',
                //'status',
                //'title',
                //'description',
                // 'keywords',
                // 'city_id',

                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
    </div>
    <br>
    <br>
</div>

