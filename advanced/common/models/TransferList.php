<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "transfer_list".
 *
 * @property integer $id
 * @property integer $city_id
 * @property integer $track
 * @property integer $extracharge
 * @property string $place_b
 */
class TransferList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id', 'track', 'extracharge', 'place_b'], 'required'],
            [['city_id', 'track', 'extracharge'], 'integer'],
            [['place_b'], 'string', 'max' => 25],
            ['extracharge', 'default', 'value' => 0],
        ];
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    /*public function getTariff(){
        return $this->hasOne(TransferTariff::className(), ['id' => 'tariff_id']);
    }*/

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'city_id' => 'Город',
            'track' => 'Расстояние (км.)',
            'extracharge' => 'Надбавка (руб.)',
            'tariff_id' => 'Тариф',
            'place_b' => 'Конечный маршрут',
        ];
    }
}
