<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\models\News;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class NewsController extends AppController
{
    /**
     * {@inheritdoc}
     */

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of News's
     */
    #[Get(
        path: '/news/index',
        operationId: 'news-index',
        description: 'Возвращает список новостей',
        summary: 'Список новостей',
        security: [['bearerAuth' => []]],
        tags: ['news']
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'news', type: 'array',
            items: new Items(ref: '#/components/schemas/News'),
        ),

    ])]
    public function actionIndex(): array
    {
        $query = News::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->returnSuccess([
            'news' => $provider,
            'pagination' => [
                'pageSize' => 3
            ]

        ]);


    }
}
