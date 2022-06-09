<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadesmeding */

$this->title = Yii::t('app', 'Update Unidadesmeding: {name}', [
    'name' => $model->id_unid_med_ing,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidadesmedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_unid_med_ing, 'url' => ['view', 'id_unid_med_ing' => $model->id_unid_med_ing]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="unidadesmeding-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
