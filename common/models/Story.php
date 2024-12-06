<?php

namespace common\models;

use common\models\AppActiveRecord;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%story}}".
 *
 * @property int         $id
 * @property string      $accusation      Обвинение
 * @property string      $first_name      Имя
 * @property string      $middle_name     Отчество
 * @property string      $last_name       Фамилия
 * @property string|null $add_information Дополнительная информация
 * @property string|null $desktop_photo   Фото для десктопа
 * @property string|null $mobile_photo    Фотография для мобильного
 * @property string|null $story           История
 * @property string|null $link            Ссылка
 */
class Story extends AppActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%story}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['accusation', 'first_name', 'middle_name', 'last_name'], 'required'],
            [['story'], 'string'],
            [['accusation', 'first_name', 'middle_name', 'last_name', 'add_information', 'desktop_photo', 'mobile_photo', 'link'], 'string', 'max' => 255]
        ];
    }

    /**
     * {@inheritdoc}
     */
    final public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accusation' => Yii::t('app', 'Accusation'),
            'first_name' => Yii::t('app', 'First Name'),
            'middle_name' => Yii::t('app', 'Middle Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'add_information' => Yii::t('app', 'Add Information'),
            'desktop_photo' => Yii::t('app', 'Desktop Photo'),
            'mobile_photo' => Yii::t('app', 'Mobile Photo'),
            'story' => Yii::t('app', 'Story'),
            'link' => Yii::t('app', 'Link'),
        ];
    }
}
