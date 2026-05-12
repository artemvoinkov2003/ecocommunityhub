<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\MaskedInput;

$this->title = 'Регистрация';

?>

<div class="auth-title">
    <h1>Регистрация</h1>
</div>

<div class="form-container">
    <?php $form = ActiveForm::begin(['action' => Url::to(['/site/register'])]) ?>
    <?= $form->field($model, 'username')->textInput(['class' => 'form-field']); ?>
    <?= $form->field($model, 'email')->textInput(['class' => 'form-field']); ?>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-field']); ?>
    <?= $form->field($model, 'first_name')->textInput(['class' => 'form-field']); ?>
    <?= $form->field($model, 'last_name')->textInput(['class' => 'form-field']); ?>
    <?= $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7 (999)-999-99-99'], ['class' => 'form-field']); ?>
    <?= Html::submitButton('Зарегистрироваться', ['class' => 'auth-btn']) ?>
    <?php ActiveForm::end() ?>
</div>


