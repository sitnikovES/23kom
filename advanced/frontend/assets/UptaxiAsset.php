<?php
namespace frontend\assets;

use yii\web\AssetBundle;


class UptaxiAsset extends AssetBundle
{
	//public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $css = [
        'http://root.uptaxi.ru/uptaxi/controls/base.css',
        'http://root.uptaxi.ru/uptaxi/controls/animate.css',
        'http://root.uptaxi.ru/uptaxi/controls/controls.css',
        'css/uptaxi/clientsite/taxiapp/client.css',
        'css/uptaxi/clientsite/taxiapp/order.css',
    ];
    public $js = [
        'http://root.uptaxi.ru/uptaxi/controls/controls.js',
        'http://root.uptaxi.ru/uptaxi/controls/functions.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
