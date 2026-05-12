<?php

use yii\helpers\Html;

$this->title = 'О нас';

?>

<div class="about-container">
    <div class="about-hero">
        <div class="hero-content">
            <h1>Мы - EcoCommunityHub</h1>
            <p>Сообщество энтузиастов, объединенных целью создания устойчивого будущего</p>
        </div>
        <div class="hero-image">
            <?= Html::img('@web/img/ecology.jpg', ['alt' => 'Эко-сообщество']) ?>
        </div>
    </div>

    <div class="mission-section">
        <h2>Наша миссия</h2>
        <div class="mission-cards">
            <div class="mission-card">
                <div class="card-icon">♻️</div>
                <h3>Объединение</h3>
                <p>Создаем платформу для эко-активистов, где можно делиться знаниями и опытом</p>
            </div>
            <div class="mission-card">
                <div class="card-icon">🌱</div>
                <h3>Образование</h3>
                <p>Распространяем знания об устойчивом развитии и экологичных практиках</p>
            </div>
            <div class="mission-card">
                <div class="card-icon">🤝</div>
                <h3>Действие</h3>
                <p>Организуем экологические инициативы и проекты для реальных изменений</p>
            </div>
        </div>
    </div>

    <div class="stats-section">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-value">5K+</div>
                <div class="stat-label">Участников</div>
                <div class="stat-icon">👥</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">120+</div>
                <div class="stat-label">Эко-проектов</div>
                <div class="stat-icon">🌿</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">350+</div>
                <div class="stat-label">Мероприятий</div>
                <div class="stat-icon">📅</div>
            </div>
            <div class="stat-item">
                <div class="stat-value">15</div>
                <div class="stat-label">Городов</div>
                <div class="stat-icon">📍</div>
            </div>
        </div>
    </div>

    <div class="team-section">
        <h2>Наша команда</h2>
        <div class="team-grid">
            <div class="team-member">
                <?= Html::img('@web/img/ava.webp', ['alt' => 'Анна Иванова']) ?>
                <h3>Анна Иванова</h3>
                <p>Основатель проекта</p>

            </div>
            <div class="team-member">
                <?= Html::img('@web/img/ava.webp', ['alt' => 'Петр Сидоров']) ?>
                <h3>Петр Сидоров</h3>
                <p>Технический директор</p>

            </div>
            <div class="team-member">
                <?= Html::img('@web/img/ava.webp', ['alt' => 'Мария Петрова']) ?>
                <h3>Мария Петрова</h3>
                <p>Руководитель сообщества</p>

            </div>
        </div>
    </div>

    <div class="inspiration-section">
        <div class="inspiration-content">
            <h2>Наше вдохновение</h2>
            <blockquote>
                "Лучший способ предсказать будущее — создать его"
                <cite>— Абрахам Линкольн</cite>
            </blockquote>
            <p>Мы верим, что совместными усилиями можем создать экологичное будущее для нашей планеты. Каждое маленькое действие имеет значение, а вместе мы можем добиться больших изменений.</p>
            <div class="eco-icons">
                <div class="eco-icon">🌍</div>
                <div class="eco-icon">🌳</div>
                <div class="eco-icon">💧</div>
                <div class="eco-icon">☀️</div>
            </div>
        </div>
        <div class="inspiration-image">
            <?= Html::img('@web/img/ecology.jpg', ['alt' => 'Эко-вдохновение']) ?>
        </div>
    </div>
</div>