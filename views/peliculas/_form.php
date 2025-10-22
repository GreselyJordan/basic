<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper; // <-- Para los dropdowns
use app\models\Actores; // <-- Para los dropdowns
use app\models\Generos; // <-- Para los dropdowns

/** @var yii\web\View $this */
/** @var app\models\Peliculas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="peliculas-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?> 
    
    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sinipsis')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'anio_lanzamiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'duracion_min')->textInput() ?>

    <?php
        // Dropdown para Actores
        $actores = ArrayHelper::map(Actores::find()->all(), 'id_actores', 'nombre');
        echo $form->field($model, 'actores_id_actores')->dropDownList($actores, ['prompt' => 'Seleccione un Actor']);
    ?>

    <?php
        // Dropdown para Generos
        $generos = ArrayHelper::map(Generos::find()->all(), 'id_generos', 'nombre');
        echo $form->field($model, 'generos_id_generos')->dropDownList($generos, ['prompt' => 'Seleccione un Género']);
    ?>

    <?php 
    // --- CAMPO PARA SUBIR LA IMAGEN ---
    // Reemplaza el campo 'portada'
    echo $form->field($model, 'imagenFile')->fileInput();

    // Mostrar la imagen actual si estamos en 'update' y ya existe una
    if (!$model->isNewRecord && $model->portada) {
        echo '<div class="form-group">';
        echo Html::label(Yii::t('app', 'Portada Actual'));
        echo '<br />';
        echo Html::img(Yii::getAlias('@web/portadas/') . $model->portada, ['width' => '150px']);
        echo '</div>';
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>