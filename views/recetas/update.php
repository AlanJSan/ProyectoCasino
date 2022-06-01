<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */

$this->title = Yii::t('app', 'Update Recetas: {name}', [
    'name' => $model->id_receta,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recetas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_receta, 'url' => ['view', 'id_receta' => $model->id_receta]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="recetas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
