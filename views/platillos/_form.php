<?php

use app\models\Clasificaciones;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Platillos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="platillos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_platillo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre_platillo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'costo_produccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio_venta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, "id_clasifplatillo")->dropDownList(
        ArrayHelper::map(Clasificaciones::find()->all(),"id_clasifplatillo","nombre_clasif"),["prompt" => "Selecciona una opción..."]
    ) ?>

    <?= $form->field($model, 'fotografia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
