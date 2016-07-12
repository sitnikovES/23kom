<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CarSite;

/**
 * SCarsite represents the model behind the search form about `common\models\CarSite`.
 */
class SCarsite extends CarSite
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hour_price', 'hour_min', 'city_km_price', 'cityout_km_price', 'type', 'active', 'city_id'], 'integer'],
            [['note', 'mark', 'phone', 'model', 'year', 'preview'], 'safe'],
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
        $query = CarSite::find();

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
            'hour_price' => $this->hour_price,
            'hour_min' => $this->hour_min,
            'city_km_price' => $this->city_km_price,
            'cityout_km_price' => $this->cityout_km_price,
            'type' => $this->type,
            'active' => $this->active,
            'city_id' => $this->city_id,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'note', $this->note])
            ->andFilterWhere(['like', 'mark', $this->mark])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'preview', $this->preview]);

        return $dataProvider;
    }
}
