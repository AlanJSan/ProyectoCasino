<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiap */

$this->title = Yii::t('app', 'Actualizar Ingrediente: {name}', [
    'name' => $model->nombre_mp,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materiaps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_mp, 'url' => ['view', 'id_mp' => $model->id_mp]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="materiap-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
