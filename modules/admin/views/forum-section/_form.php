<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/** @var yii\web\View $this */
/** @var app\models\ForumSection $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="forum-section-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput([
                'maxlength' => true,
                'placeholder' => 'Введите название раздела'
            ]) ?>
            
            <?= $form->field($model, 'description')->textarea([
                'rows' => 6,
                'placeholder' => 'Введите описание раздела'
            ]) ?>
        </div>
    </div>

    <div class="form-group mt-4">
        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Сохранить'), [
            'class' => 'btn btn-success',
            'name' => 'save-button'
        ]) ?>
    </div>


    <?php ActiveForm::end(); ?>
</div>
