<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadesmeding */

$this->title = $model->nombre_unid_med_ing;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidadesmedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="unidadesmeding-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_unid_med_ing' => $model->id_unid_med_ing], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_unid_med_ing' => $model->id_unid_med_ing], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_unid_med_ing',
            'nombre_unid_med_ing',
        ],
    ]) ?>

</div>
