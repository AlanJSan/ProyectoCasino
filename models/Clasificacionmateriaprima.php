<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificacionmateriaprima".
 *
 * @property string $id_clasificacion Clave primaria de la clasificación de la materia prima
 * @property string $nombre_clasificacion Nombre de la clasificación a la que pertenecen las materias primas
 * @property string $descripcion Descripción que incluye detalles de la clasificación de la materia prima como por ejemplo las características de las materias primas que engloba la clasificación
 *
 * @property Materiap[] $materiaps
 */
class Clasificacionmateriaprima extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clasificacionmateriaprima';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clasificacion', 'nombre_clasificacion', 'descripcion'], 'required'],
            [['id_clasificacion'], 'string', 'max' => 5],
            [['nombre_clasificacion', 'descripcion'], 'string', 'max' => 50],
            [['id_clasificacion'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clasificacion' => Yii::t('app', 'Id Clasificacion'),
            'nombre_clasificacion' => Yii::t('app', 'Nombre Clasificacion'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * Gets query for [[Materiaps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMateriaps()
    {
        return $this->hasMany(Materiap::className(), ['id_clasificacion' => 'id_clasificacion']);
    }
}
