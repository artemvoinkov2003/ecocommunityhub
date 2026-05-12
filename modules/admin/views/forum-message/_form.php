<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ForumTopic;
use app\models\User;

/** @var yii\web\View $this */
/** @var app\models\ForumMessage $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="forum-message-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'content')->textarea([
                'rows' => 10,
                'placeholder' => 'Введите текст сообщения',
                'class' => 'form-control editor'
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'topic_id')->dropDownList(
                ArrayHelper::map(ForumTopic::find()->all(), 'id', 'title'),
                ['prompt' => 'Выберите тему']
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
        
        <?= Html::a('<i class="fas fa-times"></i> ' . Yii::t('app', 'Отмена'), 
            Yii::$app->request->referrer ?: ['index'], 
            ['class' => 'btn btn-default']
        ) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
