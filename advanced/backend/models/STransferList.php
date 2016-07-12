<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TransferList;

/**
 * STransferList represents the model behind the search form about `common\models\TransferList`.
 */
class STransferList extends TransferList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'city_id', 'track', 'extracharge'], 'integer'],
            [['place_b'], 'safe'],
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
        $query = TransferList::find();

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
            'city_id' => $this->city_id,
            'track' => $this->track,
            'extracharge' => $this->extracharge,
        ]);

        $query->andFilterWhere(['like', 'place_b', $this->place_b]);

        return $dataProvider;
    }
}
