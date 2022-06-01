<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion_Platillos */

$this->title = Yii::t('app', 'Update Clasificacion Platillos: {name}', [
    'name' => $model->id_clasifplatillo,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacion Platillos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_clasifplatillo, 'url' => ['view', 'id_clasifplatillo' => $model->id_clasifplatillo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="clasificacion--platillos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
