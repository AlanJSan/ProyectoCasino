<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Clasificacion_PlatillosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Clasificacion Platillos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion--platillos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Clasificacion Platillos'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_clasifplatillo',
            'nombre_clasif',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Clasificacion_Platillos $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_clasifplatillo' => $model->id_clasifplatillo]);
                 }
            ],
        ],
    ]); ?>


</div>
