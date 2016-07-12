<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Guestbook */

$this->title = 'Редактирование: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Гостевая книга', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="guestbook-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
