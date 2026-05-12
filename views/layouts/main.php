<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;
use yii\bootstrap5\Dropdown;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'apple-touch-icon', 'sizes' => '180x180', 'href' => Yii::getAlias('@web/apple-touch-icon.png')]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'sizes' => '192x192', 'href' => Yii::getAlias('@web/android-chrome-192x192.png')]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'sizes' => '512x512', 'href' => Yii::getAlias('@web/android-chrome-512x512.png')]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'sizes' => '32x32', 'href' => Yii::getAlias('@web/favicon-32x32.png')]);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'sizes' => '16x16', 'href' => Yii::getAlias('@web/favicon-16x16.png')]);
$this->registerLinkTag(['rel' => 'manifest', 'href' => Yii::getAlias('@web/site.webmanifest')]);

?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header id="header">
    <div class="logo">
        <a href="<?= Yii::$app->homeUrl ?>">
            <?= Html::img('@web/img/logotyp.png', [
                'alt' => 'EcoCommunityHub Logo',
                'class' => 'logo-image'
            ]) ?>
        </a>
    </div>
    <?php
    NavBar::begin([
    'options' => [
        'class' => 'navbar navbar-expand-lg', 
        'style' => 'flex-grow: 1; min-width: 0;' 
    ]
]);

echo Nav::widget([
    'options' => ['class' => 'navbar-nav'],
    'items' => [
        ['label' => 'Главная', 'url' => ['/site/index'], 'linkOptions' => ['class' => 'nav-link']],
        ['label' => 'Статьи', 'url' => ['/articles'], 'linkOptions' => ['class' => 'nav-link']],
        ['label' => 'Форум', 'url' => ['/forum'], 'linkOptions' => ['class' => 'nav-link']],
        ['label' => 'Контакты', 'url' => ['/site/contact'], 'linkOptions' => ['class' => 'nav-link']],
        ['label' => 'О нас', 'url' => ['/site/about'], 'linkOptions' => ['class' => 'nav-link']],
        ['label' => 'Календарь', 'url' => ['/calendar'], 'linkOptions' => ['class' => 'nav-link']],
        ['label' => 'Регистрация', 'url' => ['/site/register'], 
            'visible' => Yii::$app->user->isGuest,
            'linkOptions' => ['class' => 'nav-link']
        ],

        Yii::$app->user->can('admin') ? [
            'label' => '<i class="fas fa-cog"></i> Админ',
            'encode' => false,
            'url' => '#',
            'options' => ['class' => 'nav-item dropdown'],
            'linkOptions' => [
                'class' => 'nav-link dropdown-toggle',
                'role' => 'button',
                'data-bs-toggle' => 'dropdown',
                'aria-expanded' => 'false',
            ],
            'items' => [
                [
                    'label' => '<i class="fas fa-newspaper"></i> Статьи',
                    'url' => ['/admin/articles'],
                    'encode' => false,
                    'linkOptions' => ['class' => 'dropdown-item'],
                ],
                [
                    'label' => '<i class="fas fa-users"></i> Пользователи',
                    'url' => ['/admin/user'],
                    'encode' => false,
                    'linkOptions' => ['class' => 'dropdown-item'],
                ],
                '<div class="dropdown-divider"></div>',
                [
                    'label' => '<i class="fas fa-comments"></i> Темы форума',
                    'url' => ['/admin/forum-topic'],
                    'encode' => false,
                    'linkOptions' => ['class' => 'dropdown-item'],
                ],
                [
                    'label' => '<i class="fas fa-comment"></i> Сообщения',
                    'url' => ['/admin/forum-message'],
                    'encode' => false,
                    'linkOptions' => ['class' => 'dropdown-item'],
                ],
                [
                    'label' => '<i class="fas fa-tags"></i> Разделы форума',
                    'url' => ['/admin/forum-section'],
                    'encode' => false,
                    'linkOptions' => ['class' => 'dropdown-item'],
                ]
            ],
            'dropdownOptions' => [
                'class' => 'dropdown-menu',
                'aria-labelledby' => 'adminDropdown'
            ]
        ] : '',
        
        Yii::$app->user->isGuest
            ? ['label' => 'Логин', 'url' => ['/site/login'], 'linkOptions' => ['class' => 'nav-link']]
            : '<li class="nav-item">'
                . Html::beginForm(['/site/logout'])
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'logout-btn']
                )
                . Html::endForm()
                . '</li>'
    ],
]);

NavBar::end();
?>

    <div class="search-container">
        <div class="input-group">
            <input type="text" placeholder="Поиск" class="search-input form-control">
            <button class="search-button">Найти</button>
        </div>
    </div>
</header>

<main>
    <?= $content ?>
</main>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-column">
            <h3 class="footer-title">Аккаунт</h3>
            <ul class="footer-list-left">
                <li><a href="<?= Url::to('/site/index')?>" class="footer-link">Главная</a></li>
                <li><a href="<?= Url::to('/articles')?>" class="footer-link">Статьи</a></li>
                <li><a href="<?= Url::to('/forum')?>" class="footer-link">Форум</a></li>
                <li><a href="<?= Url::to('/site/about')?>" class="footer-link">О нас</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3 class="footer-title">Меню</h3>
            <ul class="footer-list-left">
                <li><a href="<?= Url::to('/calendar')?>" class="footer-link">Календарь</a></li>
                <li><a href="<?= Url::to('/site/contact')?>" class="footer-link">Контакты</a></li>
                <li><a href="<?= Url::to('/site/register')?>" class="footer-link">Регистрация</a></li>
                <li><a href="<?= Url::to('/site/login')?>" class="footer-link">Авторизация</a></li>
            </ul>
        </div>

        <div class="footer-column">
            <h3 class="footer-title">Контакты</h3>
            <div class="footer-links-grid">
                <ul class="footer-list-right">
                    <li><a>Почта: ecocommunityhub@mail.ru</a></li>
                    <li><a>Телефон: +7 (800) 55-35-35</a></li>
                    <li><a>Адрес: г.Курган, ул.Коли-Мяготина, д.163</a></li>
                </ul>
            </div>
        </div>

        <div class="footer-column">
            <h3 class="footer-title">Подписка на рассылку</h3>
            <input type="email" name="email" class="enter-email" placeholder="Введите почту">
            <button class="subscribe">Подписаться</button>
            <div class="footer-links-grid">
                <ul class="footer-list-right">

                </ul>
            </div>
        </div>

        <div class="footer-column social-column">
            <h3 class="footer-title">Соцсети</h3>
            <div class="social-links">
                <a href="https://vk.com/" class="social-icon">
                    <?= Html::img('@web/img/vk.png', ['alt' => 'VK']) ?>
                </a>
                <a href="https://web.telegram.org/" class="social-icon">
                    <?= Html::img('@web/img/telegram.png', ['alt' => 'Telegram']) ?>
                </a>
                <a href="https://github.com/" class="social-icon">
                    <?= Html::img('@web/img/github.png', ['alt' => 'GitHub']) ?>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p class="copyright">&copy; <?= date('Y') ?>EcoCommunityHub. Воинков Артём.</p>
    </div>
</footer>

<div id="scrollToTop" class="scroll-to-top">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
        <path d="M12 2l-8 8h5v10h6V10h5z" fill="currentColor"/>
    </svg>
</div>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>