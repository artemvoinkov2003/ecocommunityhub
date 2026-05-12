<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Создать тему';

?>

<div class="forum-container">
  <h1 class="forum-header">Новая тема в разделе "<?= Html::encode($section->title) ?>"</h1>
  
  <div class="form-container">
    <?php $form = ActiveForm::begin(); ?>
      <?= $form->field($model, 'title')->textInput([
        'class' => 'form-input',
        'placeholder' => 'Название темы'
      ]) ?>
      
      
      <?= $form->field($model, 'text')->textarea([
        'class' => 'form-input form-textarea',
        'placeholder' => 'Текст первого сообщения'
      ]) ?>
      
      <button type="submit" class="submit-btn">Создать тему</button>
    <?php ActiveForm::end(); ?>
  </div>
</div>