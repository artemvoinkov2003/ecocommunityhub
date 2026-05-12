<?php

/** @var yii\web\View $this */
/** @var string $name */
/** @var string $message */
/** @var Exception $exception */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\HttpException; 

$this->title = $name;


$errorCode = 500; 
if ($exception instanceof HttpException) {
    $errorCode = $exception->statusCode;
} elseif (property_exists($exception, 'statusCode')) {
    $errorCode = $exception->statusCode;
}

$ecoFacts = [
    "Знаете ли вы, что батарейки разлагаются более 100 лет?",
    "Каждую минуту в океан попадает мусора, эквивалентный грузовику!",
    "Переработка одной алюминиевой банки экономит энергию для работы телевизора 3 часа!",
    "Один дуб производит достаточно кислорода для 10 человек!",
    "Пластиковые пакеты используются в среднем 12 минут, но разлагаются 500 лет!",
    "Если бы каждый человек выключал воду при чистке зубов, можно было бы сэкономить 8 литров в день!",
];
$randomFact = $ecoFacts[array_rand($ecoFacts)];


$errorMessages = [
    400 => [
        'title' => 'Ой, что-то пошло не так!',
        'subtitle' => 'Ваш запрос был немного... странным',
        'image' => 'error-400.svg',
        'message' => 'Похоже, вы отправили серверу что-то непонятное. Он растерялся и не знает, что делать!',
        'tip' => 'Попробуйте обновить страницу или вернуться назад.'
    ],
    403 => [
        'title' => 'Тссс! Это секретная зона!',
        'subtitle' => 'Доступ запрещён',
        'image' => 'error-403.svg',
        'message' => 'Кажется, у вас нет пропуска в этот экологический заповедник.',
        'tip' => 'Если вы считаете, что должны здесь быть, авторизуйтесь.'
    ],
    404 => [
        'title' => 'Ох, потерялись!',
        'subtitle' => 'Страница уплыла в океан',
        'image' => 'error-404.svg',
        'message' => 'Похоже, эта страница отправилась в экологическое путешествие без вас.',
        'tip' => 'Проверьте адрес или вернитесь на главную.'
    ],
    500 => [
        'title' => 'Упс! Экосистема дала сбой',
        'subtitle' => 'Внутренняя ошибка сервера',
        'image' => 'error-500.svg',
        'message' => 'Наш сервер попытался посадить дерево, но что-то пошло не так.',
        'tip' => 'Мы уже отправили эко-ремонтную бригаду устранять проблему.'
    ],
    'default' => [
        'title' => 'Ой-ой! Что-то сломалось',
        'subtitle' => 'Произошла непредвиденная ошибка',
        'image' => 'error-general.svg',
        'message' => 'Наш сайт пытался спасти планету, но споткнулся о банановую кожуру.',
        'tip' => 'Попробуйте вернуться позже или сообщите нам об ошибке.'
    ]
];

$currentError = $errorMessages[$errorCode] ?? $errorMessages['default'];
?>

<div class="error-page">
    <div class="error-header">
        <h1 class="error-code"><?= $errorCode ?></h1>
        <h2 class="error-title"><?= $currentError['title'] ?></h2>
        <p class="error-subtitle"><?= $currentError['subtitle'] ?></p>
    </div>

    <div class="error-container">
        <div class="error-image">
            <?= Html::img(Url::to("@web/img/errors/{$currentError['image']}"), [
                'alt' => 'Ошибка',
                'class' => 'main-error-image',
                'id' => 'errorImage',
                'onclick' => 'showEasterEgg()'
            ]) ?>
            <div class="eco-fact" id="ecoFact" style="display:none;">
                <div class="fact-bubble">
                    <p><?= $randomFact ?></p>
                </div>
                <?= Html::img(Url::to('@web/img/errors/eco-owl.svg'), [
                    'alt' => 'Эко-сова',
                    'class' => 'eco-owl'
                ]) ?>
            </div>
        </div>

        <div class="error-content">
            <div class="error-message">
                <p><?= $currentError['message'] ?></p>
                <p class="error-tip"><?= $currentError['tip'] ?></p>
            </div>

            <div class="error-actions">
                <a href="<?= Yii::$app->homeUrl ?>" class="btn-home">
                    <i class="fas fa-home"></i> На главную
                </a>
                <a href="<?= Url::to(['/site/contact']) ?>" class="btn-contact">
                    <i class="fas fa-envelope"></i> Сообщить об ошибке
                </a>
                <button class="btn-fun" onclick="showFunMessage()">
                    <i class="fas fa-smile"></i> Мне грустно
                </button>
            </div>

            <div class="fun-message" id="funMessage" style="display:none;">
                <p>Не грусти! Вот что можно сделать вместо просмотра этой страницы:</p>
                <ul>
                    <li>Посади дерево</li>
                    <li>Собери мусор в парке</li>
                    <li>Прочитай статью об экологии</li>
                    <li>Сделай кормушку для птиц</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="error-footer">
        <p>Пока вы здесь, почему бы не подумать о спасении планеты? 🌍</p>
    </div>
</div>

<script>
    function showEasterEgg() {
        const ecoFact = document.getElementById('ecoFact');
        if (ecoFact.style.display === 'none') {
            ecoFact.style.display = 'block';
            setTimeout(() => {
                ecoFact.style.display = 'none';
            }, 5000);
        }
    }

    function showFunMessage() {
        const funMessage = document.getElementById('funMessage');
        if (funMessage.style.display === 'none') {
            funMessage.style.display = 'block';
        } else {
            funMessage.style.display = 'none';
        }
    }    
    
    document.addEventListener('DOMContentLoaded', function() {
        const errorImage = document.getElementById('errorImage');
        const animations = ['bounce', 'shake', 'tada', 'jello'];
        const randomAnimation = animations[Math.floor(Math.random() * animations.length)];
        errorImage.classList.add('animated', randomAnimation);
    });
</script>