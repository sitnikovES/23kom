<?php

namespace common\models;

use Yii;
use common\models\City;

/**
 * This is the model class for table "car_site".
 *
 * @property integer $id
 * @property integer $hour_price
 * @property integer $hour_min
 * @property integer $city_km_price
 * @property integer $cityout_km_price
 * @property integer $type
 * @property string $note
 * @property integer $active
 * @property integer $city_id
 * @property string $mark
 * @property string $phone
 * @property string $model
 * @property string $year
 * @property string $preview
 */
class CarSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hour_price', 'hour_min', 'city_km_price', 'cityout_km_price', 'type', 'active', 'city_id'], 'integer'],
            [['note'], 'string'],
            [['mark', 'phone'], 'required'],
            [['year'], 'safe'],
            [['mark'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 30],
            [['model'], 'string', 'max' => 50],
            [['preview'], 'string', 'max' => 25]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hour_price' => 'Стоимость часа (руб.)',
            'hour_min' => 'Посадка (руб.)',
            'city_km_price' => 'Стоимость по городу (руб./км.)',
            'cityout_km_price' => 'Стоимость межгород (руб./км.)',
            'type' => 'Тип',
            'note' => 'Примечание',
            'active' => 'Отображать',
            'city_id' => 'Город',
            'mark' => 'Марка',
            'phone' => 'Телефон',
            'model' => 'Модель',
            'year' => 'Год',
            'preview' => 'Preview',
        ];
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }

    public function getCartype(){
        return $this->hasOne(Cartype::className(), ['id' => 'type']);
    }
}
