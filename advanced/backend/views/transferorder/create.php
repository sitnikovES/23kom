<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Transferorder */

$this->title = 'Create Transferorder';
$this->params['breadcrumbs'][] = ['label' => 'Transferorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transferorder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
