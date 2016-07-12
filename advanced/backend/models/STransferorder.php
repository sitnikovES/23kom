<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Transferorder;

/**
 * STransferorder represents the model behind the search form about `common\models\Transferorder`.
 */
class STransferorder extends Transferorder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'paid', 'paid_sum', 'email_sended_client', 'email_sended_taxi', 'tariff_id', 'passenger_count', 'child_count', 'baggage_count', 'status'], 'integer'],
            [['place_a', 'place_b', 'email', 'phone', 'date_create', 'note'], 'safe'],
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
        $query = Transferorder::find();

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
            'paid' => $this->paid,
            'paid_sum' => $this->paid_sum,
            'email_sended_client' => $this->email_sended_client,
            'email_sended_taxi' => $this->email_sended_taxi,
            'date_create' => $this->date_create,
            'tariff_id' => $this->tariff_id,
            'passenger_count' => $this->passenger_count,
            'child_count' => $this->child_count,
            'baggage_count' => $this->baggage_count,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'place_a', $this->place_a])
            ->andFilterWhere(['like', 'place_b', $this->place_b])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'note', $this->note]);

        return $dataProvider;
    }
}
