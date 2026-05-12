<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Устойчивая энергетика';
?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="page-content">
    <div class="page-section">
        <h2 class="section-title">Переход к чистой энергии</h2>
        <div class="section-content">
            <p>Возобновляемые источники энергии - ключ к устойчивому будущему. В отличие от ископаемого топлива, они неисчерпаемы и не загрязняют окружающую среду.</p>
            
            <div class="info-card">
                <h3>Основные виды возобновляемой энергии:</h3>
                <ul>
                    <li><strong>Солнечная энергия</strong> - преобразование солнечного света в электричество</li>
                    <li><strong>Ветровая энергия</strong> - использование силы ветра для генерации электричества</li>
                    <li><strong>Гидроэнергия</strong> - использование движения воды для производства энергии</li>
                    <li><strong>Геотермальная энергия</strong> - тепло из недр Земли</li>
                    <li><strong>Биоэнергия</strong> - энергия из органических материалов</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="page-section">
        <h2 class="section-title">Преимущества чистой энергии</h2>
        <div class="section-content">
            <div class="tips-grid">
                <div class="tip-card">
                    <div class="tip-icon">🌎</div>
                    <div class="tip-content">
                        <h3>Экологические</h3>
                        <p>Сокращение выбросов CO2 и других загрязнителей воздуха</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">💼</div>
                    <div class="tip-content">
                        <h3>Экономические</h3>
                        <p>Снижение затрат на энергию в долгосрочной перспективе</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🔋</div>
                    <div class="tip-content">
                        <h3>Энергонезависимость</h3>
                        <p>Снижение зависимости от импорта ископаемого топлива</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">📈</div>
                    <div class="tip-content">
                        <h3>Инновации</h3>
                        <p>Создание новых рабочих мест и технологическое развитие</p>
                    </div>
                </div>
            </div>
            
            <p>По данным Международного энергетического агентства, к 2025 году возобновляемые источники энергии станут крупнейшим источником электроэнергии в мире, обойдя уголь.</p>
        </div>
    </div>
</div>