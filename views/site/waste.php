<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Снижение отходов';
?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="page-content">
    <div class="page-section">
        <h2 class="section-title">Zero Waste: путь к безотходной жизни</h2>
        <div class="section-content">
            <p>Концепция Zero Waste (ноль отходов) направлена на максимальное сокращение мусора, отправляемого на свалки. Это достигается через принципы: Refuse (отказ), Reduce (сокращение), Reuse (повторное использование), Recycle (переработка), Rot (компостирование).</p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">2 млрд т</div>
                    <div class="stat-label">Твердых отходов в мире ежегодно</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">33%</div>
                    <div class="stat-label">Пищевых отходов от общего объема</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">9%</div>
                    <div class="stat-label">Пластика перерабатывается</div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="page-section">
        <h2 class="section-title">5 шагов к сокращению отходов</h2>
        <div class="section-content">
            <div class="tips-grid">
                <div class="tip-card">
                    <div class="tip-icon">🚫</div>
                    <div class="tip-content">
                        <h3>Отказ от ненужного</h3>
                        <p>Говорите "нет" бесплатным образцам, одноразовым предметам и ненужным покупкам</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🛍️</div>
                    <div class="tip-content">
                        <h3>Многоразовые альтернативы</h3>
                        <p>Используйте многоразовые сумки, бутылки, контейнеры и кружки</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">♻️</div>
                    <div class="tip-content">
                        <h3>Сортировка отходов</h3>
                        <p>Организуйте раздельный сбор мусора для переработки</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🍃</div>
                    <div class="tip-content">
                        <h3>Компостирование</h3>
                        <p>Превращайте пищевые отходы в ценное удобрение</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🔧</div>
                    <div class="tip-content">
                        <h3>Ремонт и апсайклинг</h3>
                        <p>Чините вещи вместо замены, давайте вторую жизнь старым предметам</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>