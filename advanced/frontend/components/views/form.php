<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 31.05.2016
 * Time: 15:47
 */

use yii\bootstrap\Modal;

?>
<div style="text-align: center;">
    <h3>Заказать трансфер</h3>
    <form method="get" action="/transfer/new/" >
        <input type="text" name="place_a" class="form-control" style="max-width: 250px; display: inline;" />
        <input type="text" name="place_b" class="form-control" style="max-width: 250px; display: inline;" />
        <button type="submit" class="btn btn-primary">Заказать</button>
    </form>
</div>
<?php
/*Modal::begin([
    'header' => 'Hello you.',
    'toggleButton' => ['label'=>'click me'],
]);
echo "say hi";
Modal::end();*/
?>
