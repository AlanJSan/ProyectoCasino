<?php

use app\models\Clasificacionmateriaprima;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Materiap */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="materiap-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_mp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_mp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_uni_medida')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, "id_clasificacion")->dropDownList(
        ArrayHelper::map(Clasificacionmateriaprima::find()->all(),"id_clasificacion","nombre_clasificacion"),["prompt" => "Selecciona una opción..."]
    ) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
