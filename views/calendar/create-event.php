<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Добавить новое мероприятие';
$this->params['breadcrumbs'][] = ['label' => 'Календарь событий', 'url' => ['site/calendar']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="create-event-form">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-row">
        <?= $form->field($model, 'start_date')->textInput(['placeholder' => 'дд.мм.гггг чч:мм']) ?>
        <?= $form->field($model, 'end_date')->textInput(['placeholder' => 'дд.мм.гггг чч:мм']) ?>
    </div>

    <div class="form-row">
        <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'category')->dropDownList([
            'Волонтерство' => 'Волонтерство',
            'Образование' => 'Образование',
            'Акция' => 'Акция',
            'Фестиваль' => 'Фестиваль',
            'Выставка' => 'Выставка',
        ]) ?>
    </div>

    <div class="form-row">
        <?= $form->field($model, 'color')->textInput([
            'maxlength' => true,
            'placeholder' => '#RRGGBB',
            'value' => '#115ccc' 
        ]) ?>
    </div>

    <div class="form-row">
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Добавить мероприятие', ['class' => 'btn-submit']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>