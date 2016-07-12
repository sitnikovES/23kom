<?php

namespace common\models;

use Yii;
use common\models\City;
/**
 * This is the model class for table "partners".
 *
 * @property integer $id
 * @property string $name
 * @property string $text
 * @property integer $status
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property integer $city_id
 */
class Partners extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'partners';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['status', 'city_id'], 'integer'],
            [['name', 'title', 'description', 'keywords'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Партнер',
            'text' => 'Текст',
            'status' => 'Статус',
            'title' => 'Заголовов страницы (Title)',
            'description' => 'Описание страницы (Description)',
            'keywords' => 'Ключевые слова (Keywords)',
            'city_id' => 'Город',
        ];
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
