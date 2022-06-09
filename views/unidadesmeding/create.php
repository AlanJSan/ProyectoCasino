<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadesmeding */

$this->title = Yii::t('app', 'Create Unidadesmeding');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidadesmedings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadesmeding-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
