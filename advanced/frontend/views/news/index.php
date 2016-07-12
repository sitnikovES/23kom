<?php

use yii\helpers\Html;
use yii\grid\GridView;
use frontend\assets\GuestbookAsset;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->registerAssetBundle(GuestbookAsset::className());

$this->title = 'Наши новости';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="block_content">
    <div class="news-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'title',
                //'keywords',
                //'date_create',
                //'description',
                //'active',

                // 'caption',
                // 'content:ntext',
                // 'intro',
                [
                    'label' => 'Новости',
                    'format' => 'raw',

                    'value' => function($data){
                        return Html::img('/img/news/' . $data->id . '_main.jpg',[
                            'alt'=>'yii2 - картинка в gridview',
                            'style' => 'width:150px; float:left; margin-right:10px;'
                        ]) . '<div>' . $data->date_create .
                        ' </div><div> ' . Html::a($data->description, ['news/view', 'id' => $data->id], ['class' => 'profile-link']) . '</div>';
                    },
                ],


                //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>

    </div>
</div>

