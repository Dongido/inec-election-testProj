<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PollingUnit;
use app\models\Lga;
use app\models\AnnouncedPuResults;

/**
 * PollingUnitSearch represents the model behind the search form of `app\models\PollingUnit`.
 */
class PollingUnitSearch extends PollingUnit
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uniqueid', 'polling_unit_id', 'ward_id', 'uniquewardid'], 'integer'],
            [['polling_unit_number', 'lga_id', 'polling_unit_name', 'polling_unit_description', 'lat', 'long', 'entered_by_user', 'date_entered', 'user_ip_address'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = PollingUnit::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'uniqueid' => $this->uniqueid,
            'polling_unit_id' => $this->polling_unit_id,
            'ward_id' => $this->ward_id,
            'lga_id' => $this->lga_id,
            'uniquewardid' => $this->uniquewardid,
            'date_entered' => $this->date_entered,
        ]);

        $query->andFilterWhere(['like', 'polling_unit_number', $this->polling_unit_number])
            ->andFilterWhere(['like', 'polling_unit_name', $this->polling_unit_name])
            ->andFilterWhere(['like', 'polling_unit_description', $this->polling_unit_description])
            ->andFilterWhere(['like', 'lat', $this->lat])
            ->andFilterWhere(['like', 'long', $this->long])
            ->andFilterWhere(['like', 'entered_by_user', $this->entered_by_user])
            ->andFilterWhere(['like', 'user_ip_address', $this->user_ip_address]);

        return $dataProvider;
    }

}
