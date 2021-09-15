<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AnnouncedPuResults;

/**
 * AnnouncedPuResultsSearch represents the model behind the search form of `app\models\AnnouncedPuResults`.
 */
class AnnouncedPuResultsSearch extends AnnouncedPuResults
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['result_id', 'party_score'], 'integer'],
            [['polling_unit_uniqueid', 'party_abbreviation', 'entered_by_user', 'date_entered', 'user_ip_address'], 'safe'],
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
        $query = AnnouncedPuResults::find();

        $query->leftJoin('polling_unit', 'polling_unit.uniqueid=announced_pu_results.polling_unit_uniqueid');

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
            'result_id' => $this->result_id,
            'party_score' => $this->party_score,
            'date_entered' => $this->date_entered,
        ]);

        $query->andFilterWhere(['like', 'party_abbreviation', $this->party_abbreviation])
            ->andFilterWhere(['like', 'entered_by_user', $this->entered_by_user])
            ->andFilterWhere(['like', 'user_ip_address', $this->user_ip_address])
            ->andFilterWhere(['like', 'polling_unit.polling_unit_name', $this->polling_unit_uniqueid]);
            //->andFilterWhere(['like', 'polling_unit_uniqueid', $this->polling_unit_uniqueid])
            

        return $dataProvider;
    }
}
