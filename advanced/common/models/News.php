<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property integer $active
 * @property string $date_create
 * @property string $caption
 * @property string $content
 * @property string $intro
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active'], 'integer'],
            [['date_create'], 'safe'],
            [['content'], 'string'],
            [['title', 'keywords', 'description', 'caption', 'intro'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок страницы (title)',
            'keywords' => 'Ключевые слова(keywords)',
            'description' => 'Краткое описание (description)',
            'active' => 'Опубликовано',
            'date_create' => 'Дата создания',
            'caption' => 'Название новости',
            'intro' => 'Введение',
            'content' => 'Основной текст',
        ];
    }
}
