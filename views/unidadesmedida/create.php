<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadesmedida */

$this->title = Yii::t('app', 'Create Unidadesmedida');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Unidadesmedidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unidadesmedida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
