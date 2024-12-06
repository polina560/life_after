<?php

use common\components\helpers\UserUrl;
use common\models\StorySearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Story
 */

$this->title = Yii::t('app', 'Create Story');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Stories'),
    'url' => UserUrl::setFilters(StorySearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="story-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
