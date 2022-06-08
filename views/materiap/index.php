<?php

use app\models\Materiap;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MateriapSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Ingredientes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materiap-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create').$this->title, ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_mp',
            'nombre_mp',
            'id_uni_medida',
            [
                "attribute" => "id_clasificacion",
                "value" => "clasificacion.nombre_clasificacion",
            ],
            'descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Materiap $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_mp' => $model->id_mp]);
                 }
            ],
        ],
    ]); ?>


</div>
