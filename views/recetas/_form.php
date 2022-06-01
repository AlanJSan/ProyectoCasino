<?php

use app\models\Materiap;
use app\models\MateriaPrima;
use app\models\Platillos;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recetas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, "id_platillo")->dropDownList(
        ArrayHelper::map(Platillos::find()->all(),"id_platillo","nombre_platillo"),["prompt" => "Selecciona una opción..."]
    ) ?>

    <!--  $form->field($model, 'id_mp')->textInput(['maxlength' => true])  -->

    <?= $form->field($model, "id_mp")->dropDownList(
        ArrayHelper::map(Materiap::find()->all(),"id_mp","nombre_mp"),["prompt" => "Selecciona una opción..."]
    ) ?>

    <!--$form->field($model, 'id_platillo')->textInput(['maxlength' => true]) ?> -->

    <?= $form->field($model, 'cantidad_ingrdte')->textInput() ?>

    <?= $form->field($model, 'costo_total_ingrdte')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
