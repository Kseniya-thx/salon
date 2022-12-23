<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Visits;

/**
 * VisitsSearch represents the model behind the search form of `app\models\Visits`.
 */
class VisitsSearch extends Visits
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_visitor', 'id_client', 'id_services', 'id_employee'], 'integer'],
            [['date', 'time', 'service_rendered'], 'safe'],
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
        $query = Visits::find();

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
            'id_visitor' => $this->id_visitor,
            'id_client' => $this->id_client,
            'id_services' => $this->id_services,
            'id_employee' => $this->id_employee,
            'date' => $this->date,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'service_rendered', $this->service_rendered]);

        return $dataProvider;
    }
}
