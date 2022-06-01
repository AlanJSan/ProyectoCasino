<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "materiap".
 *
 * @property string $id_mp Clave primaria de la materia prima
 * @property string $nombre_mp Nombre de la materia prima
 * @property string $id_uni_medida Clave foránea de la unidad de medida que tiene la materia prima
 * @property string $id_clasificacion Clave foránea de la clasificación a la que pertenece la materia prima
 * @property string $descripcion Descripción que incluye detalles de la materia prima como por ejemplo el tamaño o la marca del producto
 *
 * @property Inventario $inventario
 */
class Materiap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'materiap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mp', 'nombre_mp', 'id_uni_medida', 'id_clasificacion', 'descripcion'], 'required'],
            [['id_mp', 'id_clasificacion'], 'string', 'max' => 5],
            [['nombre_mp'], 'string', 'max' => 30],
            [['id_uni_medida'], 'string', 'max' => 4],
            [['descripcion'], 'string', 'max' => 50],
            [['id_mp'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_mp' => Yii::t('app', 'Id Mp'),
            'nombre_mp' => Yii::t('app', 'Nombre Mp'),
            'id_uni_medida' => Yii::t('app', 'Id Uni Medida'),
            'id_clasificacion' => Yii::t('app', 'Id Clasificacion'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[Inventario]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventario()
    {
        return $this->hasOne(Inventario::className(), ['id_mp' => 'id_mp']);
    }
}