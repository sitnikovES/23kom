<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->title = 'Новый партнер';
$this->params['breadcrumbs'][] = ['label' => 'Партнеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
