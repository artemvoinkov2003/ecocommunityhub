<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Html::encode($article->title);
?>

<div class="article-view">
    <div class="article-header">
        <div class="container">
            <h1><?= Html::encode($article->title) ?></h1>
            <div class="article-meta">
                <span class="category-badge"><?= $article->category->name ?></span>
                <span><?= Yii::$app->formatter->asDate($article->created_at) ?></span>
                <span>Просмотров: <?= $article->views ?></span>
            </div>
        </div>
    </div>

    <div class="article-container">
        <div class="article-main">
            <div class="article-content">
                <?= nl2br(Html::encode($article->content)) ?>
            </div>

<div class="eco-initiatives">
                <h2><i class="fas fa-hands-helping"></i> Присоединяйтесь к экологическим инициативам</h2>
                <p>Узнайте о текущих проектах и акциях в вашем регионе, где вы можете внести свой вклад</p>
                
                <div class="initiatives-grid">
                    <div class="initiative-card">
                        <div class="initiative-icon">
                            <i class="fas fa-tree"></i>
                        </div>
                        <h3>Зеленый город</h3>
                        <p>Посадка деревьев в городских парках каждую субботу. Присоединяйтесь к волонтерам!</p>
                        <a href="#" class="btn btn-initiative">Участвовать</a>
                    </div>
                    
                    <div class="initiative-card">
                        <div class="initiative-icon">
                            <i class="fas fa-recycle"></i>
                        </div>
                        <h3>Чистый берег</h3>
                        <p>Уборка прибрежных зон от мусора. Следующая акция - 25 июня.</p>
                        <a href="#" class="btn btn-initiative">Участвовать</a>
                    </div>
                    
                    <div class="initiative-card">
                        <div class="initiative-icon">
                            <i class="fas fa-solar-panel"></i>
                        </div>
                        <h3>Солнечные школы</h3>
                        <p>Помогите установить солнечные панели в сельских школах.</p>
                        <a href="#" class="btn btn-initiative">Поддержать</a>
                    </div>
                </div>
                
                <div class="initiative-cta">
                    <p>Есть своя экологическая инициатива? Предложи ее</p>
                    <a href="<?= Url::to(['site/contact']) ?>" class="btn btn-eco">
                        <i class="fas fa-plus"></i> Предложить инициативу
                    </a>
                </div>
            </div>
        </div>

        <aside class="article-sidebar">
            <div class="related-articles">
                <h3>Похожие статьи</h3>
                <?php foreach ($related as $rel): ?>
                    <div class="related-article">
                        <h4>
                            <?= Html::a(
                                Html::encode($rel->title), 
                                ['article/view', 'id' => $rel->id], 
                                ['class' => 'related-link']
                            ) ?>
                        </h4>
                        <p><?= mb_substr(Html::encode($rel->content), 0, 100) ?>...</p>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="newsletter-sidebar">
                <h3>Подписка на новости</h3>
                <p>Будьте в курсе новых статей и экологических инициатив</p>
                <form>
                    <input type="email" placeholder="Ваша почта">
                    <button class="btn-article">Подписаться</button>
                </form>
            </div>
        </aside>
    </div>
</div>