<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Запись подтверждена';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="registration-confirmation">
    <div class="confirmation-header">
        <h1>Вы успешно записались на мероприятие!</h1>
        <div class="checkmark">✓</div>
    </div>

    <div class="event-details">
        <h2><?= Html::encode($event->title) ?></h2>
        
        <div class="detail-row">
            <span class="label">📅 Дата и время:</span>
            <span class="value"><?= $event->start_date ?></span>
        </div>
        
        <div class="detail-row">
            <span class="label">📍 Место проведения:</span>
            <span class="value"><?= Html::encode($event->location) ?></span>
        </div>
        
        <div class="detail-row">
            <span class="label">🏷️ Категория:</span>
            <span class="value"><?= Html::encode($event->category) ?></span>
        </div>
        
        <div class="detail-row">
            <span class="label">📝 Описание:</span>
            <p class="value"><?= Html::encode($event->description) ?></p>
        </div>
    </div>

    <div class="actions">
        <a href="<?= Url::to(['calendar/calendar']) ?>" class="btn-back">Вернуться в календарь</a>
    </div>
</div>