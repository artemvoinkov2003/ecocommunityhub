<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use app\models\Articles;

$this->title = 'Статьи';
?>

<div class="article-index">
    <div class="article-header">
        <h1>Экологические статьи</h1>
        <p>Познавательные материалы о защите окружающей среды</p>
    </div>

    <div class="article-container">
        <aside class="categories-sidebar">
            <h3>Категории</h3>
            <ul>
                <?php foreach ($categories as $id => $name): ?>
                    <li>
                        <?= Html::a(
                            $name, 
                            ['article/index', 'category' => $id === 'Все' ? 'Все' : $id],
                            [
                                'class' => 'category-link ' . ($activeCategory == $id ? 'active-category' : ''),
                                'style' => $activeCategory == $id ? 'font-weight: bold;' : ''
                            ]
                        ) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </aside>

        <main class="article-list">
            <?php if (empty($articles)): ?>
                <div class="no-articles">
                    <p>Статей в этой категории пока нет</p>
                </div>
            <?php else: ?>
                <?php foreach ($articles as $article): ?>
                    <article class="article-card">
                        <div class="article-header">
                            <div class="article-img">
                                <?= Html::img('@web/img/ecology.jpg', ['alt' => '#']) ?>
                            </div>

                            <span class="category-badge"><?= Html::encode($article->category->name) ?></span>
                            <h2>
                                <?= Html::a(
                                    Html::encode($article->title), 
                                    ['article/view', 'id' => $article->id], 
                                    ['class' => 'article-title-link']
                                ) ?>
                            </h2>
                        </div>
                        <div class="article-preview">
                            <?= mb_substr(Html::encode($article->content), 0, 200) ?>...
                        </div>
                        <div class="article-meta">
                            <span><?= Yii::$app->formatter->asDate($article->created_at, 'php:d.m.Y') ?></span>
                            <span>Просмотров: <?= $article->views ?></span>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </main>
    </div>
</div>