<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "city_ref".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 * @property integer $def
 * @property integer $sto_id
 * @property string $ot_kadrov
 * @property string $otk_start
 * @property string $otk_end
 * @property string $phone_contact
 * @property string $tariff
 * @property string $phone_head
 * @property double $latitude
 * @property double $longitude
 * @property string $translit_name
 */
class City extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'city_ref';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'def', 'sto_id'], 'integer'],
            [['tariff'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['translit_name'], 'required'],
            [['name', 'ot_kadrov', 'phone_contact', 'phone_head'], 'string', 'max' => 50],
            [['otk_start', 'otk_end'], 'string', 'max' => 5],
            [['translit_name'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Город',
            'active' => 'Отображать на сайте',
            'def' => 'Выбор по умолчанию',
            'sto_id' => 'СТО (не используется)',
            'ot_kadrov' => 'Телефон отдела кадров',
            'otk_start' => 'Начало работы ОК',
            'otk_end' => 'Конец работы ОК',
            'phone_contact' => 'Контактный телефон',
            'tariff' => 'Tariff(вроде не используется)',
            'phone_head' => 'Телефон в шапке сайта',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
            'translit_name' => 'Имя в транслите',
        ];
    }
}
