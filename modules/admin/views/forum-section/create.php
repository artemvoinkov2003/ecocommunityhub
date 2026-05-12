<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\ForumSection $model */

$this->title = Yii::t('app', 'Создание раздела');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Разделы'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forum-section-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
