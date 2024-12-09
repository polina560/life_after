<?php

use common\components\helpers\UserUrl;
use common\models\FormSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Form
 */

$this->title = Yii::t('app', 'Create Form');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Forms'),
    'url' => UserUrl::setFilters(FormSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
