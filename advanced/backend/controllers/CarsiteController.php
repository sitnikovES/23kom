<?php

namespace backend\controllers;

use Yii;
use common\models\CarSite;
use backend\models\SCarsite;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Simpleimage;

/**
 * CarsiteController implements the CRUD actions for CarSite model.
 */
class CarsiteController extends BehaviorsController
{
   /* public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all CarSite models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SCarsite();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDelphoto(){
        $id = Yii::$app->request->post('id');
        $file = Yii::$app->request->post('file');
        if($id == null or $file == null){
            return 2 . ' - ' . $id . ' - ' . $file; //Не верные параметры
        }
        $file = __DIR__ . "/../../../komanda23.ru/docs/img/carsite/" . $id . '/' . $file;
        if(file_exists($file)){
            if(unlink($file)){
                return 1; //файл удален
            }
            return 3; //ошибка при удалении файла
        }
        return 4; //файл не найден
    }

    private function new_name($new,$old){
        $path_parts = pathinfo($old);
        return strtolower($new.'.'.$path_parts["extension"]);
    }

    public function actionAddphoto(){
        $id = Yii::$app->request->post('id');
        $uploaddir = __DIR__ . '/../../../komanda23.ru/docs/img/carsite/' . $id . '/';
        foreach($_FILES as $key=>$value){
            if($value["size"] > 0) {
                $tmp2 = "file_" . substr(md5(uniqid(rand(), 1)), 0, 10);
                $uploadfile = $uploaddir . $this->new_name($tmp2, basename($value['name']));
                if (move_uploaded_file($value['tmp_name'], $uploadfile)) {
                    //$message = "File " . $value['name'] . " загружен успешно.<br>";
                    $this->redirect(['carsite/update', 'id' => $id]);
                }
                else {
                    //$message = "Не удалось загрузить файл " . $value['name'] . ".";
                    //надо сделать вызов ошибочной страницы
                }
            }
        }
    }

    /**
     * Displays a single CarSite model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    /*
     * getting list of photos of the car */
    public function photoList($id){
        $result = array();
        if(file_exists( __DIR__ . "/../../../komanda23.ru/docs/img/carsite/" . $id)){
            $list = scandir(__DIR__ . "/../../../komanda23.ru/docs/img/carsite/" . $id);
            foreach($list as $id=>$value){
                if($value != '.' and $value != ".." and (strpos($value, "small_")!==0)){
                    $result[$value] = $value;
                }
            }
        }
        return $result;
    }

    /**
     * Creates a new CarSite model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CarSite();
        $photoList = array();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            //создаем папку для фото
            $t = __DIR__ . '/../../../komanda23.ru/docs/img/carsite/' . $model->id;
            if(file_exists($t)) {
                if(!is_dir($t)) {
                    mkdir($t);
                    return true;
                }
            }
            else {
                mkdir($t);
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'photoList' => $photoList,
            ]);
        }
    }

    /**
     * Updates an existing CarSite model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $photoList = $this->photoList($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            /*проверяем, есть ли превьюшка, если не, создаем*/
            $path = __DIR__ . '/../../../komanda23.ru/docs/img/carsite/' . $model->id . '/';
            if(!file_exists($path . 'small_' . $model->preview)) {
                $image = new Simpleimage();
                /*загружаем*/
                $image->load($path . $model->preview);
                /*                изменяем размер*/
                $image->resize(265, 180);
                /*                сохраняем*/
                $image->save($path . "small_" . $model->preview);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'photoList' => $photoList,
            ]);
        }
    }

    /**
     * Deletes an existing CarSite model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CarSite model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CarSite the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CarSite::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
