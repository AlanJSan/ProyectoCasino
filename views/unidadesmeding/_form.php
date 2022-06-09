<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Unidadesmeding */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="unidadesmeding-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_unid_med_ing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_unid_med_ing')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
