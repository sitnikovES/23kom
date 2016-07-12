<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */

$this->title = 'Редактирование: ' . ' №' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Трансфер заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Заказ №' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="transferorder-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
