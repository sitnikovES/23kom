<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transfer_tariff".
 *
 * @property integer $id
 * @property string $name
 * @property integer $landing
 * @property integer $price_in
 * @property integer $price_out
 */
class TransferTariff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transfer_tariff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'landing', 'price_in', 'price_out'], 'required'],
            [['landing', 'price_in', 'price_out'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'landing' => 'Стоимость посадки (руб.)',
            'price_in' => 'Стоимость по городу (руб./км.)',
            'price_out' => 'Стоимость за городом (руб./км.)',
            'note' => 'Краткое описание',
        ];
    }
}
