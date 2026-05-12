<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Главная';

?>

<div class="title" id="none-green-future">
    <h1>Объеденяемся ради зеленого будущего</h1>
</div>

<div class="future">

    <div class="ecology">
        <?= Html::img('@web/img/ecology.jpg', ['alt' => '#']) ?>
        <h1>Сохрани природу в первозданном виде</h1>
    </div>

    <div class="ecology">
        <?= Html::img('@web/img/initiative.jpg', ['alt' => '#']) ?>
        <h1>Создавай и участвуй в экологических инициативах</h1>
    </div>

</div>

<div class="title">
    <h1>Популярные категории</h1>
</div>

<div class="container-category">

    <div class="category">
        <div class="category-icon-container">
            <img src="/img/climate.png" alt="Климат" class="category-icon">
        </div>
        <a href="<?= Url::to('/site/climate')?>" class="category-link">Климат</a>
    </div>

    <div class="category">
        <div class="category-icon-container">
            <img src="/img/energy.png" alt="Энергия" class="category-icon">
        </div>
        <a href="<?= Url::to('/site/energy')?>" class="category-link">Энергия</a>
    </div>

    <div class="category">
        <div class="category-icon-container">
            <img src="/img/costs.png" alt="Расходы" class="category-icon">
        </div>
        <a href="<?= Url::to('/site/costs')?>" class="category-link">Расходы</a>
    </div>

    <div class="category">
        <div class="category-icon-container">
            <img src="/img/waste.png" alt="Снизить отходы" class="category-icon">
        </div>
        <a href="<?= Url::to('/site/waste')?>" class="category-link">Снизить отходы</a>
    </div>

    <div class="category">
        <div class="category-icon-container">
            <img src="/img/wind.png" alt="Ветряная энергия" class="category-icon">
        </div>
        <a href="<?= Url::to('/site/wind')?>" class="category-link">Ветряная энергия</a>
    </div>

    <div class="category">
        <div class="category-icon-container">
            <img src="/img/solar.png" alt="Солнечная энергия" class="category-icon">
        </div>
        <a href="<?= Url::to('/site/solar')?>" class="category-link">Солнечная энергия</a>
    </div>

</div>

<div class="environmental-projects">
    <div class="green-planet">
        <?= Html::img('@web/img/green-planet.png', ['alt' => '#']) ?>
    </div>
    <div class="project">
        <div class="events">
            <h1>Объеденяем экологические проекты, акции, мероприятия, сообщества и возможности от партнеров в единую экологическую повестку</h1>
        </div>
        <div class="event">
            <h1>100</h1>
            <h2>региональных</h2>
        </div>
        <div class="event">
            <h1>25 163</h1>
            <h2>волонтеров</h2>
        </div>
        <div class="event">
            <h1>5 269</h1>
            <h2>мероприятий</h2>
        </div>
    </div>
</div>

<div class="title">
    <h1>Задачи</h1>
</div>

<div class="tasks">

    <div class="task">
        <h1>Вовлечение молодёжи в волонтёрские акции по лесовосстановлению, в том числе аугроуход после лесопосадок</h1>
    </div>

    <div class="task">
        <h1>Разивитие и популяризация лесоклиматических проектов совместно с российскими компанияим</h1>
    </div>

    <div class="task">
        <h1>Развитие кадрового потенциала и взаимоействие с вузами, осуществляющими подготовку кадров и исследования в области лесного хозяйства и климатического регулирования</h1>
    </div>

</div>

<section class="eco-video-section">
    <div class="section-header">
        <h1>Экологические видеоуроки</h1>
        <p>Познавательные материалы для тех кто заботиться о природе</p>
    </div>

    <div class="videos-container">
        
        
        <div class="video-card">
            <div class="video-thumbnail">
                <video class="local-video-player" controls poster="<?= Yii::getAlias('@web') ?>/img/videos/sorting-waste-poster.jpg" preload="metadata">
                    <source src="<?= Yii::getAlias('@web') ?>/videos/sorting-waste.mp4" type="video/mp4">
                    <source src="<?= Yii::getAlias('@web') ?>/videos/sorting-waste.webm" type="video/webm">
                    Ваш браузер не поддерживает видео.
                </video>
                
            </div>
            <div class="video-content">
                <h1>Как правильно сортировать отходы</h1>
                <p>Полное руководство по сортировке мусора для дальнейшей переработки</p>
                <div class="video-meta">
                    <div class="video-date">20.06.2025</div>
                    <div class="video-views">4k просмотров</div>
                </div>
            </div>
        </div>

        
        <div class="video-card">
            <div class="video-thumbnail">
                <video class="local-video-player" controls poster="<?= Yii::getAlias('@web') ?>/img/videos/alternative-energy.jpg" preload="metadata">
                    <source src="<?= Yii::getAlias('@web') ?>/videos/alternative-energy.mp4" type="video/mp4">
                    <source src="<?= Yii::getAlias('@web') ?>/videos/alternative-energy.webm" type="video/webm">
                    Ваш браузер не поддерживает видео.
                </video>
                
            </div>
            <div class="video-content">
                <h1>Альтернативная энергетика</h1>
                <p>Полный разбор возобновляемых источников энергии</p> 
                <div class="video-meta">
                    <div class="video-date">15.06.2025</div>
                    <div class="video-views">5k просмотров</div>
                </div>
            </div>
        </div>
        
        <div class="video-card">
            <div class="video-thumbnail">
                <video class="local-video-player" controls poster="<?= Yii::getAlias('@web') ?>/img/videos/save-water-poster.jpg" preload="metadata">
                    <source src="<?= Yii::getAlias('@web') ?>/videos/save-water.mp4" type="video/mp4">
                    <source src="<?= Yii::getAlias('@web') ?>/videos/save-water.webm" type="video/webm">
                    Ваш браузер не поддерживает видео.
                </video>
                
            </div>
            <div class="video-content">
                <h1>Экономия воды в быту</h1>
                <p>Эффективные методы сокращения расхода воды в повседневной жизни</p>
                <div class="video-meta">
                    <div class="video-date">10.06.2025</div>
                    <div class="video-views">6k просмотров</div>
                </div>
            </div>
        </div>        

    </div>

    <a href="#" class="view-all-button">Смотреть все уроки</a>
</section>


