<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Recetas;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RecetasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recetas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recetas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recetas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_receta',
            //'id_mp',
            [
                "attribute" => "id_platillo",
                "value" => "platillo.nombre_platillo",
                "label" => "Platillo"
            ],
            [
                "attribute" => "id_mp",
                "value" => "materiap",
            ],
            //'id_platillo',
            'cantidad_ingrdte',
            'costo_total_ingrdte',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Recetas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_receta' => $model->id_receta]);
                 }
            ],
        ],
    ]);?>


</div>
