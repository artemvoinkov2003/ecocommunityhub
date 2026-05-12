<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Articles $model */

$this->title = Yii::t('app', 'Создание статьи');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Статьи'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
