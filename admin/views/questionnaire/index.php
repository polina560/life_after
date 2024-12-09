<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\QuestionnaireSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\Questionnaire
 */

$this->title = Yii::t('app', 'Questionnaires');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionnaire-index">

    <h1><?= RbacHtml::encode($this->title) ?></h1>


    <?= SortableGridView::widget([
        'dataProvider' => $dataProvider,
        'pjax' => true,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::class],

            Column::widget(),
            Column::widget(['attr' => 'full_name', 'editable' => false]),
            Column::widget(['attr' => 'age', 'editable' => false]),
            Column::widget(['attr' => 'city', 'editable' => false]),
            Column::widget(['attr' => 'status', 'editable' => false]),
            Column::widget(['attr' => 'work', 'editable' => false]),
            ColumnDate::widget(['attr' => 'created_at', 'searchModel' => $searchModel, 'editable' => false]),

//            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
