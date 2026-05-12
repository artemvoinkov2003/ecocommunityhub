<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Форум';

?>

<div class="forum-container">
  <div class="forum-header">Форум сообщества</div>
  
  
  <ul class="section-list">
    <?php foreach ($sections as $section): ?>
      <li class="section-item">
        <a href="<?= Url::to(['forum-section', 'id' => $section->id]) ?>" class="section-title">
          <?= Html::encode($section->title) ?>
        </a>
        
        <div class="section-stats">
          <span>Тем: <?= $section->getTopicsCount() ?></span>
        </div>
        
        <?php if ($section->lastTopic): ?>
          <div class="last-post">
            Последнее: 
            <a href="<?= Url::to(['forum-topic', 'id' => $section->lastTopic->id]) ?>">
              <?= Html::encode($section->lastTopic->title) ?>
            </a>
            от <?= Html::encode($section->lastTopic->author->username) ?>
          </div>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</div>