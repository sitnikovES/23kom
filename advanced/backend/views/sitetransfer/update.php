<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\SiteTransfer */

$this->title = 'редактирование: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Трансфер страница', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->city_id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="site-transfer-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'citylist' => $citylist,
    ]) ?>

</div>
