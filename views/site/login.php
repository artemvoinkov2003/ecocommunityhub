<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
?>
<div class="auth-title">
    <h1>Авторизация</h1>
</div>



<div class="form-container">
    <?php $form = ActiveForm::begin(['action' => Url::to(['/site/login'])]) ?>
    <?= $form->field($model, 'username')->textInput(['class' => 'form-field']) ?>
    <?= $form->field($model, 'password')->passwordInput(['class' => 'form-field']) ?>
    <?= Html::submitButton('Войти', ['class' => 'auth-btn']) ?>
    <?php ActiveForm::end() ?>
</div>