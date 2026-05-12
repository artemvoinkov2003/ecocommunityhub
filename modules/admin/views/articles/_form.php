<?php

use yii;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\ArticleCategory;
use app\models\User;

/** @var app\models\Articles $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="articles-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <div class="row">
        <div class="col-md-8">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
            
            <?= $form->field($model, 'content')->textarea(['rows' => 10]) ?>
            
            <?= $form->field($model, 'category_id')->dropDownList(
                ArrayHelper::map(ArticleCategory::find()->all(), 'id', 'name'),
                ['prompt' => 'Выберите категорию']
            ) ?>
            
            <?= $form->field($model, 'status')->dropDownList(
                [1 => 'Опубликовано', 0 => 'Черновик'],
                ['prompt' => 'Выберите статус']
            ) ?>
        </div>
        
        <div class="col-md-4">
            <?= $form->field($model, 'author_id')->dropDownList(
                ArrayHelper::map(User::find()->all(), 'id', 'username'),
                ['prompt' => 'Выберите автора']
            ) ?>
            
            <?= $form->field($model, 'image')->fileInput() ?>
        </div>
    </div>

    <div class="form-group mt-4">
        <?= Html::submitButton('<i class="fas fa-save"></i> ' . Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
