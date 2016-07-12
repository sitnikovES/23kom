<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CarSite */

$this->title = 'Просмотр автомобиля id#' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Машины на сайте', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="car-site-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <table>
        <tr>
            <td>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'hour_price',
                        'hour_min',
                        'city_km_price',
                        'cityout_km_price',
                        //'type',
                        ['attribute' => 'type', 'value' => $model->cartype->name, ],
                        'note:ntext',
                        'active:boolean',
                        //'city_id',
                        ['attribute' => 'city_id', 'value' => $model->city->name, ],
                        'mark',
                        'phone',
                        'model',
                        'year',
                        'preview',
                    ]
                ]) ?>
            </td>
            <td>
                <label>Изображение по умолчанию</label>
                <img height="350px" src="http://<?php echo substr($_SERVER['SERVER_NAME'], 6); ?>/img/carsite/<?php echo $model->id . "/" . $model->preview; ?>">
            </td>
        </tr>
    </table>
</div>