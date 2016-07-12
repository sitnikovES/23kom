<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 31.05.2016
 * Time: 15:41
 */
namespace frontend\components;

use yii\base\Widget;

class TransferWidget extends Widget {
    public function init(){
        parent::init();
    }

    public function run(){
        return $this->render("form");
    }
}