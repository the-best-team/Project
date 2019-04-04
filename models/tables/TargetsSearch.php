<?php

namespace app\models\tables;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\Targets;

/**
 * TargetsSearch represents the model behind the search form of `app\models\tables\Targets`.
 */
class TargetsSearch extends Targets
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status_id'], 'integer'],
            [['name', 'description', 'date_create', 'date_change', 'date_plane', 'date_resolve'], 'safe'],
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
        $query = Targets::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'date_create' => $this->date_create,
            'date_change' => $this->date_change,
            'date_plane' => $this->date_plane,
            'date_resolve' => $this->date_resolve,
            'status_id' => $this->status_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);
//            ->andFilterWhere(['like', 'user_id' => $this->user_id]);

        return $dataProvider;
    }
}