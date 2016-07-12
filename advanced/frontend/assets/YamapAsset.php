<?php
namespace frontend\assets;

use yii\web\AssetBundle;


class YamapAsset extends AssetBundle
{
	//public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $css = [
        'css/uptaxi/clientsite/taxiapp/order.css',
    ];
    public $js = [
        '//api-maps.yandex.ru/2.1/?lang=ru_RU',
        'js/yamap/yamap.js',
        'js/yamap/track.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
    ];
}
