<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TransferList */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Трасфер Направление', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transfer-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
