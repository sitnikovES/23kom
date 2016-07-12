<?php
return [
    'language'=>'ru',
    'sourceLanguage'=>'ru',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],

        //'urlManager' => [
          //  'enablePrettyUrl' => true,
            //'encodeParams' => false,
            //'showScriptName' => false,
           /* 'rules' => [
            ],
        ],*/
    ],
];
