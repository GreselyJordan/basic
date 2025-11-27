<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Iniciar Sesión';
?>

<div class="login-page">
    <div class="login-container">
        <div class="login-card">
            <!-- Logo/Brand -->
            <div class="login-header">
                <h1 class="login-brand">GreselyApp</h1>
                <p class="login-subtitle">Bienvenido de vuelta</p>
            </div>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'login-form'],
                'fieldConfig' => [
                    'template' => "{label}\n{input}\n{error}",
                    'labelOptions' => ['class' => 'login-label'],
                    'inputOptions' => ['class' => 'login-input'],
                    'errorOptions' => ['class' => 'login-error'],
                ],
            ]); ?>

            <div class="form-group-custom">
                <?= $form->field($model, 'username')->textInput([
                    'autofocus' => true,
                    'placeholder' => 'Ingresa tu usuario',
                    'class' => 'login-input'
                ])->label('Usuario') ?>
            </div>

            <div class="form-group-custom">
                <?= $form->field($model, 'password')->passwordInput([
                    'placeholder' => 'Ingresa tu contraseña',
                    'class' => 'login-input'
                ])->label('Contraseña') ?>
            </div>

            <div class="form-group-custom">
                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class='login-checkbox'>{input} {label}</div>\n{error}",
                    'labelOptions' => ['class' => 'login-checkbox-label'],
                ])->label('Recordarme') ?>
            </div>

            <div class="form-group-custom">
                <?= Html::submitButton('Iniciar Sesión', [
                    'class' => 'login-button',
                    'name' => 'login-button'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <!-- Login Help Text -->
            <div class="login-help">
                <p class="login-help-text">
                    Puedes iniciar sesión con <strong>admin/admin</strong> o <strong>demo/demo</strong>
                </p>
            </div>
        </div>

        <!-- Background Decoration -->
        <div class="login-decoration">
            <div class="decoration-circle decoration-circle-1"></div>
            <div class="decoration-circle decoration-circle-2"></div>
            <div class="decoration-circle decoration-circle-3"></div>
        </div>
    </div>
</div>
