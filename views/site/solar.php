<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Солнечная энергия';
?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="page-content">
    <div class="page-section">
        <h2 class="section-title">Солнечная энергия: мощь солнца</h2>
        <div class="section-content">
            <p>Солнечная энергетика использует неиссякаемую энергию солнца для производства электричества и тепла. Это один из самых экологичных и перспективных видов возобновляемой энергии.</p>
            
            <div class="info-card">
                <h3>Основные технологии:</h3>
                <ul>
                    <li><strong>Фотоэлектрические системы</strong> - преобразуют солнечный свет напрямую в электричество</li>
                    <li><strong>Солнечные тепловые коллекторы</strong> - нагревают воду или воздух</li>
                    <li><strong>Концентрированная солнечная энергия</strong> - фокусирует солнечные лучи для производства пара</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="page-section">
        <h2 class="section-title">Преимущества и применение</h2>
        <div class="section-content">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">1.3 ТВт</div>
                    <div class="stat-label">Солнечных мощностей в мире</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">22%</div>
                    <div class="stat-label">КПД современных солнечных панелей</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">3-5 лет</div>
                    <div class="stat-label">Окупаемость домашней системы</div>
                </div>
            </div>
            
            <div class="tips-grid">
                <div class="tip-card">
                    <div class="tip-icon">🏠</div>
                    <div class="tip-content">
                        <h3>Домашние установки</h3>
                        <p>Установка солнечных панелей на крышах домов для автономного энергоснабжения</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🏭</div>
                    <div class="tip-content">
                        <h3>Промышленные электростанции</h3>
                        <p>Крупные солнечные фермы мощностью в сотни мегаватт</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🔋</div>
                    <div class="tip-content">
                        <h3>Портативные решения</h3>
                        <p>Солнечные зарядки для гаджетов, портативные электростанции</p>
                    </div>
                </div>
            </div>
            
            <div class="info-card">
                <h3>Будущее солнечной энергетики:</h3>
                <ul>
                    <li>Перовскитные солнечные элементы с КПД более 30%</li>
                    <li>Солнечные окна и фасады зданий</li>
                    <li>Плавающие солнечные электростанции</li>
                    <li>Солнечные дороги с встроенными панелями</li>
                </ul>
            </div>
        </div>
    </div>
</div>