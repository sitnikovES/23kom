<?php

namespace backend\controllers;

use Yii;
use \yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class BehaviorsController extends Controller {
	public function behaviors(){
		return [
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' =>true,
						'controllers'=>['site'],
						'actions' => ['login'],
						'verbs'=>['GET', 'POST'],
						'roles'=>['?']
					],

                    [
                        'controllers' => ['site'],
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],

                    [
                        'controllers' => ['site'],
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					
					[   //гостям запрещено все
						'allow' => false,
						'controllers' => ['city', 'user', 'transfertariff', 'transferlist', 'sitetransfer', 'site', 'partners', 'news', 'guestbook', 'carsite'],
						'actions' => ['create', 'view', 'update', 'delete', 'index'],
						'roles' => ['?'],
					],

                    [   //зарегестрированным можно все
                        'allow' => true,
                        'controllers' => ['city', 'user', 'transfertariff', 'transferlist', 'sitetransfer', 'site', 'partners', 'news', 'guestbook', 'carsite'],
                        //'actions' => ['create', 'view', 'update', 'delete', 'index'],
                        'roles' => ['@'],
                    ],

				]
			]
		];
	}
}