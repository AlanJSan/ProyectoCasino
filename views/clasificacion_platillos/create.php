<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion_Platillos */

$this->title = Yii::t('app', 'Create Clasificacion Platillos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificacion Platillos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificacion--platillos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
