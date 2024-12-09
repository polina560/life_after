<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\components\widgets\gridView\ColumnSelect2;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use common\enums\ModerationStatus;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\InfoSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Info
 */

$this->title = Yii::t('app', 'Request of Additional Information');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>



    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'name', 'editable' => false]),
            Column::widget(['attr' => 'email', 'format' => 'email', 'editable' => false]),
            ColumnSelect2::widget(['attr' => 'moderation_status', 'items' =>ModerationStatus::class, 'hideSearch' => true]),
            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),

            ['class' => GroupedActionColumn::class,
                'buttons' => [
                    'update' => function () {return null;},
                    'view' => function () {return null;}
                ]
            ]        ]
    ]) ?>
</div>
