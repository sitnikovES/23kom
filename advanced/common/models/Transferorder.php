<?php

namespace common\models;

use Yii;
use common\models\TransferTariff;

/**
 * This is the model class for table "transfer_order".
 *
 * @property integer $id
 * @property string $place_a
 * @property string $place_b
 * @property string $email
 * @property string $phone
 * @property integer $paid
 * @property integer $paid_sum
 * @property integer $email_sended_client
 * @property integer $email_sended_taxi
 * @property string $date_create
 * @property integer $tariff_id
 * @property string $note
 * @property integer $passenger_count
 * @property integer $child_count
 * @property integer $baggage_count
 * @property integer $status
 * @property string $dt
 */
class Transferorder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer_order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['place_a', 'place_b', 'email', 'phone', 'tariff_id', 'passenger_count', 'child_count', 'baggage_count', 'dt'], 'required'],
            [['paid', 'paid_sum', 'email_sended_client', 'email_sended_taxi', 'tariff_id', 'passenger_count', 'child_count', 'baggage_count', 'status'], 'integer'],
            [['date_create', 'dt'], 'safe'],
            [['note'], 'string'],
            [['place_a', 'place_b'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['phone'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'place_a' => 'Откуда',
            'place_b' => 'Куда',
            'passenger_count' => 'Количество пассажиров',
            'baggage_count' => 'Багаж',
            'email' => 'E-Mail',
            'phone' => 'Телефон',
            'paid' => 'Оплачено',
            'paid_sum' => 'Сумма предоплаты',
            'dt' => 'Дата трансфера',
            'email_sended_client' => 'Письмо клиенту отправлено',
            'email_sended_taxi' => 'Письмо оператору отправлено',
            'date_create' => 'Дата подачи заявки',
            'tariff_id' => 'Класс транспорта',
            'note' => 'Примечание',
            'child_count' => 'Детские кресла',
            'status'=>'Статус заказа',
        ];
    }

    public function getTariff(){
        return $this->hasOne(TransferTariff::className(), ['id' => 'tariff_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                if(empty($this->child_count)){
                    $this->child_count = 0;
                }
                $this->date_create = Date('Y-m-d H:i:s');
                $this->email_sended_client = 0;
                $this->email_sended_taxi = 0;
                $this->status = 0;
                $this->paid_sum = 0;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if($insert){
            //Письмо клиенту
            Yii::$app->mailer->compose()
                ->setFrom('info@komanda23.ru')
                ->setTo($this->email)
                ->setSubject('Заказ на трансфер с сайта №' . $this->id)
                ->setTextBody('Текст сообщения')
                ->setHtmlBody('
                        <b>
                            <h1>Заказ на трансфер с сайта №' . $this->id . '</h1>
                            <table>
                            <tr><td>Место подачи: </td><td>' . $this->place_a . '</td></tr>
                            <tr><td>Куда ехать: </td><td>' . $this->place_b . '</td></tr>
                            <tr><td>Дата: </td><td>' . $this->dt . '</td></tr>
                            <tr><td>Тариф: </td><td>' . $this->tariff->name . '</td></tr>
                            <tr><td>Взрослых: </td><td>' . $this->passenger_count . '</td></tr>
                            <tr><td>Детей: </td><td>' . $this->child_count . '</td></tr>
                            <tr><td>Багаж: </td><td>' . $this->baggage_count . '</td></tr>
                            <tr><td>Телефон: </td><td>' . $this->phone . '</td></tr>
                            <tr><td>E-Mail: </td><td>' . $this->email . '</td></tr>
                            <tr><td>Примечание: </td><td>' . $this->note . '</td></tr>
                            </table>
                        </b>
                    ')->send();

            //Письмо оператору
            Yii::$app->mailer->compose()
                ->setFrom('info@komanda23.ru')
                ->setTo('szt.komanda@mail.ru')
                //->setTo('szt.komanda@mail.ru')
                ->setSubject('Заказ на трансфер с сайта №' . $this->id)
                ->setTextBody('Текст сообщения')
                ->setHtmlBody('
                        <b>
                            <h1>Заказ на трансфер с сайта №' . $this->id . '</h1>
                            <table>
                            <tr><td>Место подачи: </td><td>' . $this->place_a . '</td></tr>
                            <tr><td>Куда ехать: </td><td>' . $this->place_b . '</td></tr>
                            <tr><td>Дата: </td><td>' . $this->dt . '</td></tr>
                            <tr><td>Тариф: </td><td>' . $this->tariff->name . '</td></tr>
                            <tr><td>Взрослых: </td><td>' . $this->passenger_count . '</td></tr>
                            <tr><td>Детей: </td><td>' . $this->child_count . '</td></tr>
                            <tr><td>Багаж: </td><td>' . $this->baggage_count . '</td></tr>
                            <tr><td>Телефон: </td><td>' . $this->phone . '</td></tr>
                            <tr><td>E-Mail: </td><td>' . $this->email . '</td></tr>
                            <tr><td>Примечание: </td><td>' . $this->note . '</td></tr>
                            </table>
                        </b>
                    ')->send();

            $this->email_sended_taxi = 1;
            $this->email_sended_client = 1;
            $this->save();
        }
        return true;
    }
}
