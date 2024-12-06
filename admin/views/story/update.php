<?php

use common\components\helpers\UserUrl;
use common\models\StorySearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Story
 */

$this->title = Yii::t('app', 'Update: ') . $model->id;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Stories'),
    'url' => UserUrl::setFilters(StorySearch::class)
];
$this->params['breadcrumbs'][] = ['label' => Html::encode($model->id), 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="story-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => false]) ?>

</div>
