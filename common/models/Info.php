<?php

namespace common\models;

use common\models\AppActiveRecord;
use OpenApi\Attributes\Property;
use OpenApi\Attributes\Schema;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%info}}".
 *
 * @property int      $id
 * @property string   $name              Имя
 * @property string   $email             E-mail
 * @property int|null $moderation_status Статус модерации
 * @property int      $created_at        Дата создания
 */
#[Schema ( properties: [
    new Property (property: 'id', type: 'string'),
    new Property (property: 'name', type: 'string'),
    new Property (property: 'email', type: 'string'),
]
)]
class Info extends AppActiveRecord
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
        return '{{%info}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'email'], 'required'],
            [['moderation_status', 'created_at'], 'integer'],
            [['name', 'email'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'email' => Yii::t('app', 'Email'),
            'moderation_status' => Yii::t('app', 'Moderation Status'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
