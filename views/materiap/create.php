<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materiap */

$this->title = Yii::t('app', 'Create Materiap');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Materiaps'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materiap-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
