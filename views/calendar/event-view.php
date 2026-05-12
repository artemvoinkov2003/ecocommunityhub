<?php
use yii\helpers\Html;
use yii\helpers\Url; 

$this->title = $event->title;
$this->params['breadcrumbs'][] = ['label' => 'Календарь', 'url' => ['site/calendar']];
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="event-view">
    <div class="event-header" style="border-left: 1vh solid <?= $event->color ?>">
        <h1><?= Html::encode($event->title) ?></h1>
        
        <div class="event-meta">
            <div class="event-date">
                <span>📅</span>
                <?= Yii::$app->formatter->asDate($event->start_date, 'php:d F Y') ?>
                <?php if ($event->start_date != $event->end_date): ?>
                    - <?= Yii::$app->formatter->asDate($event->end_date, 'php:d F Y') ?>
                <?php endif; ?>
            </div>
            
            <div class="event-time">
                <span>🕒</span>
                <?= date('H:i', strtotime($event->start_date)) ?> 
                - <?= date('H:i', strtotime($event->end_date)) ?>
            </div>
            
            <div class="event-location">
                <span>📍</span>
                <?= Html::encode($event->location) ?>
            </div>
        </div>
    </div>
    
    <div class="event-description">
        <h2>Описание мероприятия</h2>
        <p><?= nl2br(Html::encode($event->description)) ?></p>
    </div>
    
<div class="event-actions">
        <a href="<?= Url::to(['calendar/calendar']) ?>" class="back-button">
            ← Вернуться к календарю
        </a>
    </div>
</div>