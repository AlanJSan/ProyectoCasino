<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\Clasificaciones;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClasificacionesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clasificaciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificaciones-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Clasificaciones'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_clasifplatillo',
            [
                "attribute" => "nombre_clasif",
                "label" => "Nombre de la clasificación"
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clasificaciones $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_clasifplatillo' => $model->id_clasifplatillo]);
                 }
            ],
        ],
    ]); ?>


</div>
