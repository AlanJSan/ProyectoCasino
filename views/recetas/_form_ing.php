<?php

use app\models\Materiap;
use app\models\Platillos;
use app\models\Unidadesmeding;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Recetas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recetas-form">
    hola
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, "id_mp")->dropDownList(
        ArrayHelper::map(Materiap::find()->all(),"id_mp","nombre_mp"),["prompt" => "Selecciona una opción..."]
    ) ?>

    <?= $form->field($model, 'id_platillo')->hiddenInput(['value' => $id_platillo])->label(false) ?>

    <?= $form->field($model, 'cantidad_ingrdte')->textInput() ?>


    <?= $form->field($model, "id_unid_med_ing")->dropDownList(
        ArrayHelper::map(Unidadesmeding::find()->all(),"id_unid_med_ing","nombre_unid_med_ing"),["prompt" => "Selecciona una opción..."]
    ) ?>

    <?= $form->field($model, 'costo_total_ingrdte')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        <!-- <= Html::a(Yii::t('app', 'Añadir Ingredientes'), ['/recetas/create_ing', 'id_platillo' => $model->id_platillo], ['class' => 'btn btn-success']) ?> -->
    </div>

    <?php ActiveForm::end(); ?>

</div>
