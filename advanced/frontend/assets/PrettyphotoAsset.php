<?php
namespace frontend\assets;

use yii\web\AssetBundle;


class PrettyphotoAsset extends AssetBundle
{
	//public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $css = [
        'js/prettyphoto/prettyPhoto.css',
    ];
    public $js = [
        'js/prettyphoto/jquery.prettyPhoto.js',
    ];
    public $depends = [
        //'yii\web\YiiAsset',
    ];
}
