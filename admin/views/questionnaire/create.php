<?php

use common\components\helpers\UserUrl;
use common\models\QuestionnaireSearch;
use yii\bootstrap5\Html;

/**
 * @var $this  yii\web\View
 * @var $model common\models\Questionnaire
 */

$this->title = Yii::t('app', 'Create Questionnaire');
$this->params['breadcrumbs'][] = [
    'label' => Yii::t('app', 'Questionnaires'),
    'url' => UserUrl::setFilters(QuestionnaireSearch::class)
];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="questionnaire-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model, 'isCreate' => true]) ?>

</div>
