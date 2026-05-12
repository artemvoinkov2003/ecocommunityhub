<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = $section->title;

?>

<div class="forum-container">
  <h1 class="forum-header"><?= Html::encode($section->title) ?></h1>

  <a href="<?= Url::to(['/forum']) ?>" class="back-to-section-btn">
      <i class="fas fa-arrow-left"></i> Вернуться на форум
    </a>
  
  <?php if (!Yii::$app->user->isGuest): ?>
    <a href="<?= Url::to(['create-topic', 'section_id' => $section->id]) ?>" class="create-btn">
      + Создать тему
    </a>
  <?php endif; ?>
  
  <ul class="topic-list">
    <?php foreach ($topics as $topic): ?>
      <li class="topic-item">
        <a href="<?= Url::to(['forum-topic', 'id' => $topic->id]) ?>" class="topic-title">
          <?= Html::encode($topic->title) ?>
        </a>
        
        <div class="topic-stats">
          Автор: <?= Html::encode($topic->author->username) ?> | 
          Сообщений: <?= $topic->getMessagesCount() ?>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</div>