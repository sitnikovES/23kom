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
            [['place_a', 'place_b', 'email', 'phone', 'date_create', 'dt', 'tariff_id'], 'required'],
            [['paid', 'paid_sum', 'email_sended_client', 'email_sended_taxi', 'tariff_id', 'passenger_count', 'child_count', 'baggage_count', 'status'], 'integer'],
            [['date_create', 'dt'], 'safe'],
            [['note'], 'string'],
            [['place_a', 'place_b', 'email'], 'string', 'max' => 255],
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
            'place_a' => 'Place A',
            'place_b' => 'Place B',
            'email' => 'Email',
            'phone' => 'Phone',
            'paid' => 'Paid',
            'paid_sum' => 'Paid Sum',
            'email_sended_client' => 'Email Sended Client',
            'email_sended_taxi' => 'Email Sended Taxi',
            'date_create' => 'Date Create',
            'tariff_id' => 'Tariff ID',
            'note' => 'Note',
            'passenger_count' => 'Passenger Count',
            'child_count' => 'Child Count',
            'baggage_count' => 'Baggage Count',
            'status' => 'Status',
            'dt' => 'Dt',
        ];
    }

    public function getTariff(){
        return $this->hasOne(TransferTariff::className(), ['id' => 'tariff_id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($insert){
                $this->date_create = Date('Y-m-d H:i:s');
                $this->email_sended_client = 0;
                $this->email_sended_taxi = 0;
                $this->status = 0;
                $this->paid_sum = 0;
                $this->paid = 0;
            }
            return true;
        } else {
            return false;
        }
    }

    public function afterSave($insert, $changedAttributes)
    {
        if(parent::afterSave($insert, $changedAttributes)){
            if($insert){
                $this->email_sended_client = 1;
            }
        }
    }
}
