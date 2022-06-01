<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "recetas".
 *
 * @property int $id_receta
 * @property string $id_mp Clave foránea de la materia prima a la que corresponde el ingrediente del platillo
 * @property string $id_platillo Clave foránea del platillo al que se le asigna el ingrediente
 * @property float $cantidad_ingrdte Cantidad requerida del ingrediente para ese platillo
 * @property float $costo_total_ingrdte Costo total de la cantidad del ingrediente
 *
 * @property Inventario $mp
 * @property Platillos $platillo
 */
class Recetas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'recetas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_mp', 'id_platillo', 'cantidad_ingrdte', 'costo_total_ingrdte'], 'required'],
            [['cantidad_ingrdte', 'costo_total_ingrdte'], 'number'],
            [['id_mp'], 'string', 'max' => 5],
            [['id_platillo'], 'string', 'max' => 8],
            [['id_platillo'], 'exist', 'skipOnError' => true, 'targetClass' => Platillos::className(), 'targetAttribute' => ['id_platillo' => 'id_platillo']],
            [['id_mp'], 'exist', 'skipOnError' => true, 'targetClass' => Inventario::className(), 'targetAttribute' => ['id_mp' => 'id_mp']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_receta' => Yii::t('app', 'Id Receta'),
            'id_mp' => Yii::t('app', 'Materia Prima'),
            'id_platillo' => Yii::t('app', 'Id Platillo'),
            'cantidad_ingrdte' => Yii::t('app', 'Cantidad Ingrdte'),
            'costo_total_ingrdte' => Yii::t('app', 'Costo Total Ingrdte'),
            //'materia' => Yii::t('app', 'Materia Prima'),
        ];
    }

    /**
     * Gets query for [[Mp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMp()
    {
        return $this->hasOne(Inventario::className(), ['id_mp' => 'id_mp']);
    }

    public function getMateriap(){
        $modelo = Materiap::find()->where(["id_mp" => $this->id_mp])->one();
        return $modelo->nombre_mp;
    }

    /**
     * Gets query for [[Platillo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPlatillo()
    {
        return $this->hasOne(Platillos::className(), ['id_platillo' => 'id_platillo']);
    }

}
