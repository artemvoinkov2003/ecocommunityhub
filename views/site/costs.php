<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Экономия ресурсов';
?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="page-content">
    <div class="page-section">
        <h2 class="section-title">Экономия ресурсов - спасение планеты</h2>
        <div class="section-content">
            <p>Рациональное использование ресурсов не только помогает окружающей среде, но и экономит ваши деньги. Каждый разумный выбор уменьшает ваш экологический след.</p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">30%</div>
                    <div class="stat-label">Пищи выбрасывается в мире</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">90%</div>
                    <div class="stat-label">Воды можно сэкономить с умными технологиями</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">40%</div>
                    <div class="stat-label">Энергии теряется в домах без утепления</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-section">
        <h2 class="section-title">Практические советы по экономии</h2>
        <div class="section-content">
            <div class="info-card">
                <h3>Вода:</h3>
                <ul>
                    <li>Устанавливайте аэраторы на краны</li>
                    <li>Принимайте душ вместо ванны</li>
                    <li>Собирайте дождевую воду для полива</li>
                    <li>Используйте посудомоечную машину полной загрузки</li>
                </ul>
            </div>
            
            <div class="info-card">
                <h3>Энергия:</h3>
                <ul>
                    <li>Замените лампы накаливания на LED</li>
                    <li>Утепляйте окна и двери</li>
                    <li>Используйте программируемые термостаты</li>
                    <li>Выключайте технику из розетки</li>
                </ul>
            </div>
            
            <div class="info-card">
                <h3>Пища и товары:</h3>
                <ul>
                    <li>Планируйте покупки и готовьте с умом</li>
                    <li>Покупайте местные сезонные продукты</li>
                    <li>Используйте многоразовые сумки и контейнеры</li>
                    <li>Ремонтируйте вместо покупки нового</li>
                </ul>
            </div>
        </div>
    </div>
</div>