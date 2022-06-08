<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "platillos".
 *
 * @property string $id_platillo Clave primaria del platillo
 * @property string $nombre_platillo Nombre del platillo
 * @property string|null $descripcion Descripción que incluye detalles del platillo como por ejemplo acompañamientos y/o presentación
 * @property float|null $costo_produccion Es el costo calculado de la suma de las cantidades de los ingredientes requeridos en el platillo y sus costos unitarios
 * @property float $precio_venta Precio de venta del platillo al público
 * @property string $id_clasifplatillo Clave foránea de la clasificación a la que pertenece el platillo
 * @property resource $fotografia Path para la fotografia
 *
 * @property Clasificaciones $clasifplatillo
 * @property Recetas[] $recetas
 */
class Platillos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'platillos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_platillo', 'nombre_platillo', 'precio_venta', 'id_clasifplatillo', 'fotografia'], 'required'],
            [['costo_produccion', 'precio_venta'], 'number'],
            [['fotografia'], 'string'],
            [['id_platillo'], 'string', 'max' => 8],
            [['nombre_platillo'], 'string', 'max' => 60],
            [['descripcion'], 'string', 'max' => 200],
            [['id_clasifplatillo'], 'string', 'max' => 5],
            [['id_platillo'], 'unique'],
            [['id_clasifplatillo'], 'exist', 'skipOnError' => true, 'targetClass' => Clasificaciones::className(), 'targetAttribute' => ['id_clasifplatillo' => 'id_clasifplatillo']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_platillo' => Yii::t('app', 'Id Platillo'),
            'nombre_platillo' => Yii::t('app', 'Nombre Platillo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'costo_produccion' => Yii::t('app', 'Costo Produccion'),
            'precio_venta' => Yii::t('app', 'Precio Venta'),
            'id_clasifplatillo' => Yii::t('app', 'Id Clasifplatillo'),
            'fotografia' => Yii::t('app', 'Fotografia'),
        ];
    }

    /**
     * Gets query for [[Clasifplatillo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClasifplatillo()
    {
        return $this->hasOne(Clasificaciones::className(), ['id_clasifplatillo' => 'id_clasifplatillo']);
    }

    public function getClasificacion(){
        $modelo = Clasificaciones::find()->where(["id_clasifplatillo" => $this->id_clasifplatillo])->one();
        return $modelo->nombre_clasif;
    }

    /**
     * Gets query for [[Recetas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecetas()
    {
        return $this->hasMany(Recetas::className(), ['id_platillo' => 'id_platillo']);
    }

    public function getIngredientes(){
        $ingredientes = Recetas::find()->where(["id_platillo" => $this->id_platillo])->all();
        $lista = [];

        foreach ($ingredientes as $ingrediente) {
            $lista[] = $ingrediente -> id_mp;
        }
        
        //return $ingredientes[0];
        return $lista[0];
    }
}
