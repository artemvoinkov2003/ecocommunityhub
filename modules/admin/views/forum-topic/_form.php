<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ForumSection;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\ForumTopic $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="forum-topic-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput([
                'maxlength' => true,
                'placeholder' => 'Введите заголовок темы'
            ]) ?>
            
            <?= $form->field($model, 'content')->textarea([
                'rows' => 10,
                'placeholder' => 'Введите содержимое темы',
                'class' => 'form-control editor'
            ]) ?>
        </div>
        
        <div class="col-md-4">
            <?= $form->field($model, 'section_id')->dropDownList(
                ArrayHelper::map(ForumSection::find()->all(), 'id', 'title'),
                ['prompt' => 'Выберите раздел']
            ) ?>
            
            <?= $form->field($model, 'author_id')->dropDownList(
                ArrayHelper::map(User::find()->all(), 'id', 'username'),
                ['prompt' => 'Выберите автора']
            ) ?>
        </div>
    </div>

    <div class="form-group mt-4">
        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Создать'), [
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
