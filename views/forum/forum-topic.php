<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $topic->title;

?>

<div class="forum-container">
  <h1 class="forum-header"><?= Html::encode($topic->title) ?></h1>

   <a href="<?= Url::to(['forum/forum-section', 'id' => $topic->section_id]) ?>" class="back-to-section-btn">
      <i class="fas fa-arrow-left"></i> Вернуться в раздел
    </a>
  
  <div class="message-list">
    <?php foreach ($messages as $message): ?>
      <div class="message-item">
        <div class="message-header">
          <div class="message-author"><?= Html::encode($message->author->username) ?></div>
          <div class="message-date"><?= Yii::$app->formatter->asDatetime($message->created_at) ?></div>
        </div>
        <div class="message-text"><?= nl2br(Html::encode($message->content)) ?></div>
      </div>
    <?php endforeach; ?>
  </div>
  
  <?php if (!Yii::$app->user->isGuest): ?>
    <div class="form-container">
      <h2 class="form-title">Добавить сообщение</h2>
      
      <?php if (Yii::$app->session->hasFlash('error')): ?>
        <div class="alert alert-error">
          <?= Yii::$app->session->getFlash('error') ?>
        </div>
      <?php endif; ?>
      
      <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
          <?= Yii::$app->session->getFlash('success') ?>
        </div>
      <?php endif; ?>
      
      <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($newMessage, 'content')->textarea([
          'class' => 'form-input form-textarea',
          'placeholder' => 'Текст сообщения',
          'required' => true 
        ])->label(false) ?>
        
        <button type="submit" class="submit-btn">Отправить</button>
      <?php ActiveForm::end(); ?>
    </div>
  <?php else: ?>
    <div class="alert">
      <a href="<?= Url::to(['login']) ?>">Войдите</a> или 
      <a href="<?= Url::to(['register']) ?>">зарегистрируйтесь</a> чтобы оставлять сообщения
    </div>
  <?php endif; ?>
</div>