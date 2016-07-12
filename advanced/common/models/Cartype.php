<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "car_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $path
 * @property integer $active
 * @property integer $position
 */
class Cartype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'car_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'path'], 'required'],
            [['active', 'position'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['path'], 'string', 'max' => 20]
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
            'path' => 'Транслит кратко',
            'active' => 'Отображать',
            'position' => 'Позиция',
        ];
    }
}
