<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Materiap;

/**
 * MateriapSearch represents the model behind the search form of `app\models\Materiap`.
 */
class MateriapSearch extends Materiap
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mp', 'nombre_mp', 'id_uni_medida', 'id_clasificacion', 'descripcion'], 'safe'],
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
        $query = Materiap::find();

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
        $query->andFilterWhere(['like', 'id_mp', $this->id_mp])
            ->andFilterWhere(['like', 'nombre_mp', $this->nombre_mp])
            ->andFilterWhere(['like', 'id_uni_medida', $this->id_uni_medida])
            ->andFilterWhere(['like', 'id_clasificacion', $this->id_clasificacion])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
