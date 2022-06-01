<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clasificacion_Platillos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clasificacion--platillos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_clasifplatillo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_clasif')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
