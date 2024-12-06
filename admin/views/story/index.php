<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\StorySearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Story
 */

$this->title = Yii::t('app', 'Stories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="story-index">

    <br>
    <h1><?= RbacHtml::encode($this->title) ?></h1>
    <br>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create Story'), ['create'], ['class' => 'btn btn-success']);
//           $this->render('_create_modal', ['model' => $model]);
        ?>
    </div>

    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'accusation']),
            Column::widget(['attr' => 'first_name']),
            Column::widget(['attr' => 'middle_name']),
//            Column::widget(['attr' => 'last_name']),
            Column::widget(['attr' => 'add_information']),
//            Column::widget(['attr' => 'desktop_photo']),
//            Column::widget(['attr' => 'mobile_photo']),
//            Column::widget(['attr' => 'story', 'format' => 'ntext']),
//            Column::widget(['attr' => 'link']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
