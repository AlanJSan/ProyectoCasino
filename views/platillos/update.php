<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Platillos */

$this->title = Yii::t('app', 'Update Platillos: {name}', [
    'name' => $model->nombre_platillo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Platillos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_platillo, 'url' => ['view', 'id_platillo' => $model->id_platillo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="platillos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
