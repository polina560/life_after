<?php

namespace api\modules\v1\controllers;

use api\behaviors\returnStatusBehavior\JsonSuccess;
use api\behaviors\returnStatusBehavior\RequestFormData;
use common\models\FormData;
use common\models\Info;
use OpenApi\Attributes\Items;
use OpenApi\Attributes\Post;
use OpenApi\Attributes\Property;
use yii\helpers\ArrayHelper;

class InfoController extends AppController
{

    /**
     * {@inheritdoc}
     */

    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), ['auth' => ['except' => ['index']]]);
    }

    /**
     * Add new user's data to Form
     */

    #[Post(
        path: '/info/index',
        operationId: 'info-index',
        description: 'Отправляет данные формы',
        summary: 'Данные из формы',
        security: [['bearerAuth' => []]],
        tags: ['info']
    )]
    #[RequestFormData(
        properties: [
            new Property(property: 'name', description: 'E-mail', type: 'integer'),
            new Property(property: 'email', description: 'Сообщение', type: 'string'),
        ]
    )]
    #[JsonSuccess(content: [
        new Property(
            property: 'info', type: 'array',
            items: new Items(ref: '#/components/schemas/Info'),
        )
    ])]
    public function actionIndex(): array
    {
        $name = $this->getParameterFromRequest('name');
        $email = $this->getParameterFromRequest('email');

        $emailModel = Info::findOne(['email' => $email]);

        if(!empty($emailModel)){
            return $this->returnError(['Вы уже оставляли запрос']);
        }
        if (empty($name) ) {
            return $this->returnError(['Поле name не заполнено или заполнено некорректно']);
        }
        if (empty($email)) {
            return $this->returnError(['Поле email не заполнено или заполнено некорректно']);
        }

        $form = new Info();

        if($form->load(['name'=> $name, 'email'=>$email, 'moderation_status' => 0, 'created_at' => time()],'') && $form->validate()){
            $form->save();
            return $this->returnSuccess([
                'message' => 'Запрос успешно отправлен',
            ]);
        }
        else {
            return [
                'success' => false,
                'errors' => $form->getErrors(),
            ];
        }

    }
}
