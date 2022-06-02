<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "unidadesmeding".
 *
 * @property string $id_unid_med_ing Clave primaria de las unidades de medida para los ingredientes de los platillos
 * @property string $nombre_unid_med_ing Nombre de las unidades de medida para los ingredientes de los platillos
 *
 * @property Recetas[] $recetas
 */
class Unidadesmeding extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'unidadesmeding';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_unid_med_ing', 'nombre_unid_med_ing'], 'required'],
            [['id_unid_med_ing'], 'string', 'max' => 5],
            [['nombre_unid_med_ing'], 'string', 'max' => 15],
            [['id_unid_med_ing'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_unid_med_ing' => Yii::t('app', 'Id Unid Med Ing'),
            'nombre_unid_med_ing' => Yii::t('app', 'Nombre Unid Med Ing'),
        ];
    }

    /**
     * Gets query for [[Recetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Recetas::className(), ['id_unid_med_ing' => 'id_unid_med_ing']);
    }
}
