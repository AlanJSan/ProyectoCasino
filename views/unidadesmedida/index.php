<?php

use app\models\Unidadesmedida;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UnidadesmedidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Unidadesmedidas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadesmedida-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Unidadesmedida'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_uni_medida',
            'nombre_uni_medida',
            'abreviatura',
            'descripcion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Unidadesmedida $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_uni_medida' => $model->id_uni_medida]);
                 }
            ],
        ],
    ]); ?>


</div>
