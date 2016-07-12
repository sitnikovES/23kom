<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\SiteTransfer */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Трансфер страница', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-transfer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'citylist' => $citylist,
    ]) ?>

</div>
