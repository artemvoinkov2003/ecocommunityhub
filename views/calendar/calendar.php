<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\Json;

$this->title = 'Календарь экологических событий';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="calendar-page">
    <div class="calendar-header">
        <h1>Календарь экологических событий</h1>
        <p>Присоединяйтесь к мероприятиям и делайте мир лучше вместе с нами</p>
    </div>

    <?php if (!Yii::$app->user->isGuest): ?>
        <div class="add-event-form">
            <h2>Добавить новое мероприятие</h2>
            <form action="<?= Url::to(['calendar/create-event']) ?>" method="get">
                <button type="submit" class="btn-add-event">Добавить мероприятие</button>
            </form>
        </div>
    <?php endif; ?>

    <div class="calendar-container">
        <div class="calendar-filters">
            <div class="filter-category">
                <h2>Категории:</h2>
                <div class="category-list">
                    <?php foreach ($categories as $name => $color): ?>
                        <div class="category-item" style="--cat-color: <?= $color ?>">
                            <span class="color-dot"></span>
                            <?= $name ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            
            <div class="month-navigation">
                <button class="nav-btn prev">‹</button>
                <h2 class="current-month"><?= date('F Y') ?></h2>
                <button class="nav-btn next">›</button>
            </div>
        </div>

        <div class="calendar-grid">
            <div class="calendar-weekdays">
                <div>Пн</div>
                <div>Вт</div>
                <div>Ср</div>
                <div>Чт</div>
                <div>Пт</div>
                <div>Сб</div>
                <div>Вс</div>
            </div>
            
            <div class="calendar-days">
                <?php
                $firstDay = new DateTime('first day of this month');
                $lastDay = new DateTime('last day of this month');
                $daysInMonth = $lastDay->format('d');
                $firstDayIndex = $firstDay->format('N') - 1; 
                
                
                for ($i = 0; $i < $firstDayIndex; $i++) {
                    echo '<div class="calendar-day empty"></div>';
                }
                
                
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $date = date('Y-m-d', mktime(0, 0, 0, date('m'), $day, date('Y')));
                    $isToday = (date('Y-m-d') == $date) ? 'today' : '';
                    
                    echo '<div class="calendar-day ' . $isToday . '">';
                    echo '<div class="day-number">' . $day . '</div>';
                    
                    if (isset($eventsData[$date])) {
                        echo '<div class="events-container">';
                        foreach ($eventsData[$date] as $event) {
                            echo '<div class="event-dot" style="background-color: ' . $event['color'] . '" title="' . Html::encode($event['title']) . '"></div>';
                        }
                        echo '</div>';
                    }
                    
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>

    <div class="upcoming-events">
        <h2>Ближайшие мероприятия</h2>
        <?php if (empty($events)): ?>
            <p class="no-events">На данный момент запланированных мероприятий нет</p>
        <?php else: ?>
            <div class="events-list">
                <?php foreach ($events as $event): ?>
                    <div class="event-card" style="border-left: 0.8vh solid <?= $event->color ?>">
                        <div class="event-date">
                            <?= Yii::$app->formatter->asDate($event->start_date, 'php:d M') ?>
                        </div>
                        <div class="event-content">
                            <h3><?= Html::encode($event->title) ?></h3>
                            <div class="event-meta">
                                <span class="event-location">📍 <?= Html::encode($event->location) ?></span>
                                <span class="event-time">🕒 <?= date('H:i', strtotime($event->start_date)) ?></span>
                            </div>
                            <p><?= Html::encode(mb_substr($event->description, 0, 100)) ?>...</p>
                            
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <form action="<?= Url::to(['calendar/register-for-event']) ?>" method="post">
                                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                                    <input type="hidden" name="eventId" value="<?= $event->id ?>">
                                    
                                    <?php if ($event->isUserRegistered(Yii::$app->user->id)): ?>
                                        <button type="button" class="btn-registered" disabled>Вы записаны</button>
                                    <?php else: ?>
                                        <button type="submit" class="btn-register">Записаться на событие</button>
                                    <?php endif; ?>
                                </form>
                            <?php else: ?>
                                <div class="registration-info">
                                    <a href="<?= Url::to(['site/login']) ?>">Войдите</a> или 
                                    <a href="<?= Url::to(['site/register']) ?>">зарегистрируйтесь</a> для записи
                                </div>
                            <?php endif; ?>
                            
                            <a href="<?= Url::to(['calendar/view-event', 'id' => $event->id]) ?>" class="event-details">Подробнее</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>