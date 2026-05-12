<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Ветряная энергия';
?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="page-content">
    <div class="page-section">
        <h2 class="section-title">Энергия ветра: сила природы</h2>
        <div class="section-content">
            <p>Ветроэнергетика - один из самых быстрорастущих секторов возобновляемой энергетики. Современные ветрогенераторы преобразуют кинетическую энергию ветра в электричество без вредных выбросов.</p>
            
            <div class="info-card">
                <h3>Преимущества ветроэнергетики:</h3>
                <ul>
                    <li><strong>Экологичность</strong> - нулевые выбросы CO2 в процессе работы</li>
                    <li><strong>Возобновляемость</strong> - ветер неисчерпаемый источник</li>
                    <li><strong>Экономичность</strong> - низкая стоимость после установки</li>
                    <li><strong>Масштабируемость</strong> - от небольших домашних турбин до крупных ферм</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="page-section">
        <h2 class="section-title">Технологии и перспективы</h2>
        <div class="section-content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">743 ГВт</div>
                    <div class="stat-label">Мощность ветроэнергетики в мире</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">15 м/с</div>
                    <div class="stat-label">Оптимальная скорость ветра</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">200 м</div>
                    <div class="stat-label">Высота современных турбин</div>
                </div>
            </div>
            
            <p>Современные ветровые турбины состоят из трех основных компонентов: башни, лопастей и гондолы. Лопасти улавливают энергию ветра и вращают ротор, который соединен с генератором, производящим электричество.</p>
            
            <div class="info-card">
                <h3>Перспективные направления:</h3>
                <ul>
                    <li><strong>Оффшорные ветропарки</strong> - установка турбин в море, где ветры сильнее и стабильнее</li>
                    <li><strong>Плавучие турбины</strong> - для глубоководных районов</li>
                    <li><strong>Вертикальные турбины</strong> - компактные решения для городов</li>
                    <li><strong>Высотные ветрогенераторы</strong> - использование сильных ветров на большой высоте</li>
                </ul>
            </div>
        </div>
    </div>
</div>