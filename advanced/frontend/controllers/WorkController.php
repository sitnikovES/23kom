<?php

namespace frontend\controllers;

use Yii;
use common\models\City;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class WorkController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Transferorder models.
     * @return mixed
     */
    public function actionIndex()
    {
        //echo "12412";
        //die();
        return $this->render('index', [
            'city' => $this->getCurrentCity(),
        ]);
    }

    public function actionAnketaoperator()
    {
        $file = __DIR__ . '/../../../komanda23.ru/docs/docs/anketa.doc';
        if (file_exists($file) && is_readable($file)/* && preg_match('/\.doc$/',$file)*/) {
            header('Content-type: application/doc');
            header("Content-Disposition: attachment; filename=anketa.doc");
            readfile($file);
        }
    }

    public function actionAnketadriver()
    {
        return $this->render('anketadriver');
    }

    public function getCurrentCity(){
        $cityname = substr($_SERVER["SERVER_NAME"], 0, strpos($_SERVER["SERVER_NAME"], "."));
        return City::find()->where(['translit_name' => $cityname])->one();
    }
}
