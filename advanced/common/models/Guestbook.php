<?php

namespace common\models;

use Yii;
/**
 * This is the model class for table "guestbook".
 *
 * @property integer $id
 * @property string $name
 * @property string $mes
 * @property string $answer
 * @property string $dt
 * @property integer $state
 * @property integer $city_id
 */

class Guestbook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'guestbook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mes', 'name'], 'required'],
            [['mes', 'answer'], 'string'],
            [['dt'], 'safe'],
            [['state', 'city_id'], 'integer'],
            [['name'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Отправитель',
            'mes' => 'Сообщение',
            'answer' => 'Ответ',
            'dt' => 'Дата',
            'state' => 'Опубликовано',
            'city_id' => 'Город',
        ];
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
