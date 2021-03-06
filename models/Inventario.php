<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property string $id_inventario
 * @property string $id_mp Clave primaria de la materia prima que le corresponde en el inventario
 * @property float $existencia Cantidad de materia prima que se encuentra en el almacén
 * @property int $stock Cantidad de materia prima para evitar pérdidas en las ventas
 * @property float $costo_uni_medida Costo de la materia prima por unidad de medida
 * @property float $costo_uni_medida_min Costo de la materia prima por unidad de medida mínima
 *
 * @property Materiap $mp
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_inventario', 'id_mp', 'existencia', 'stock', 'costo_uni_medida', 'costo_uni_medida_min'], 'required'],
            [['existencia', 'costo_uni_medida', 'costo_uni_medida_min'], 'number'],
            [['stock'], 'integer'],
            [['id_inventario', 'id_mp'], 'string', 'max' => 5],
            [['id_inventario'], 'unique'],
            [['id_mp'], 'exist', 'skipOnError' => true, 'targetClass' => Materiap::className(), 'targetAttribute' => ['id_mp' => 'id_mp']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_inventario' => Yii::t('app', 'Id Inventario'),
            'id_mp' => Yii::t('app', 'Id Mp'),
            'existencia' => Yii::t('app', 'Existencia'),
            'stock' => Yii::t('app', 'Stock'),
            'costo_uni_medida' => Yii::t('app', 'Costo Uni Medida'),
            'costo_uni_medida_min' => Yii::t('app', 'Costo Uni Medida Min'),
        ];
    }

    /**
     * Gets query for [[Mp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMp()
    {
        return $this->hasOne(Materiap::className(), ['id_mp' => 'id_mp']);
    }
}
