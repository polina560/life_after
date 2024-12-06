<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%partner}}".
 *
 * @property int         $id
 * @property string      $title Название партнера
 * @property string|null $logo  Логотип партнера
 * @property string|null $link  Ссылка на сайт партнера
 */

#[Schema (properties: [
    new Property(property: 'id', type: 'integer'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'logo', type: 'string'),
    new Property(property: 'link', type: 'string'),

])]
class Partner extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%partner}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['title'], 'required'],
            [['title', 'logo', 'link'], 'string', 'max' => 255]
        ];
    }

    final public function fields(): array
    {
        return [
            'id',
            'title',
            'logo' => Yii::$app->request->hostInfo . $this->logo,
            'link'
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'logo' => Yii::t('app', 'Logo'),
            'link' => Yii::t('app', 'Link'),
        ];
    }
}
