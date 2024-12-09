<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\models\Story;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class StoryController extends AppController
{

    /**
     * {@inheritdoc}
     */

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Story's
     */
    #[Get(
        path: '/story/index',
        operationId: 'story-index',
        description: 'Возвращает список историй',
        summary: 'Список историй',
        security: [['bearerAuth' => []]],
        tags: ['stories']
    )]
    #[JsonSuccess(content: [

        new Property(
            property: 'stories', type: 'array',
            items: new Items(ref: '#/components/schemas/Story'),
        ),

    ])]
    public function actionIndex(): array
    {
        $query = Story::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3
            ]
        ]);
        return $this->returnSuccess([
            'stories' => $provider,

        ]);


    }
}
