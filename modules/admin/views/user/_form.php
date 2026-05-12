<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Role;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="user-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">Основная информация</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'username', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Введите логин'
                                ]
                            ])->textInput(['maxlength' => true]) ?>
                            
                            <?= $form->field($model, 'email', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'email@example.com'
                                ]
                            ])->textInput(['maxlength' => true]) ?>
                            
                            <?= $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7 (999)-999-99-99']) ?>
                        </div>
                        <div class="col-md-6">
                            <?= $form->field($model, 'first_name', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Иван'
                                ]
                            ])->textInput(['maxlength' => true]) ?>
                            
                            <?= $form->field($model, 'last_name', [
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => 'Иванов'
                                ]
                            ])->textInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <?= $form->field($model, 'password', [
                                'template' => "{label}\n{input}\n{hint}{error}",
                                'inputOptions' => [
                                    'class' => 'form-control',
                                    'placeholder' => $model->isNewRecord ? 'Введите пароль' : 'Оставьте пустым, чтобы не менять'
                                ]
                            ])->passwordInput(['maxlength' => true]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header">Настройки аккаунта</div>
                <div class="card-body">   
                    <?= $form->field($model, 'status')->dropDownList([
                        10 => 'Активен',
                        9 => 'Не подтвержден',
                        0 => 'Заблокирован'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group mt-4">
        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Сохранить'), [
            'class' => 'btn btn-success',
            'name' => 'save-button'
        ]) ?>
        
        <?= Html::a('<i class="fas fa-times"></i> ' . Yii::t('app', 'Отменить'), 
            Yii::$app->request->referrer ?: ['index'], 
            ['class' => 'btn btn-default']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
