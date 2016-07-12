<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerMetaTag(['name'=>'description', 'value' => $model->description]);
$this->registerMetaTag(['name'=>'keywords', 'value' => $model->keywords]);
?>
<div class="block_content">
    <div class="news-view">

        <h1><?= Html::encode($this->title) ?></h1>
        <?= $model->content ?>
    </div>
</div>
