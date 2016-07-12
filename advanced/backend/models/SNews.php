<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\News;

/**
 * SNews represents the model behind the search form about `common\models\News`.
 */
class SNews extends News
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['title', 'keywords', 'description', 'date_create', 'caption', 'content', 'intro'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'active' => $this->active,
            'date_create' => $this->date_create,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'caption', $this->caption])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'intro', $this->intro]);

        return $dataProvider;
    }
}
