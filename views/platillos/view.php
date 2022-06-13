<?php

use app\models\Platillos;
use app\models\Recetas;
//use Illuminate\Support\Facades\URL;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Platillos */

$this->title = $model->nombre_platillo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Platillos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="platillos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_platillo' => $model->id_platillo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_platillo' => $model->id_platillo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('app', 'Añadir Ingredientes'), ['/recetas/create_ing', 'id_platillo' => $model->id_platillo], ['class' => 'btn btn-success']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_platillo',
            'nombre_platillo',
            'descripcion',
            'costo_produccion',
            'precio_venta',
            'clasificacion',
            'fotografia',
        ],
    ]) ?>

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        "showFooter" => true,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            "id_platillo",
            [
                "value" => 'materiap',
                "label" => "Ingredientes"
            ],
            'cantidad_ingrdte',
            'id_unid_med_ing',
            [
                "label" => "Costo del ingrediente",
                "attribute" => "costo_total_ingrdte",
                "value" => "costo_total_ingrdte",
                "footerOptions" => ["style" => "color:green"],
                "footer" => Recetas::getTotal($dataProvider->models, "costo_total_ingrdte"),
            ],
            
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recetas $model_receta, $key, $index, $column) {
                    return URL::toRoute(['recetas/'.$action, 'id_receta' => $model_receta->id_receta]);
                 }
            ],
        ],
    ]); ?>

</div>
