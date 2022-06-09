<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Unidadesmedida;

/**
 * UnidadesmedidaSearch represents the model behind the search form of `app\models\Unidadesmedida`.
 */
class UnidadesmedidaSearch extends Unidadesmedida
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_uni_medida', 'nombre_uni_medida', 'abreviatura', 'descripcion'], 'safe'],
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
        $query = Unidadesmedida::find();

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
        $query->andFilterWhere(['like', 'id_uni_medida', $this->id_uni_medida])
            ->andFilterWhere(['like', 'nombre_uni_medida', $this->nombre_uni_medida])
            ->andFilterWhere(['like', 'abreviatura', $this->abreviatura])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion]);

        return $dataProvider;
    }
}
