<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%questionnaire}}".
 *
 * @property int    $id
 * @property string $full_name  ФИО
 * @property int    $age        Возраст
 * @property string $city       Город
 * @property int    $status     Статус
 * @property int    $work       Опыт работы
 * @property int    $created_at Дата создания
 */

#[Schema ( properties: [
    new Property (property: 'id', type: 'string'),
    new Property (property: 'full_name', type: 'string'),
    new Property (property: 'age', type: 'string'),
    new Property (property: 'city', type: 'string'),
    new Property (property: 'status', type: 'string'),
    new Property (property: 'work', type: 'string'),
]
)]
class Questionnaire extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public function behaviors(): array
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'updatedAtAttribute' => false,
            ]
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%questionnaire}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['full_name', 'age', 'city', 'status', 'work'], 'required'],
            [['age', 'status', 'work', 'created_at'], 'integer'],
            [['full_name', 'city'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'full_name' => Yii::t('app', 'Full Name'),
            'age' => Yii::t('app', 'Age'),
            'city' => Yii::t('app', 'City'),
            'status' => Yii::t('app', 'Status'),
            'work' => Yii::t('app', 'Work'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
