<?php
namespace frontend\controllers;

use Yii;
use common\models\City;
use common\models\CarSite;
use common\models\Cartype;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class CarsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function getCurrentCity(){
        $cityname = substr($_SERVER["SERVER_NAME"], 0, strpos($_SERVER["SERVER_NAME"], "."));
        return City::find()->where(['translit_name'=>$cityname])->one();
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $types = Cartype::find()->where(['active'=>1])->asArray()->orderBy('position')->all();
        return $this->render('index', [
            'types' => $types,
        ]);
    }

    public function actionType($type)
    {
        $type = Cartype::find()->where(['path'=>$type])->asArray()->orderBy('position')->one();
        if(count($type) > 0){
            $ccity = $this->getCurrentCity();
            return $this->render('type', [
                'type' => $type,
                'cars' => CarSite::find()->where(['type'=>$type['id'], 'active'=>1, 'city_id'=>$ccity["id"]])->asArray()->all(),
            ]);
        }
        else {
            //тут надо сделать переход на страницу /nashi-avtomobili.html
        }
    }

    public function actionCar($id)
    {

        //$car_type = array("standart"=>1, 2=>"Грузовые автомобили", 3=>"Спецтехника", 4=>"Комфорт",  5=>"VIP", 6=>"Джипы", 7=>"м/автобус 8-мест", 8=>"м/автобус до 10-ти мест", 9=>"м/автобус от 12-ти до 20-ти мест",10=>"Лимузины",11=>"Яхты",12=>"Мотоциклы");
        //$car_types = array(1=>"Стандарт", 2=>"Грузовые автомобили", 3=>"Спецтехника", 4=>"Комфорт",  5=>"VIP", 6=>"Джипы", 7=>"м/автобус 8-мест", 8=>"м/автобус до 10-ти мест", 9=>"м/автобус от 12-ти до 20-ти мест",10=>"Лимузины",11=>"Яхты",12=>"Мотоциклы");

        //if(isset($car_type[$category])){
        $ccity = $this->getCurrentCity();
        $car = CarSite::find()->where(['id'=>$id, 'city_id'=>$ccity['id']])->asArray()->one();
        if(is_array($car)){
            $photo_list = scandir(__DIR__ . "/../../../komanda23.ru/docs/img/carsite/" . $car['id']);
            $tmp = array();
            foreach($photo_list as $id => $value){
                if($value == '.' or $value == ".." or (strpos($value, "small_")===0)){
                    unset($photo_list[$id]);
                }
                else {
                    $tmp[filemtime(__DIR__ . "/../../../komanda23.ru/docs/img/carsite/" . $car['id'] ."/" . $value)] = $value;
                }
            }

            return $this->render('car', [
                'car' => $car,
                'photo_list' => $photo_list,
            ]);
        }
        else {
            //тут надо сделать переход на страницу /nashi-avtomobili.html/категория
        }

    }
}
