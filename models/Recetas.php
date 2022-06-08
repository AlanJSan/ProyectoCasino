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
 * @property string $id_unid_med_ing Clave foránea de la unidad de medida de los ingredientes de un platillo
 * @property float $costo_total_ingrdte Costo total de la cantidad del ingrediente
 *
 * @property Materiap $mp
 * @property Platillos $platillo
 * @property Unidadesmeding $unidMedIng
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
            [['id_mp', 'id_platillo', 'cantidad_ingrdte', 'id_unid_med_ing', 'costo_total_ingrdte'], 'required'],
            [['cantidad_ingrdte', 'costo_total_ingrdte'], 'number'],
            [['id_mp', 'id_unid_med_ing'], 'string', 'max' => 5],
            [['id_platillo'], 'string', 'max' => 8],
            [['id_platillo'], 'exist', 'skipOnError' => true, 'targetClass' => Platillos::className(), 'targetAttribute' => ['id_platillo' => 'id_platillo']],
            [['id_unid_med_ing'], 'exist', 'skipOnError' => true, 'targetClass' => Unidadesmeding::className(), 'targetAttribute' => ['id_unid_med_ing' => 'id_unid_med_ing']],
            [['id_mp'], 'exist', 'skipOnError' => true, 'targetClass' => Materiap::className(), 'targetAttribute' => ['id_mp' => 'id_mp']],
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
            'cantidad_ingrdte' => Yii::t('app', 'Cantidad Ingrediente'),
            'id_unid_med_ing' => Yii::t('app', 'Unidad de Medida'),
            'costo_total_ingrdte' => Yii::t('app', 'Costo Total del Ingrediente'),
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

    /**
     * Gets query for [[UnidMedIng]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUnidMedIng()
    {
        return $this->hasOne(Unidadesmeding::className(), ['id_unid_med_ing' => 'id_unid_med_ing']);
    }

    public static function getTotal($provider, $fieldName){
        $total = 0;

        foreach($provider as $item){
            $total += $item[$fieldName];
        }

        $total = number_format($total,2);

        return $total;
    }
}
