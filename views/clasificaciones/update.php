<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificaciones */

$this->title = Yii::t('app', 'Update Clasificaciones: {name}', [
    'name' => $model->nombre_clasif,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_clasif, 'url' => ['view', 'id_clasifplatillo' => $model->id_clasifplatillo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clasificaciones-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
