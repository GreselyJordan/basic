<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="peliculas-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data'],
    ]); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'imagenFile')->fileInput()->label('Seleccionar Portada') ?>

    <?= $form->field($model, 'anio_lanzamiento')->textInput() ?>

    <?= $form->field($model, 'duracion_min')->textInput() ?>

    <?= $form->field($model, 'actores_id_actores')->textInput() ?>

    <?= $form->field($model, 'generos_id_generos')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>