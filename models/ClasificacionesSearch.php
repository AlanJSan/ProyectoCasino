<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Clasificaciones;

/**
 * ClasificacionesSearch represents the model behind the search form of `app\models\Clasificaciones`.
 */
class ClasificacionesSearch extends Clasificaciones
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clasifplatillo', 'nombre_clasif'], 'safe'],
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
        $query = Clasificaciones::find();

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
        $query->andFilterWhere(['like', 'id_clasifplatillo', $this->id_clasifplatillo])
            ->andFilterWhere(['like', 'nombre_clasif', $this->nombre_clasif]);

        return $dataProvider;
    }
}
