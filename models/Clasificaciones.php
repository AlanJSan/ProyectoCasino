<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clasificaciones".
 *
 * @property string $id_clasifplatillo Clave primaria de la clasificación de platillos
 * @property string $nombre_clasif Nombre de la clasificación a la que pertenecen los platillos
 *
 * @property Platillos[] $platillos
 */
class Clasificaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clasificaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_clasifplatillo', 'nombre_clasif'], 'required'],
            [['id_clasifplatillo'], 'string', 'max' => 5],
            [['nombre_clasif'], 'string', 'max' => 50],
            [['id_clasifplatillo'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_clasifplatillo' => Yii::t('app', 'Clave Clasificación'),
            'nombre_clasif' => Yii::t('app', 'Nombre de la Clasificación'),
        ];
    }

    /**
     * Gets query for [[Platillos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatillos()
    {
        return $this->hasMany(Platillos::className(), ['id_clasifplatillo' => 'id_clasifplatillo']);
    }
}
