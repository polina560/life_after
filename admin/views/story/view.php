<?php

use admin\components\widgets\detailView\Column;
use admin\modules\rbac\components\RbacHtml;
use common\components\helpers\UserUrl;
use common\models\StorySearch;
use yii\widgets\DetailView;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Story
 */

$this->title = $model->id;
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Stories'),
    'url' => UserUrl::setFilters(StorySearch::class)
];
$this->params['breadcrumbs'][] = RbacHtml::encode($this->title);
?>
<div class="story-view">

    <h1><?= RbacHtml::encode($this->title) ?></h1>

    <p>
        <?= RbacHtml::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= RbacHtml::a(
            Yii::t('app', 'Delete'),
            ['delete', 'id' => $model->id],
            [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post'
                ]
            ]
        ) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            Column::widget(),
            Column::widget(['attr' => 'accusation']),
            Column::widget(['attr' => 'first_name']),
            Column::widget(['attr' => 'middle_name']),
            Column::widget(['attr' => 'last_name']),
            Column::widget(['attr' => 'add_information']),
            Column::widget(['attr' => 'desktop_photo']),
            Column::widget(['attr' => 'mobile_photo']),
            Column::widget(['attr' => 'story', 'format' => 'ntext']),
            Column::widget(['attr' => 'link']),
        ]
    ]) ?>

</div>
