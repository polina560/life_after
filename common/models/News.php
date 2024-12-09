<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%news}}".
 *
 * @property int         $id
 * @property int|null    $date        Дата
 * @property string|null $title       Дата изменения
 * @property string      $description Описание
 * @property string      $link        Ссылка
 */

#[Schema (
    properties: [
    new Property(property: 'id', type: 'integer'),
    new Property(property: 'date', type: 'integer'),
    new Property(property: 'title', type: 'string'),
    new Property(property: 'description', type: 'string'),
    new Property(property: 'link', type: 'string'),

])]
class News extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%news}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['date'], 'integer'],
            [['description', 'link'], 'required'],
            [['title', 'description', 'link'], 'string', 'max' => 255]
        ];
    }

    final public function fields(): array
    {
        return [
            'id',
            'date',
            'title',
            'description',
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
            'date' => Yii::t('app', 'Date'),
            'title' => Yii::t('app', 'Title'),
            'description' => Yii::t('app', 'Description'),
            'link' => Yii::t('app', 'Link'),
        ];
    }
}
