<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "site_transfer".
 *
 * @property integer $city_id
 * @property string $keywords
 * @property string $description
 * @property string $title
 * @property string $text
 */
class SiteTransfer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'site_transfer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_id'], 'required'],
            [['city_id'], 'integer'],
            [['text'], 'string'],
            [['keywords', 'description', 'title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'Город',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание страницы',
            'title' => 'Заголовок страницы',
            'text' => 'Текст',
        ];
    }

    public function getCity(){
        return $this->hasOne(City::className(), ['id' => 'city_id']);
    }
}
