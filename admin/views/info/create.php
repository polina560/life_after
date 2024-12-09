<?php

use common\components\helpers\UserUrl;
use common\models\InfoSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Info
 */

$this->title = Yii::t('app', 'Create Info');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Infos'),
    'url' => UserUrl::setFilters(InfoSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
