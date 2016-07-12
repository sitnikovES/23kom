<?php

namespace frontend\controllers;

use Yii;
use common\models\Transferorder;
use common\models\TransferTariff;
use common\models\City;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TransferController implements the CRUD actions for Transferorder model.
 */
class TransferController extends Controller
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
        $dataProvider = new ActiveDataProvider([
            'query' => Transferorder::find(),
        ]);


        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Transferorder model.
     * @param integer $id
     * @return mixed
     */
    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Creates a new Transferorder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Transferorder();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['success']);
            //return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $model->place_a = urldecode(Yii::$app->request->get('place_a'));
            $model->place_b = urldecode(Yii::$app->request->get('place_b'));
            $current_city = $this->getCurrentCity();
            $tariff_list = array();
            $tmp = TransferTariff::find()->asArray()->all();
            foreach($tmp as $t){
                $tariff_list[$t['id']] = $t['name'] . ' ( ' . $t['note'] . ')';
            }
            return $this->render('create', [
                'model' => $model,
                'tariff_list' => $tariff_list,
                'current_city'=>$current_city,
            ]);
        }
    }

    public function getCurrentCity(){
        $cityname = substr($_SERVER["SERVER_NAME"], 0, strpos($_SERVER["SERVER_NAME"], "."));
        return City::find()->where(['translit_name'=>$cityname])->one();
    }

    /**
     * Updates an existing Transferorder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Deletes an existing Transferorder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionSuccess(){
        return $this->render('success');
    }

    /**
     * Finds the Transferorder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Transferorder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Transferorder::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
