<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use frontend\assets\GuestbookAsset;


/* @var $this yii\web\View */
/* @var $model common\models\Partners */

$this->registerAssetBundle(GuestbookAsset::className());
$this->registerMetaTag(['name' => 'description', 'content' => $model->description]);
$this->registerMetaTag(['name' => 'keywords', 'content' => $model->keywords]);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="block_content">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $model->text; ?>
    <!--<div class="partners-view">
        <?/*= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'text:ntext',
                'status',
                'title',
                'description',
                'keywords',
                'city_id',
            ],
        ]) */?>
    </div>-->
</div>

