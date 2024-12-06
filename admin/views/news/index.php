<?php

use admin\components\GroupedActionColumn;
use admin\components\widgets\gridView\Column;
use admin\components\widgets\gridView\ColumnDate;
use admin\modules\rbac\components\RbacHtml;
use admin\widgets\sortableGridView\SortableGridView;
use kartik\grid\SerialColumn;
use yii\grid\DataColumn;
use yii\widgets\ListView;

/**
 * @var $this         yii\web\View
 * @var $searchModel  common\models\NewsSearch
 * @var $dataProvider yii\data\ActiveDataProvider
 * @var $model        common\models\News
 */

$this->title = Yii::t('app', 'News');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <br>
    <h1><?= RbacHtml::encode($this->title) ?></h1>
    <br>

    <div>
        <?=
            RbacHtml::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']);
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
            ColumnDate::widget(['attr' => 'date','searchModel' => $searchModel, 'withTime' => false]),
            Column::widget(['attr' => 'title']),
//            Column::widget(['attr' => 'description']),
//            Column::widget(['attr' => 'link']),

            ['class' => GroupedActionColumn::class]
        ]
    ]) ?>
</div>
