<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecetasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recetas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_receta') ?>

    <?= $form->field($model, 'id_mp') ?>

    <?= $form->field($model, 'id_platillo') ?>

    <?= $form->field($model, 'cantidad_ingrdte') ?>

    <?= $form->field($model, 'id_unid_med_ing') ?>

    <?php // echo $form->field($model, 'costo_total_ingrdte') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
