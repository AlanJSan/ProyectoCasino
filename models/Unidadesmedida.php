<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadesmedida".
 *
 * @property string $id_uni_medida Clave primaria de la unidad de medida
 * @property string $nombre_uni_medida Nombre de la unidad de medida
 * @property string $abreviatura Abreviatura o símbolo de uso internacional que representa la unidad de medida
 * @property string $descripcion Descripción que incluye detalles de la unidad de medida
 *
 * @property Materiap[] $materiaps
 */
class Unidadesmedida extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidadesmedida';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_uni_medida', 'nombre_uni_medida', 'abreviatura', 'descripcion'], 'required'],
            [['id_uni_medida'], 'string', 'max' => 4],
            [['nombre_uni_medida'], 'string', 'max' => 10],
            [['abreviatura'], 'string', 'max' => 20],
            [['descripcion'], 'string', 'max' => 50],
            [['id_uni_medida'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_uni_medida' => Yii::t('app', 'Id Uni Medida'),
            'nombre_uni_medida' => Yii::t('app', 'Nombre Uni Medida'),
            'abreviatura' => Yii::t('app', 'Abreviatura'),
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
        return $this->hasMany(Materiap::className(), ['id_uni_medida' => 'id_uni_medida']);
    }
}
