<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadesmedida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidadesmedida-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_uni_medida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_uni_medida')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'abreviatura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
