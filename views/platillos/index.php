<?php

use app\models\Platillos;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlatillosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Platillos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="platillos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create').$this->title, ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    //echo $ingredientes;
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id_platillo',
            'nombre_platillo',
            'descripcion',
            'costo_produccion',
            'precio_venta',
            //'id_clasifplatillo',
            [
                "attribute" => "id_clasifplatillo",
                "value" => "clasificacion",
                "label" => "Clasificación"
            ],
            'fotografia',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Platillos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_platillo' => $model->id_platillo]);
                 }
            ],
        ],
    ]); ?>


</div>
