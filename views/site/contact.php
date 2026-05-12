<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Контакты';

?>

<div class="title">
    <h1>Контакты</h1>
</div>

<div class="contact">
    <div class="contact-photo">
        <?= Html::img('@web/img/contact-nature.jpg', ['alt' => '#']) ?>
    </div>
    <div class="contact-information">
        <h1 class="cont">Кратко о нас</h1>
        <p><span>EcoCommunityHub - </span>это онлайн-платформа, созданная для сближения и поддержки сообществ, заинтересованных в экологическом устойчивом образе жизни</p>
        <h1 class="cont">Контакты</h1>
        <div class="kontakt">
            <h1>Телефон:</h1>
        </div>
        <div class="info">
            <h1>+7 (800) 555-35-35</h1>
        </div>
        <div class="kontakt">
            <h1>Адрес:</h1>
        </div>
        <div class="info">
            <h1>Курган, ул.Пушкина, 52</h1>
        </div>
        <div class="kontakt">
            <h1>Почта:</h1>
        </div>
        <div class="info">
            <h1>ecocommunityhub@mail.ru</h1>
        </div>
    </div>
</div>

<div class="map-section">
    <main class="content">
        <section class="contact-info">
            <section class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3201.3908834688714!2d65.31962266129085!3d55.43258836163875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1z0LrRg9GA0LPQsNC90YHQutC40Lkg0L_QtdC00LDQs9C-0LPQuNGH0LXRgdC60LjQuSDQutC-0LvQu9C10LTQtg!5e0!3m2!1sru!2sru!4v1731613823288!5m2!1sru!2sru" width="600" height="450" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </section>
    </main>
</div>

<div class="forma">
    <h1>Оставить отзыв</h1>
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <div class="form-group">
        <label>Ваша оценка</label>
        <div class="rating-input">
            <div class="form-group">

    <div class="rating-input">
        <?php for ($i = 5; $i >= 1; $i--): ?>            
            <input type="radio" id="star<?= $i ?>" name="ContactForm[rating]" value="<?= $i ?>" <?= ($i == 5) ? 'checked' : '' ?> />
            <label for="star<?= $i ?>">★</label>
        <?php endfor; ?>
    </div>
</div>
        </div>
    </div>

    <?= $form->field($model, 'text')->textarea(['rows' => 6, 'placeholder' => 'Ваш отзыв...']) ?>
    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'button-otzov']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>

<div class="reviews-section">
    <h1>Отзывы (<?= count($reviews) ?>)</h1>
    <div class="container-review">
        <div class="card-reviews">
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="review-item">
                        <?php if ($review->photo): ?>
                            <?= Html::img('/' . $review->photo, ['alt' => 'Фото отзыва', 'class' => 'review-avatar']) ?>
                        <?php else: ?>
                            <div class="avatar-placeholder">
                                <span>?</span>
                            </div>
                        <?php endif; ?>
                        
                        <div class="review-content">
                            <div class="review-header">
                                <h2 class="review-name">
                                    <?= Html::encode($review->user->first_name ?? '') ?> 
                                    <?= Html::encode($review->user->last_name ?? '') ?>
                                </h2>
                                
                                <div class="review-rating">
                                    <?php for ($i = 1; $i <= 5; $i++): ?>
                                        <span class="star <?= $i <= ($review->rating ?? 0) ? 'active' : '' ?>">★</span>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            
                            <p class="review-text"><?= nl2br(Html::encode($review->text)) ?></p>
                            <p class="review-date"><?= Yii::$app->formatter->asDate($review->created_at, 'php:d.m.Y H:i') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="no-reviews">Пока нет отзывов</p>
            <?php endif; ?>
        </div>
    </div>
</div>