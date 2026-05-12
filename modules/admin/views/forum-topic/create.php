<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForumTopic $model */

$this->title = Yii::t('app', 'Создание темы');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Темы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-topic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
