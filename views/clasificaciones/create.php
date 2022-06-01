<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificaciones */

$this->title = Yii::t('app', 'Create Clasificaciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Clasificaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clasificaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
