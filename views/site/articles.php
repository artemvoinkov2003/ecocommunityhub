<?php
//
//use yii\helpers\Html;
//use yii\widgets\ActiveForm;
//
//$this->title = 'Статьи';
//
//?>
<!---->
<!--<div class="title">-->
<!--    <h1>Статьи</h1>-->
<!--</div>-->
<!---->
<!--<div class="article-view">-->
<!---->
<!--    <div class="article-header">-->
<!--        <h1>--><?//= Html::encode($article->title) ?><!--</h1>-->
<!--        <div class="meta">-->
<!--            <span class="author">Автор: --><?//= $article->author->username ?><!--</span>-->
<!--            <span class="date">--><?//= Yii::$app->formatter->asDate($article->created_at) ?><!--</span>-->
<!--        </div>-->
<!--    </div>-->
<!---->
<!--    <div class="content">-->
<!--        --><?//= nl2br(Html::encode($article->content)) ?>
<!--    </div>-->
<!---->
<!--    <div class="comments-section">-->
<!--        <h1>Комментарии (--><?//= count($comment) ?><!--) </h1>-->
<!---->
<!--        --><?php //if (!Yii::$app->user->isGuest): ?>
<!--            --><?php //$form = ActiveForm::begin([
//               'action' => ['view', 'id' => $article->id],
//               'option' => ['class' => 'comment-form']
//            ]); ?>
<!---->
<!--        --><?//= $form->field($comment, 'text')
//        ->textarea(['rows' => 4, 'placeholder' => 'Ваш комментарий'])
//        ->label(false)  ?>
<!---->
<!--        <div class="form-group">-->
<!--            --><?//= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
<!--        </div>-->
<!---->
<!--        --><?php //ActiveForm::end() ?>
<!--        --><?php //endif; ?>
<!---->
<!--        <div class="comments-list">-->
<!--            --><?php //foreach ($comments as $comment): ?>
<!--            <div class="comment-item">-->
<!--                <div class="comment-header">-->
<!--                    <span class="author">Автор: --><?//= $comment->user->username ?><!--</span>-->
<!--                    <span class="date">--><?//= Yii::$app->formatter->asRelativeTime($comment->created_at) ?><!--</span>-->
<!--                </div>-->
<!--                <div class="comment-text">-->
<!--                    --><?//= nl2br(Html::encode($comment->text)) ?>
<!--                </div>-->
<!--            </div>-->
<!--            --><?php //endforeach; ?>
<!--        </div>-->
<!---->
<!--    </div>-->
<!---->
<!--</div>-->

