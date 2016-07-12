<?php

namespace frontend\controllers;

use Yii;
use common\models\Guestbook;
use common\models\City;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\GuestbookForm;

/**
 * GuestbookController implements the CRUD actions for Guestbook model.
 */
class GuestbookController extends Controller
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

    public function getCurrentCity(){
        $cityname = substr($_SERVER["SERVER_NAME"], 0, strpos($_SERVER["SERVER_NAME"], "."));
        return City::find()->where(['translit_name'=>$cityname])->one();
    }

    /**
     * Lists all Guestbook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        $session->open();

        $model = new GuestbookForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->save(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('GBSuccess');
            } else {
                Yii::$app->session->setFlash('GDError');
            }

            return $this->refresh();
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Guestbook::find()->where(['state'=>1, 'city_id'=>[0, $this->getCurrentCity()->id]])->orderBy('dt desc'),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Guestbook model.
     * @param integer $id
     * @return mixed
     */
   /* public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }
*/
    /**
     * Creates a new Guestbook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
  /*  public function actionCreate()
    {
        $model = new Guestbook();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }*/

    /**
     * Updates an existing Guestbook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
   /* public function actionUpdate($id)
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
     * Deletes an existing Guestbook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
   /* public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }*/

    /**
     * Finds the Guestbook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Guestbook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Guestbook::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
