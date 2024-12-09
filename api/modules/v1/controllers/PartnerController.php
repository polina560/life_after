<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use common\models\Partner;
use common\models\Story;
use OpenApi\Attributes\Get;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Property;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class PartnerController extends AppController
{

    /**
     * {@inheritdoc}
     */

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Returns a list of Partner's
     */
    #[Get(
        path: '/partner/index',
        operationId: 'partner-index',
        description: 'Возвращает список партнеров',
        summary: 'Список партнеров',
        security: [['bearerAuth' => []]],
        tags: ['partners']
    )]
    #[JsonSuccess(content: [

        new Property(
            property: 'partners', type: 'array',
            items: new Items(ref: '#/components/schemas/Partner'),
        ),

    ])]
    public function actionIndex(): array
    {
        $query = Partner::find();

        $provider = new ActiveDataProvider([
            'query' => $query,
        ]);
        return $this->returnSuccess([
            'partners' => $provider,

        ]);


    }
}
