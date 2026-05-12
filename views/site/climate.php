<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Климат и экология';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="page-header">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="page-content">
    <div class="page-section">
        <h2 class="section-title">Изменение климата: глобальный вызов</h2>
        <div class="section-content">
            <p>Изменение климата - одна из самых серьезных экологических проблем, с которыми сталкивается человечество. Повышение глобальной температуры, экстремальные погодные явления и повышение уровня моря уже оказывают влияние на экосистемы и сообщества по всему миру.</p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">+2°C</div>
                    <div class="stat-label">Среднее потепление с доиндустриальной эпохи</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">420 млн т</div>
                    <div class="stat-label">CO2 выбрасывается ежегодно</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">50%</div>
                    <div class="stat-label">Сокращение выбросов к 2030 необходимо</div>
                </div>
            </div>
            
            <p>Основные причины изменения климата включают сжигание ископаемого топлива, вырубку лесов и промышленные процессы. Эти действия увеличивают концентрацию парниковых газов в атмосфере, что приводит к глобальному потеплению.</p>
        </div>
    </div>
    
    <div class="page-section">
        <h2 class="section-title">Как вы можете помочь</h2>
        <div class="section-content">
            <div class="tips-grid">
                <div class="tip-card">
                    <div class="tip-icon">🚲</div>
                    <div class="tip-content">
                        <h1>Экологичный транспорт</h1>
                        <p>Используйте велосипед, общественный транспорт или электромобили вместо личных автомобилей с ДВС</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">💡</div>
                    <div class="tip-content">
                        <h1>Энергоэффективность</h1>
                        <p>Перейдите на LED-лампы, используйте энергоэффективные приборы и утеплите дом</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">🌳</div>
                    <div class="tip-content">
                        <h1>Посадка деревьев</h1>
                        <p>Участвуйте в программах по озеленению - деревья поглощают CO2</p>
                    </div>
                </div>
                <div class="tip-card">
                    <div class="tip-icon">♻️</div>
                    <div class="tip-content">
                        <h1>Сокращение отходов</h1>
                        <p>Практикуйте принципы zero waste: повторное использование, переработка, компостирование</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>