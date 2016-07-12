<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'language'=>'ru',
    'sourceLanguage'=>'ru',
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [],
    /*'on beforeRequest' => function () {
        $pathInfo = Yii::$app->request->pathInfo;
        if (!empty($pathInfo) && substr($pathInfo, -1) === '/') {
            Yii::$app->response->redirect('/' . substr(rtrim($pathInfo), 0, -1), 301)->send();
        }
    },*/
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'useFileTransport' => false,
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'nashi-uslugi.html'=>'/site/services',
                'predlogenie-gostinnicam.html'=>'/site/to_hotels',
                'raschet-rasstoyaniya.html'=>'/site/track',
                'transfer/new'=>'/transfer/create',
                'transfer.html'=>'/site/transfer',
                'zabitie-veshi.html'=>'/site/forgotten',
                'kak-perevozit-detei-v-avto.html' => '/site/child',
                'trudoustroistvo.html' => '/work/index',
                'anketaoperator' => '/work/anketaoperator',
                'agentdogovor' => '/site/agentdogovor',
                'bonus.html' => '/site/bonus',
                'avto-nyanya.html' => '/site/nyanya',

                'anketa.html' => '/work/anketadriver',
                'obratnaya-sviaz.html' => '/guestbook/index',
                'news.html' => '/news/index',
                'sotrudnikam.html' => '/site/usefull',
                'kontragentam.html' => '/site/agentinfo',
                'partner.html' => '/partners/index',

                //'nashi_avtomobili/<category:\w+>/<id:\d+>'=>'/cars/car',
                'nashi_avtomobili/<type:\w+>/<id:\d+>'=>'/cars/car',
                'nashi_avtomobili/<type:\w+>'=>'/cars/type',
                //'transfer/new/'=>'/transfer/new',
                'nashi_avtomobili' => '/cars/index',
            ],
        ],

    ],
    'params' => $params,
];
