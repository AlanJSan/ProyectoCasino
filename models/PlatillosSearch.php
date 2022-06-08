<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Platillos;

/**
 * PlatillosSearch represents the model behind the search form of `app\models\Platillos`.
 */
class PlatillosSearch extends Platillos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_platillo', 'nombre_platillo', 'descripcion', 'id_clasifplatillo', 'fotografia'], 'safe'],
            [['costo_produccion', 'precio_venta'], 'number'],
            //[["clasificacion","string"]]
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
        $query = Platillos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort(
            [
                "attributes" => [
                    "id_platillo",
                    "nombre_platillo",
                    "descripcion",
                    "id_clasifplatillo",
                    "costo_produccion",
                    "precio_venta",
                    "fotografia",
                    "clasificacion" => [
                        "asc" => ["clasificacion" => SORT_ASC],
                        "desc" => ["clasificacion" => SORT_DESC]
                    ]
                ]
            ]
        );

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'costo_produccion' => $this->costo_produccion,
            'precio_venta' => $this->precio_venta,
        ]);

        $query->andFilterWhere(['like', 'id_platillo', $this->id_platillo])
            ->andFilterWhere(['like', 'nombre_platillo', $this->nombre_platillo])
            ->andFilterWhere(['like', 'descripcion', $this->descripcion])
            ->andFilterWhere(['like', 'id_clasifplatillo', $this->id_clasifplatillo])
            ->andFilterWhere(['like', 'fotografia', $this->fotografia]);

        // $query->joinWith(["clasifplatillo"=> function($valor){
        //     $valor->FilterWhere(["like", "nombre_clasif", $this->clasificacion]);
        // }]);

        return $dataProvider;
    }
}
