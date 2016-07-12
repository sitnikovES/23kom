<?php

namespace frontend\models;

use common\models\Data;
use Yii;
use yii\base\Model;
use common\models\Guestbook;
use common\models\City;

/**
 * ContactForm is the model behind the contact form.
 */
class GuestbookForm extends Model
{
    public $name;
    public $mes;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'mes'], 'required'],
            // email has to be a valid email address
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Проверочных код',
            'mes' => 'Вопрос',
            'name' => 'Имя',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param  string  $email the target email address
     * @return boolean whether the email was sent
     */
    public function save($email)
    {

        $cityname = substr($_SERVER["SERVER_NAME"], 0, strpos($_SERVER["SERVER_NAME"], "."));
        $city = City::find()->where(['translit_name'=>$cityname])->asArray()->one();

        $feedback = new Guestbook();
        $feedback->dt = Date('Y-m-d H:i:s');
        $feedback->mes = $this->mes;
        $feedback->name = $this->name;
        $feedback->city_id = $city['id'];

        /*Yii::$app->mailer->compose()
                ->setTo('ugin78@mail.ru')
                ->setFrom('info@komanda23.ru')
                ->setSubject('Новая запись в гостевой книге(' . $this->name . ')')
                ->setTextBody(
                    $this->name
                    . '
                '
                    . $this->mes)
                ->send() && $feedback->save();*/


        return (Yii::$app->mailer->compose()
            ->setTo(['szt.komanda@mail.ru', 'ugin78@mail.ru'])
            ->setFrom('info@komanda23.ru')
            ->setSubject('Новая запись в гостевой книге(' . $this->name . ')')
            ->setTextBody(
                $this->name
                . '
                '
                . $this->mes)
            ->send() && $feedback->save());
    }
}
