<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use api\behaviors\returnStatusBehavior\RequestFormData;
use common\models\Questionnaire;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use yii\helpers\ArrayHelper;

class QuestionnaireController extends AppController
{

    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Tea's
     */
    #[Post(
        path: '/questionnaire/index',
        operationId: 'questionnaire-index',
        description: 'Отправляет данные изанкеты',
        summary: 'Данные из анкеты',
        security: [['bearerAuth' => []]],
        tags: ['questionnaire']
    )]
    #[RequestFormData(
        properties: [
            new Property(property: 'full_name', description: 'Имя', type: 'string'),
            new Property(property: 'age', description: 'Возраст', type: 'integer'),
            new Property(property: 'city', description: 'Город', type: 'string'),
            new Property(property: 'status', description: 'Статус', type: 'integer'),
            new Property(property: 'work', description: 'Наличие работы', type: 'boolean'),
        ]
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'questionnaire', type: 'array',
            items: new Items(ref: '#/components/schemas/Questionnaire'),
        )
    ])]
    public function actionIndex(): array
    {
        $full_name = $this->getParameterFromRequest('full_name');
        $age = $this->getParameterFromRequest('age');
        $city = $this->getParameterFromRequest('city');
        $status = $this->getParameterFromRequest('status');
        $work = $this->getParameterFromRequest('work');

        if (empty($full_name)) {
            return $this->returnError(['Поле full_name не заполнено или заполнено некорректно']);
        }
        if (empty($age)) {
            return $this->returnError(['Поле age не заполнено или заполнено некорректно']);
        }
        if (empty($city)) {
            return $this->returnError(['Поле city не заполнено или заполнено некорректно']);
        }
        if (empty($status)) {
            return $this->returnError(['Поле status не заполнено или заполнено некорректно']);
        }
        if (empty($work)) {
            return $this->returnError(['Поле work не заполнено или заполнено некорректно']);
        }

        $questionnaire = new Questionnaire();

        if ($questionnaire->load(
                ['full_name' => $full_name, 'age' => $age, 'city' => $city, 'status' => $status, 'work' => $work, 'created_at' => time()],
                ''
            ) && $questionnaire->validate()) {
            $questionnaire->save();
            return $this->returnSuccess([
                'questionnaire' => $questionnaire
            ]);
        } else {
            return [
                'success' => false,
                'errors' => $questionnaire->getErrors(),
            ];
        }
    }
}
