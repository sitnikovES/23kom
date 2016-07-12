<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TransferOrderAsset extends AssetBundle
{
	public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'datetimepicker/jquery.datetimepicker.css',
    ];
    public $js = [
        'datetimepicker/build/jquery.datetimepicker.full.min.js',
        'js/datetimepicker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
