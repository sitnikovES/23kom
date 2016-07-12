<?php
namespace frontend\controllers;

use common\models\Data;
use common\models\News;
use common\models\Partners;
use common\models\SiteTransfer;
//use common\models\Tariff;
use common\models\TransferList;
use common\models\TransferTariff;
use Yii;
use common\models\City;
//use common\models\LoginForm;
//use frontend\models\PasswordResetRequestForm;
//use frontend\models\ResetPasswordForm;
//use frontend\models\SignupForm;
//use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class SiteController extends Controller
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
        return City::find()->where(['translit_name' => $cityname])->one();
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
        $news = News::find()->where(['active'=>1])->orderBy('date_create DESC')->asArray()->limit(3)->all();
        $partners = Partners::find()->where(['status'=>1])->orderBy('id DESC')->asArray()->limit(2)->all();
        if(!isset($news[2]) and count($news) > 0){
            if(!isset($news[1])){
                $news[1] = $news[0];
            }
            $news[2] = $news[0];
        }
        if(count($partners) == 1){
            $partners[1] = $partners[0];
        }

        $current_city = $this->getCurrentCity();

        if(strpos($_SERVER["SERVER_NAME"], '.komanda23') > 0 ){
            return $this->render('index', [
                'current_city' => $current_city,
                'news' => $news,
                'partners' => $partners,
                'tarif' => Data::tarif($current_city->id),
            ]);
        }
        else {
            return $this->renderPartial('root', [
                'cities' => City::find()->where(['active'=>1])->orderBy('name')->asArray()->all(),
            ]);
        }

    }

    public function actionAgentdogovor()
    {
        $city_id = $this->getCurrentCity()->id;
        if(file_exists( __DIR__ . '/../../../komanda23.ru/docs/docs/dogovor_' . $city_id . '.doc')){
            $file = __DIR__ . '/../../../komanda23.ru/docs/docs/dogovor_' . $city_id . '.doc';
        }
        else {
            $file = __DIR__ . '/../../../komanda23.ru/docs/docs/dogovor_1.doc';
        }
        if (file_exists($file) && is_readable($file)/* && preg_match('/\.doc$/',$file)*/) {
            header('Content-type: application/doc');
            header("Content-Disposition: attachment; filename=agent_dogovor.doc");
            readfile($file);
        }
    }


    /**
     * Displays sotrudnikam.html(usefull).
     *
     * @return mixed
     */
    public function actionUsefull()
    {
        return $this->render('usefull');
    }


    /**
     * Displays bonus.html(bonus).
     *
     * @return mixed
     */
    public function actionBonus()
    {
        return $this->render('bonus');
    }

    /**
     * Displays avto-nyanya.html(nyanya).
     *
     * @return mixed
     */
    public function actionNyanya()
    {
        return $this->render('nyanya');
    }

    /**
     * Displays sotrudnikam.html(usefull).
     *
     * @return mixed
     */
    public function actionAgentinfo()
    {
        return $this->render('agentinfo',[
            'city' => $this->getCurrentCity(),
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $session = Yii::$app->session;
        $session->open();

        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                $session->setFlash('GBSuccess');
            } else {
                $session->setFlash('GBError');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    /**
     * Displays nashi-uslugi.html page.
     *
     * @return mixed
     */
    public function actionServices()
    {
        return $this->render('services');
    }

    /**
     * Displays predlogenie-gostinnicam.html page.
     *
     * @return mixed
     */
    public function actionTo_hotels()
    {
        return $this->render('to_hotels');
    }


    /**
     * Displays raschet-rasstoyaniya.html page.
     *
     * @return mixed
     */
    public function actionTrack()
    {
        $current_city = $this->getCurrentCity();
        return $this->render('track',[
            'current_city'=>$current_city,
        ]);
    }

    public function actionCartype()
    {
        return $this->render('track');
    }


    /**
     * Displays zabitie-veshi.html page.
     *
     * @return mixed
     */
    public function actionForgotten(){
        return $this->render('forgotten');
    }

    /**
     * Displays kak-perevozit-detei-v-avto.html page.
     *
     * @return mixed
     */
    public function actionChild(){
        return $this->render('child');
    }

    /**
     * Displays trudoustroistvo.html page.
     *
     * @return mixed
     */
    public function actionWork(){
        return $this->render('work', [
            'city' => $this->getCurrentCity(),
        ]);
    }

    /**
     * Displays transfer.html page.
     *
     * @return mixed
     */
    public function actionTransfer()
    {
        $current_city = $this->getCurrentCity();
        return $this->render('transfer', [
            'current_city' => $current_city,
            'model'=>SiteTransfer::find()->where(['city_id'=>$current_city->id])->one(),
            'directions' => TransferList::find()->where(['city_id'=>$current_city->id])->asArray()->all(),
            'tariff_list' => TransferTariff::find()->orderBy('landing')->asArray()->all(),
            ''
        ]);
    }


    /**
     * Signs user up.
     *
     * @return mixed
     */
    /*public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }*/

    /**
     * Requests password reset.
     *
     * @return mixed
     */
   /* public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }*/

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    /*public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }*/
}
